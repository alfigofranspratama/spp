<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Xendit\Xendit;

require 'vendor/autoload.php';


class Transaction extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        isLogStudent();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $users = $this->session->userdata('users');
        $data['student'] = $this->db->query("SELECT * FROM tb_users a LEFT JOIN student_data b ON a.id_users = b.users_id WHERE a.id_users = '$users[id_users]'")->row_array();
        $nisn = $data['student']['nisn'];
        $data['history'] = $this->db->query("SELECT * FROM tb_transaction a LEFT JOIN tb_users b ON a.id_employee = b.id_users WHERE a.nisn = '$nisn'")->result();
        $data['title'] = "SPP Payment";
        student('transaction/view', $data);
    }

    public function pay()
    {
        $users = $this->session->userdata('users');
        $student = $this->db->query("SELECT * FROM tb_users a LEFT JOIN student_data b ON a.id_users = b.users_id WHERE a.id_users = '$users[id_users]'")->row_array();
        $nisn = $student['nisn'];

        $this->form_validation->set_rules('pay_month', 'Pay Month', 'trim|required');
        $this->form_validation->set_rules('pay_year', 'Pay Year', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['student'] = $this->Data_model->getwhere('nisn', $nisn, 'student_data');
            $data['spp'] = $this->Data_model->getwhere('id_spp', $data['student']['spp_id'], 'tb_spp');

            $data['title'] = 'Pay SPP Here';
            student('transaction/pay', $data);
        } else {
            $spp = $this->db->query("SELECT * FROM student_data a LEFT JOIN tb_spp b ON a.spp_id = b.id_spp")->row_array();

            $data['nisn'] = $nisn;
            $data['id_employee'] = 0;
            $data['paid_date'] = date("Y-m-d");
            $data['pay_month'] = $this->input->post('pay_month');
            $data['pay_year'] = $this->input->post('pay_year');
            $data['spp_id'] = $spp['spp_id'];
            $data['pay_amount'] = $spp['amount'];

            $query = $this->db->get_where('tb_transaction', ['pay_month' => $data['pay_month'], 'pay_year' => $data['pay_year'], 'nisn' => $nisn])->row_array();
            if ($query != null) {
                $this->session->set_flashdata('message', 'onload="swal(\'error\',\'Failed Transaction\',\'Please check history first\')"');
                redirect(base_url('admin/transaction/pay/' . $nisn));
            } else {
                $api = $this->db->get_where('xendit', ['id' => 1])->row_array();
                Xendit::setApiKey($api['api_key']);

                $params = [
                    'external_id' => 'spp_' . time(),
                    'payer_email' => 'alfigofranspratamaa@gmail.com',
                    'description' => 'Pay SPP',
                    'amount' => $data['pay_amount'],
                    'customer' => [
                        'given_names' => $student['name'],
                        'email' => $student['email_address'],
                        'mobile_number' => $student['phone']
                    ],
                    'success_redirect_url' => base_url('student/transaction/success?' . http_build_query($data)),
                    'failure_redirect_url' => base_url('student/transaction/fail'),
                    'currency' => 'IDR',
                    'items' => [
                        [
                            'name' => 'Pembayaran SPP Bulan ' . $data['pay_month'] . " Tahun " . $data['pay_year'],
                            'quantity' => 1,
                            'price' => $data['pay_amount'],
                            'category' => 'Sumbangan Pembinaan Pendidikan',
                            'url' => 'https://smkn4pyk.sch.id'
                        ]
                    ],
                ];

                $createInvoice = \Xendit\Invoice::create($params);
                redirect($createInvoice['invoice_url']);
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
        student('transaction/detail', $data);
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

    public function success()
    {
        $data['nisn'] = $this->input->get('nisn');
        $data['id_employee'] = $this->input->get('id_employee');
        $data['paid_date'] = $this->input->get('paid_date');
        $data['pay_month'] = $this->input->get('pay_month');
        $data['pay_year'] = $this->input->get('pay_year');
        $data['spp_id'] = $this->input->get('spp_id');
        $data['pay_amount'] = $this->input->get('pay_amount');

        $this->Data_model->insert('tb_transaction', $data);
        $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Transaction Added Successfully\',\'Ok to continue\')"');
        redirect(base_url('student/transaction/'));
    }
}

/* End of file Transaction.php */
