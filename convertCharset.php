<?php

/**
 * Database converter
 * @author	bfarber
 * @since	28 Dec 2009
 * @link	...
 */
printMessage( "Starting..." );

ini_set( 'memory_limit', 1000000000 );

define( 'IPS_IS_SHELL', true );
define( 'IPB_THIS_SCRIPT', 'public' );
require_once( './initdata.php' );
require_once( IPS_ROOT_PATH . 'sources/base/ipsRegistry.php' );
require_once( IPS_ROOT_PATH . 'sources/base/ipsController.php' );

$registry	= ipsRegistry::instance();
$registry->init();

printMessage( "IPB Initialized..." );

/**
 * At this point we have a proper IPB connection to source database.
 * Here we will define connection values for a new empty database to recreate in.
 */
$host				= "localhost";				// Host
$user				= "root";					// User
$pass				= "";						// Pass
$database			= "qlhs2";						// New database
$port				= null;						// Port (not usually needed)
$realCharset		= "utf-8";					// Character set you'd use in the browser
$charset			= "utf8";					// Character set you'd use with mysql
$collation			= "utf8_general_ci";		// Collation for database

/**
 * Fields not to convert
 */
$ignored_fields			= array();

/**
 * Skip all tables up until this table. 
 * Useful if script times out and you want to restart it.
 */
$skip_until_table		= "";

/**
 * Number of fields per cycle
 */
$limit					= 500;

/**
 * Get connection to destination DB
 */
if ( ! class_exists( 'dbMain' ) )
{
	require_once( IPS_KERNEL_PATH.'classDb.php' );
	require_once( IPS_KERNEL_PATH.'classDb' . ucwords(ipsRegistry::$settings['sql_driver']) . ".php" );
}

$classname = "db_driver_" . ipsRegistry::$settings['sql_driver'];

$RDB = new $classname;

$RDB->obj['sql_database']			= $database;
$RDB->obj['sql_user']				= $user;
$RDB->obj['sql_pass']				= $pass;
$RDB->obj['sql_host']				= $host;
$RDB->obj['sql_port']				= $port;  
$RDB->obj['sql_charset']			= $charset;  
$RDB->obj['sql_tbl_prefix']			= '';			// We don't want to add prefix to queries since they'll already have it
$RDB->obj['use_shutdown']			= 0;
$RDB->obj['force_new_connection']	= 1;
$RDB->obj['error_log']				= DOC_IPS_ROOT_PATH . 'cache/sql_error_log_' . date('m_d_y') . '.cgi';
$RDB->obj['use_error_log']			= 1;
$RDB->obj['use_debug_log']			= 0;
$RDB->connect();

printMessage( "Connection to destination database established..." );

/**
 * Here we set new default charset/collation for tables
 */
$RDB->query( "ALTER DATABASE {$database} DEFAULT CHARACTER SET {$charset} COLLATE {$collation}" );

printMessage( "Charset and collation changed..." );

/**
 * Define the field types to treat as text (should never need to change this)
 * NOTE: IPB only uses blob types for binary data (i.e. for IDM database storage of files) and we don't want to convert binary data.
 * NOTE: IPB also does not use set and enum types, so we don't have to worry about those.
 */
$mysqlTextFieldTypes	= array( 'text', 'mediumtext', 'longtext', 'varchar', 'char', 'tinytext' );

/**
 * Init variables
 */
$have_skipped	= false;

/**
 * Grab tables in source database and loop over them
 */
$tables	= $registry->DB()->getTableNames();

if( count($tables) AND is_array($tables) )
{
	foreach( $tables as $_table )
	{
		if( !$have_skipped AND $skip_until_table )
		{
			if( $_table != $skip_until_table )
			{
				printMessage( "Skipping table {$_table}..." );
				continue;
			}
			else if( $_table == $skip_until_table )
			{
				$have_skipped	= true;
			}
		}
		
		printMessage( "Operating on table {$_table}..." );
		
		$_recordCount	= 0;
		$_totalCount	= 0;
		
		/**
		 * Get create table statement
		 */
		$createTable	= $registry->DB()->query( "SHOW CREATE TABLE {$_table}" );
		$_createTable	= $registry->DB()->fetch($createTable);
		
		/**
		 * Fix charset...
		 * Note: collation should be handled automatically by database definition
		 */
		$_createTable['Create Table']	= preg_replace( "#CHARSET=(.+?)$#i", "CHARSET={$charset}", $_createTable['Create Table'] );

		/**
		 * Drop (if exists) and add table
		 */
		$RDB->query( "DROP TABLE IF EXISTS {$_createTable['Table']}" );
		$RDB->query( $_createTable['Create Table'] );
		
		printMessage( "Created table for: {$_createTable['Table']}" );
		
		/**
		 * Now get all the fields
		 */
		$tableFields	= $registry->DB()->query( "SHOW fields FROM {$_table}" );
		$fields			= array();
		$textFields		= array();
		
		while( $_r = $registry->DB()->fetch($tableFields) )
		{
			$fields[]	= $_r;
		}
		
		/**
		 * Loop over the fields
		 */
		if( count($fields) AND is_array($fields) )
		{
			foreach( $fields as $_field )
			{
				if( in_array( trim( preg_replace( "#\(\d+\)#", '', $_field['Type'] ) ), $mysqlTextFieldTypes ) )
				{
					$textFields[]	= $_field['Field'];
				}
			}
		}

		/**
		 * Now pull all records from this table and insert into new database...
		 */
		$_records	= $registry->DB()->query( "SELECT * FROM {$_table}" );
		
		while( $r = $registry->DB()->fetch( $_records ) )
		{
			/**
			 * Charset conversion on text fields...
			 */
			if( count($textFields) AND is_array($textFields) )
			{
				foreach( $textFields as $_isText )
				{
					/**
					 * If data is serialized, can't just convert it
					 */
					if( isSerialized( $r[ $_isText ] ) )
					{
						/**
						 * Unserialize
						 */
						$_data			= unserialize( $r[ $_isText ] );
						
						/**
						 * Array walk over data applying conversion function.
						 * NOTE: conversion function accepts first param as reference, so original value is modified
						 */
						array_walk_recursive( $_data, "convertSerializeCharset", $realCharset );

						/**
						 * Now, reserialize
						 */
						$r[ $_isText ]	= serialize($_data);
					}
					else
					{
						/**
						 * Just convert it
						 */
						$r[ $_isText ]	= IPSText::convertCharsets( $r[ $_isText ], ipsRegistry::$settings['gb_char_set'], $realCharset );
					}
				}
			}
			
			/**
			 * Insert record, with text converted hopefully
			 */
			$RDB->insert( $_table, $r );
			
			/**
			 * Increment counters
			 */
			$_recordCount++;
			$_totalCount++;
			
			/**
			 * And show message if we hit "limit"
			 */
			if( $_recordCount >= $limit )
			{
				printMessage( "Transferred and converted up to {$_totalCount} records from {$_table}..." );
				
				$_recordCount	= 0;
			}
			
			/* Clear cached queries */
			$registry->DB()->obj['cached_queries']	= array();
			$RDB->obj['cached_queries']			= array();
		}
		
		printMessage( "Finished inserting {$_totalCount} records for {$_table}..." );
	}
}

/**
 * Rebuild settings cache
 */
$settings = array();

$RDB->obj['sql_tbl_prefix']	= ipsRegistry::dbFunctions()->getPrefix();

$RDB->update( "core_sys_conf_settings", array( "conf_value" => '' ), "conf_key='gb_char_set'" );				// Reset to utf-8
$RDB->build( array( 'select' => '*', 'from' => 'core_sys_conf_settings', 'where' => 'conf_add_cache=1' ) );
$info = $RDB->execute();

while ( $r = $RDB->fetch($info) )
{	
	$value = $r['conf_value'] != "" ?  $r['conf_value'] : $r['conf_default'];
	
	if ( $value == '{blank}' )
	{
		$value = '';
	}

	$settings[ $r['conf_key'] ] = $value;
}

$RDB->update( "cache_store", array( 'cs_value' => serialize($settings) ), "cs_key='settings'" );

printMessage( "Rebuilt settings cache..." );

exit;

/**
 * Print to the shell window
 *
 * @access	public
 * @param	string		Message
 * @return	void
 */
function printMessage( $message )
{
	$window = fopen('php://stdout', 'w');
	fwrite( $window, $message . "\n" );
	fclose( $window );
}

/**
 * Determine if text is actually serialized.  NOT FOOLPROOF.
 *
 * @access	public
 * @param	string		Text
 * @return	bool
 */
function isSerialized( $text )
{
	$_test = @unserialize($text);
	
	if( is_array($_test) AND count($_test) )
	{
		return true;
	}
	
	return false;
}

/**
 * Array walk callback for serialized array data
 *
 * @access	public
 * @param	string		Array value
 * @param	string		Array key
 * @param	string		New charset to convert to
 * @return	bool
 */
function convertSerializeCharset( &$input, $key, $realCharset )
{
	$input	= IPSText::convertCharsets( $input, ipsRegistry::$settings['gb_char_set'], $realCharset );
	
	$input	= str_replace( ipsRegistry::$settings['gb_char_set'], $realCharset, $input );
}