<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        isLogAdmin();
    }

    public function index()
    {
        $data['employee'] = $this->Data_model->datawhere('level', 'employee', 'tb_users');
        $data['title'] = "Employee";
        admin('employee/view', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_users.username]');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email|is_unique[tb_users.email_address]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Add New Employee";
            admin('employee/add', $data);
        } else {
            $data['name'] = $this->input->post('name');
            $data['username'] = $this->input->post('username');
            $data['email_address'] = $this->input->post('email_address');
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data['level'] = 'Employee';

            $this->Data_model->insert('tb_users', $data);
            $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Employee Added Successfully\',\'Ok to continue\')"');
            redirect(base_url('admin/employee'));
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        // $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_users.username]');
        // $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email|is_unique[tb_users.email_address]');
        // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $data['employee'] = $this->Data_model->getwhere('id_users', $id, 'tb_users');
            $data['title'] = "Update Employee";
            admin('employee/update', $data);
        } else {
            $data['name'] = $this->input->post('name');

            $this->Data_model->update('id_users', $id, 'tb_users', $data);
            $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Employee Updated Successfully\',\'Ok to continue\')"');
            redirect(base_url('admin/employee'));
        }
    }

    public function delete($id)
    {
        $this->Data_model->delete('id_users', $id, 'tb_users');
        $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Employee Deleted Successfully\',\'Ok to continue\')"');
        redirect(base_url('admin/employee'));
    }
}

/* End of file Employee.php */
