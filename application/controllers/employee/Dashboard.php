<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        isLogEmployee();
    }



    public function index()
    {
        $data['title'] = "Dashboard";
        employee('dashboard', $data);
    }
}

/* End of file Dashboard.php */
