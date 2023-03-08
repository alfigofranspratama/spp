<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        isLogAdmin();
    }

    public function index()
    {
        $data['tenth'] = $this->db->query("SELECT * FROM student_data a INNER JOIN tb_class b ON a.class_id = b.class_id WHERE b.class = '10' ORDER BY a.class_id ASC")->result();
        $data['eleventh'] = $this->db->query("SELECT * FROM student_data a INNER JOIN tb_class b ON a.class_id = b.class_id WHERE b.class = '11' ORDER BY a.class_id ASC")->result();
        $data['twelfth'] = $this->db->query("SELECT * FROM student_data a INNER JOIN tb_class b ON a.class_id = b.class_id WHERE b.class = '12' ORDER BY a.class_id ASC")->result();
        $data['title'] = "Student";
        admin('student/view', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nisn', 'NISN', 'trim|required|is_unique[student_data.nisn]');
        $this->form_validation->set_rules('nis', 'NIS', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('class', 'Class', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['ten'] = $this->Data_model->datawhere('class', '10', 'tb_class');
            $data['eleven'] = $this->Data_model->datawhere('class', '11', 'tb_class');
            $data['twelve'] = $this->Data_model->datawhere('class', '12', 'tb_class');
            $data['title'] = "Add New Student";
            admin('student/add', $data);
        } else {
            $data['nisn'] = $this->input->post('nisn');
            $data['nis'] = $this->input->post('nis');
            $data['name'] = $this->input->post('name');
            $data['class_id'] = $this->input->post('class');
            $data['phone'] = $this->input->post('phone');
            $data['address'] = $this->input->post('address');
            $data['spp_id'] = $this->input->post('spp_id');
            $data['entry_month'] = $this->input->post('entry_month');
            

            $this->Data_model->insert('student_data', $data);
            $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Student Added Successfully\',\'Ok to continue\')"');
            redirect(base_url('admin/student'));
        }
    }

    public function update($nisn)
    {
        $this->form_validation->set_rules('nis', 'NIS', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('class', 'Class', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('entry_month', 'Entry Month', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['ten'] = $this->Data_model->datawhere('class', '10', 'tb_class');
            $data['eleven'] = $this->Data_model->datawhere('class', '11', 'tb_class');
            $data['twelve'] = $this->Data_model->datawhere('class', '12', 'tb_class');
            $data['student'] = $this->Data_model->getwhere('nisn', $nisn, 'student_data');
            $data['title'] = "Student";
            admin('student/update', $data);
        } else {
            $data['nis'] = $this->input->post('nis');
            $data['name'] = $this->input->post('name');
            $data['class_id'] = $this->input->post('class');
            $data['phone'] = $this->input->post('phone');
            $data['address'] = $this->input->post('address');
            $data['spp_id'] = $this->input->post('spp_id');
            $data['entry_month'] = $this->input->post('entry_month');
            
            $this->Data_model->update('nisn', $nisn, 'student_data', $data);
            $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Student Updated Successfully\',\'Ok to continue\')"');
            redirect(base_url('admin/student'));
        }
    }

    public function delete($nisn)
    {
        $this->Data_model->delete('nisn', $nisn, 'student_data');
        $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Student Deleted Successfully\',\'Ok to continue\')"');
        redirect(base_url('admin/student'));
    }
}

/* End of file Student.php */
