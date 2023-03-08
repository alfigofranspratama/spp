<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        isLogStudent();
    }

    public function index()
    {
        $users = $this->session->userdata('users');
        $data['student'] = $this->db->query("SELECT * FROM tb_users a LEFT JOIN student_data b ON a.id_users = b.users_id WHERE a.id_users = '$users[id_users]'")->row_array();
        $nisn = $data['student']['nisn'];
        $data['history'] = $this->db->query("SELECT * FROM tb_transaction a LEFT JOIN tb_users b ON a.id_employee = b.id_users WHERE a.nisn = '$nisn' ORDER BY a.paid_date DESC LIMIT 5")->result();
        $data['title'] = 'Dashboard';
        student('dashboard', $data);
    }

}

/* End of file Dashboard.php */

?>