<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Spp extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        isLogAdmin();
    }

    public function index()
    {
        $data['spp'] = $this->Data_model->order('tb_spp', 'year', 'ASC');
        $data['title'] = "SPP";
        admin('spp/view', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('year', 'Year', 'trim|required|is_unique[tb_spp.year]');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data['spp'] = $this->Data_model->order('tb_spp', 'year', 'ASC');
            $data['title'] = "SPP";
            admin('spp/add', $data);
        } else {
            $data['year'] = $this->input->post('year');
            $data['amount'] = $this->input->post('amount');

            $this->Data_model->insert('tb_spp', $data);
            $this->session->set_flashdata('message', 'onload="swal(\'success\',\'SPP Added Successfully\',\'Ok to continue\')"');
            redirect(base_url('admin/spp'));
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data['spp'] = $this->Data_model->getwhere('id_spp', $id, 'tb_spp');
            $data['title'] = "SPP";
            admin('spp/update', $data);
        } else {
            $data['amount'] = $this->input->post('amount');

            $this->Data_model->update('id_spp', $id, 'tb_spp', $data);
            $this->session->set_flashdata('message', 'onload="swal(\'success\',\'SPP Updated Successfully\',\'Ok to continue\')"');
            redirect(base_url('admin/spp'));
        }
    }

    public function delete($id)
    {
        $this->Data_model->delete('id_spp', $id, 'tb_spp');
        $this->session->set_flashdata('message', 'onload="swal(\'success\',\'SPP Deleted Successfully\',\'Ok to continue\')"');
        redirect(base_url('admin/spp'));
    }
}

/* End of file Spp.php */
