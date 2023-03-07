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
        $keyw = $this->input->get('daterange');
        if ($keyw != null) {
            $ex = explode(' - ', $keyw);
            $ex = str_replace('/', '-', $ex);
            $ex[0] = explode('-', $ex[0]);
            $first = $ex[0][2] . '-' . $ex[0][0] . '-' . $ex[0][1];
            $ex[1] = explode('-', $ex[1]);
            $last = $ex[1][2] . '-' . $ex[1][0] . '-' . $ex[1][1];

            $data['report'] = $this->db->query("SELECT * FROM tb_transaction a LEFT JOIN student_data b ON a.nisn = b.nisn LEFT JOIN tb_users c ON a.id_employee = c.id_users WHERE a.paid_date between '$first' AND '$last'")->result();
            $data['val'] = $keyw;
            $data['title'] = "Report";
            admin('report', $data);
        } else {
            $data['report'] = $this->db->query("SELECT * FROM tb_transaction a LEFT JOIN student_data b ON a.nisn = b.nisn LEFT JOIN tb_users c ON a.id_employee = c.id_users")->result();
            $data['val'] = "";
            $data['title'] = "Report";
            admin('report', $data);
        }
    }

    public function export()
    {
        $keyw = $this->input->get('daterange');
        if ($keyw != null) {
            $ex = explode(' - ', $keyw);
            $ex = str_replace('/', '-', $ex);
            $ex[0] = explode('-', $ex[0]);
            $first = $ex[0][2] . '-' . $ex[0][0] . '-' . $ex[0][1];
            $ex[1] = explode('-', $ex[1]);
            $last = $ex[1][2] . '-' . $ex[1][0] . '-' . $ex[1][1];

            $data['report'] = $this->db->query("SELECT * FROM tb_transaction a LEFT JOIN student_data b ON a.nisn = b.nisn LEFT JOIN tb_users c ON a.id_employee = c.id_users WHERE a.paid_date between '$first' AND '$last'")->result();
            $data['val'] = $keyw;
        } else {
            $data['report'] = $this->db->query("SELECT * FROM tb_transaction a LEFT JOIN student_data b ON a.nisn = b.nisn LEFT JOIN tb_users c ON a.id_employee = c.id_users")->result();
            $data['val'] = "";
        }

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('export', $data);
    }

    public function view()
    {
        $this->load->view('export');
    }
}

/* End of file Dashboard.php */
