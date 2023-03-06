<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Other extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('button_background', 'Button Background', 'trim|required');
        $this->form_validation->set_rules('button_color', 'Button Color', 'trim|required');
        $this->form_validation->set_rules('button_hover_background', 'Button Hover background', 'trim|required');
        $this->form_validation->set_rules('button_hover_color', 'Button Hover color', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data['color'] = $this->db->get('color')->row_array();
            $data['title'] = 'Color Settings';
            admin('color/view', $data);
        } else {
            $data['button_background'] = $this->input->post('button_background');
            $data['button_color'] = $this->input->post('button_color');
            $data['button_hover_background'] = $this->input->post('button_hover_background');
            $data['button_hover_color'] = $this->input->post('button_hover_color');

            $this->Data_model->update('id', 1, 'color', $data);
            $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Button Updated Successfully\',\'Ok to continue\')"');
            redirect(base_url('website-color'));
        }
    }
}

/* End of file Other.php */
