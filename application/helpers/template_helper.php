<?php
function admin($path, $data)
{
    $ci = get_instance();
    $ci->load->view('admin/templates/header', $data);
    $ci->load->view('admin/templates/sidebar', $data);
    $ci->load->view("admin/" . $path, $data);
    $ci->load->view('admin/templates/footer', $data);
}


function isLogAdmin()
{
    $ci = &get_instance();
    $ci->load->library('session');
    $session =  $ci->session->userdata('users');
    return ($session['level'] == 'Admin')  ? true : redirect(base_url(''));
}