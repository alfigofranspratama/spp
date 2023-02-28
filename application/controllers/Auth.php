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

    public function logout()
    {
        $this->session->unset_userdata('users');
        redirect(base_url(''));
    }

    public function signup()
    {
        $this->form_validation->set_rules('nisn', 'NISN', 'trim|required|callback_nisn_check',);
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|is_unique[tb_users.email_address]|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_users.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Sign Up';
            $this->load->view('auth/signup', $data, FALSE);
        } else {
            
        }
        
        
    }

    public function mail()
    {
        $this->load->view('email_signup');
        
    }


    public function nisn_check($str)
    {
        $query = $this->db->query("SELECT * FROM student_data a LEFT JOIN tb_users b ON a.users_id = b.id_users WHERE a.nisn = '$str'")->row_array();
        if ($query == null) {
            $this->form_validation->set_message('nisn_check', '{field} not Registered');
            return FALSE;
        } else {
            if($query['users_id'] != null){
                $this->form_validation->set_message('nisn_check', 'The account has been registered using this {field}');
                return FALSE;
            }
            return TRUE;
        }
    }
}

/* End of file Auth.php */
