<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        isLogAdmin();
    }



    public function index()
    {
        $data['report'] = $this->db->query("SELECT * FROM tb_transaction a LEFT JOIN student_data b ON a.nisn = b.nisn LEFT JOIN tb_users c ON a.id_employee = c.id_users")->result();
        $data['title'] = "Report";
        admin('report', $data);
    }
}

/* End of file Dashboard.php */
