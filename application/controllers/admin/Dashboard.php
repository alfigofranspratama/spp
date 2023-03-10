<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        isLogAdmin();
    }



    public function index()
    {
        $data['history'] = $this->db->query("SELECT * FROM tb_transaction a LEFT JOIN tb_users b ON a.id_employee = b.id_users ORDER BY a.paid_date DESC LIMIT 5")->result();
        $data['title'] = "Dashboard";
        admin('dashboard', $data);
    }
}

/* End of file Dashboard.php */
