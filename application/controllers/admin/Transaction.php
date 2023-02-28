<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        isLogAdmin();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $data['tenth'] = $this->db->query("SELECT * FROM student_data a INNER JOIN tb_class b ON a.class_id = b.class_id WHERE b.class = '10' ORDER BY a.class_id ASC")->result();
        $data['eleventh'] = $this->db->query("SELECT * FROM student_data a INNER JOIN tb_class b ON a.class_id = b.class_id WHERE b.class = '11' ORDER BY a.class_id ASC")->result();
        $data['twelfth'] = $this->db->query("SELECT * FROM student_data a INNER JOIN tb_class b ON a.class_id = b.class_id WHERE b.class = '12' ORDER BY a.class_id ASC")->result();
        $data['title'] = "SPP Payment";
        admin('transaction/view', $data);
    }

    public function pay($nisn)
    {
        $this->form_validation->set_rules('pay_month', 'Pay Month', 'trim|required');
        $this->form_validation->set_rules('pay_year', 'Pay Year', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data['student'] = $this->Data_model->getwhere('nisn', $nisn, 'student_data');
            $data['spp'] = $this->Data_model->getwhere('id_spp', $data['student']['spp_id'], 'tb_spp');

            $data['title'] = 'Pay SPP Here';
            admin('transaction/pay', $data);
        } else {
            $spp = $this->db->query("SELECT * FROM student_data a LEFT JOIN tb_spp b ON a.spp_id = b.id_spp")->row_array();
            $session = $this->session->userdata('users');

            $data['nisn'] = $nisn;
            $data['id_employee'] = $session['id_users'];
            $data['paid_date'] = date("Y-m-d");
            $data['pay_month'] = $this->input->post('pay_month');
            $data['pay_year'] = $this->input->post('pay_year');
            $data['spp_id'] = $spp['spp_id'];
            $data['pay_amount'] = $spp['amount'];

            $query = $this->db->get_where('tb_transaction', ['pay_month' => $data['pay_month'], 'pay_year' => $data['pay_year']])->row_array();
            if ($query != null) {
                $this->session->set_flashdata('message', 'onload="swal(\'error\',\'Failed Transaction\',\'Please check history first\')"');
                redirect(base_url('admin/transaction/pay/' . $nisn));
            } else {
                $this->Data_model->insert('tb_transaction', $data);
                $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Transaction Added Successfully\',\'Ok to continue\')"');
                redirect(base_url('admin/transaction/pay/' . $nisn));
            }
        }
    }

    public function detail($nisn)
    {
        $data['student'] = $this->Data_model->getwhere('nisn', $nisn, 'student_data');
        $data['pay'] = $this->db->query("SELECT * FROM tb_transaction a LEFT JOIN tb_users b ON a.id_employee = b.id_users WHERE a.nisn='$nisn' ORDER BY paid_date ASC")->result();
        $data['class'] = $this->Data_model->getwhere('class_id', $data['student']['class_id'], 'tb_class');
        $data['spp'] = $this->Data_model->getwhere('id_spp', $data['student']['spp_id'], 'tb_spp');
        $data['title'] = "History Payment SPP";
        admin('transaction/detail', $data);
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

/* End of file Transaction.php */
