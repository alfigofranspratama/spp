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

    public function orwhere($field1, $value1, $field2, $value2, $table)
    {
        $this->db->where($field1, $value1);
        $this->db->or_where($field2, $value2);
        $query = $this->db->get($table);
        return $query->row_array();
    }

}

/* End of file Data_model.php */

?>