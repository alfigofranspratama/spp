<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Grade extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        isLogAdmin();
    }

    public function index()
    {
        $data['ten'] = $this->Data_model->datawhere('class', '10', 'tb_class');
        $data['eleven'] = $this->Data_model->datawhere('class', '11', 'tb_class');
        $data['twelve'] = $this->Data_model->datawhere('class', '12', 'tb_class');
        $data['title'] = "Grade";
        admin('grade/view', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('class', 'Class', 'trim|required');
        $this->form_validation->set_rules('major', 'Major', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Grade";
            admin('grade/add', $data);
        } else {
            $data['class'] = $this->input->post('class');
            $data['major'] = $this->input->post('major');

            $this->Data_model->insert('tb_class', $data);
            $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Grade Added Successfully\',\'Ok to continue\')"');
            redirect(base_url('admin/grade'));
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('class', 'Class', 'trim|required');
        $this->form_validation->set_rules('major', 'Major', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data['grade'] = $this->Data_model->getwhere('class_id', $id, 'tb_class');
            $data['title'] = "Grade";
            admin('grade/update', $data);
        } else {
            $data['class'] = $this->input->post('class');
            $data['major'] = $this->input->post('major');

            $this->Data_model->update('class_id', $id, 'tb_class', $data);
            $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Grade Updated Successfully\',\'Ok to continue\')"');
            redirect(base_url('admin/grade'));
        }
    }

    public function delete($id)
    {
        $this->Data_model->delete('class_id', $id, 'tb_class');
        $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Grade Deleted Successfully\',\'Ok to continue\')"');
        redirect(base_url('admin/grade'));
    }
}

/* End of file Class.php */
