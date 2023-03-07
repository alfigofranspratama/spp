<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

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
        $data['history'] = $this->db->query("SELECT * FROM tb_transaction a LEFT JOIN tb_users b ON a.id_employee = b.id_users WHERE a.nisn = '$nisn'")->result();
        $data['class'] = $this->Data_model->getwhere('class_id',$data['student']['class_id'], 'tb_class');
        $data['spp'] = $this->Data_model->getwhere('id_spp', $data['student']['spp_id'], 'tb_spp');
        $data['title'] = 'History';
        student('history/view', $data);
    }

    public function pdf_report($id)
    {
        $data['pay'] = $this->Data_model->getwhere('id_transaction', $id, 'tb_transaction');
        $data['student'] = $this->Data_model->getwhere('nisn', $data['pay']['nisn'], 'student_data');
        $data['employee'] = $this->Data_model->getwhere('id_users', $data['pay']['id_employee'], 'tb_users');

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('pdf_report', $data);
    }

}

/* End of file History.php */

?>