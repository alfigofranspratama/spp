<?php
function admin($path, $data)
{
    $ci = get_instance();
    $ci->load->view('admin/templates/header', $data);
    $ci->load->view('admin/templates/sidebar', $data);
    $ci->load->view("admin/" . $path, $data);
    $ci->load->view('admin/templates/footer', $data);
}
function employee($path, $data)
{
    $ci = get_instance();
    $ci->load->view('employee/templates/header', $data);
    $ci->load->view('employee/templates/sidebar', $data);
    $ci->load->view("employee/" . $path, $data);
    $ci->load->view('employee/templates/footer', $data);
}
function student($path, $data)
{
    $ci = get_instance();
    $ci->load->view('student/templates/header', $data);
    $ci->load->view('student/templates/sidebar', $data);
    $ci->load->view("student/" . $path, $data);
    $ci->load->view('student/templates/footer', $data);
}


function isLogAdmin()
{
    $ci = &get_instance();
    $ci->load->library('session');
    $session =  $ci->session->userdata('users');
    return ($session['level'] == 'Admin')  ? true : redirect(base_url(''));
}

function isLogEmployee()
{
    $ci = &get_instance();
    $ci->load->library('session');
    $session =  $ci->session->userdata('users');
    return ($session['level'] == 'Employee')  ? true : redirect(base_url(''));
}

function isLogStudent()
{
    $ci = &get_instance();
    $ci->load->library('session');
    $session =  $ci->session->userdata('users');
    return ($session['level'] == 'Student')  ? true : redirect(base_url(''));
}