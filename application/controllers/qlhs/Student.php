<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {
	public function index()
	{
		$this->render('student/index');
	}

	public function muster() {
		$this->render('student/muster');
	}

	public function reformat() {
		
		$tables = $this->get_all_tables();
		foreach($tables as $table) {
			$fields = $this->get_all_fields($table);
			foreach($fields as $field) {
				$this->reformat_field($table, $field);
			}
		}
	}

	public function get_all_tables() {
		return $this->db->list_tables();
	}

	public function get_all_fields($table) {
		return $this->db->list_fields($table);
	}

	public function reformat_field($table, $field) {
		// $sql = "update `$table` set `$field` = convert(cast(convert(`$field` using latin1)as binary)using utf8)";
		$sql = "UPDATE `$table` SET `$field` = CONVERT(CONVERT(CONVERT(`$field` USING latin1) USING binary) USING UTF8)";
		$this->db->query($sql);
		echo "Reformat `$table`.`$field` done!<br />";
	}
}