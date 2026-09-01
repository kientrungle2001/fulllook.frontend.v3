<?php

class Table_model extends CI_Model
{
    /**
     * @param array $query
     * @return array
     */
    public function row($query)
    {
        /**
         * @var CI_DB
         */
        $db = $this->db;
        if (isset($query['where'])) {
            $db->where($query['where']);
        }
        $db->order_by($query['orderBy'] ?? 'id', $query['orderDir'] ?? 'desc');
        $result = $db->get($query['table'], isset($query['start']) ?? 0, isset($query['offset']) ?? 1);
        return $result->row_array();
    }

    /**
     * @param array $query
     * @return array
     */
    public function rows($query)
    {
        /**
         * @var CI_DB
         */
        $db = $this->db;
        if (isset($query['where'])) {
            $db->where($query['where']);
        }
        $db->order_by($query['orderBy'] ?? 'id', $query['orderDir'] ?? 'desc');

        $result = $db->get($query['table'], isset($query['start']) ?? null, isset($query['offset']) ?? null);
        return $result->result_array();
    }
}
