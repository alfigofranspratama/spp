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
        $data['title'] = "Report";
        admin('report', $data);
    }
}

/* End of file Dashboard.php */
