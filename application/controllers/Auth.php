<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        $this->form_validation->set_rules('username-email', 'Username or Email Address', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login';
            $this->load->view('auth/login', $data, FALSE);
        } else {
            $ue = $this->input->post('username-email');
            $pass = $this->input->post('password');

            $query = $this->Data_model->orwhere('username', $ue, 'email_address', $ue, 'tb_users');

            if($query != null){
                if(password_verify($pass, $query['password'])){
                    // benar
                    $array = array(
                        'users' => $query
                    );
                    $this->session->set_userdata( $array );
                    if($query['level'] == 'Admin'){
                        $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Login Successfully\',\'Happy logging in admin\')"');
                        redirect(base_url('admin/dashboard'));
                    } elseif ($query['level'] == 'Employee') {
                        $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Login Successfully\',\'Happy logging in employee\')"');
                        redirect(base_url('employee/dashboard'));
                    } elseif ($query['level'] == 'Student') {
                        $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Login Successfully\',\'Happy logging in student\')"');
                        redirect(base_url('student/dashboard'));
                    } 
                } else {
                    // salah
                    $this->session->set_flashdata('message', 'onload="swal(\'error\',\'Wrong password\',\'Please check your password again\')"');
                    redirect(base_url(''));
                }
            } else {
                // akun tidak ada
                $this->session->set_flashdata('message', 'onload="swal(\'error\',\'Incorrect username or email address\',\'Please register or check your account again\')"');
                redirect(base_url(''));
            }
        }
        
    }

}

/* End of file Auth.php */
