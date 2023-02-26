<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

    public function get($table)
    {
        $query = $this->db->get($table);
        return $query->result();
    }

    public function getwhere($pk, $value, $table)
    {
        $this->db->where($pk, $value);
        $query = $this->db->get($table);
        return $query->row_array();
    }

    public function datawhere($pk, $value, $table)
    {
        $this->db->where($pk, $value);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function orwhere($field1, $value1, $field2, $value2, $table)
    {
        $this->db->where($field1, $value1);
        $this->db->or_where($field2, $value2);
        $query = $this->db->get($table);
        return $query->row_array();
    }

    public function order($table, $field, $order)
    {
        $query = $this->db->query("SELECT * FROM $table ORDER BY $field $order");
        return $query->result();
    }

    public function insert($table,$data)
    {
        $this->db->insert($table, $data);
    }

    public function update($pk, $val, $table, $data)
    {
        $this->db->where($pk, $val);
        $this->db->update($table, $data);
    }

    public function delete($pk, $val, $table)
    {
        $this->db->where($pk, $val);
        $this->db->delete($table);
    }

}

/* End of file Data_model.php */

?>