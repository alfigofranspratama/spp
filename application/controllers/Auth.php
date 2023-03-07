<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }


    public function index()
    {
        $this->form_validation->set_rules('username-email', 'Username or Email Address', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);

        if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
            $data['captcha'] = $this->recaptcha->getWidget();
            $data['script_captcha'] = $this->recaptcha->getScriptTag();
            $data['title'] = 'Login';
            $this->load->view('auth/login', $data, FALSE);
        } else {
            $ue = $this->input->post('username-email');
            $pass = $this->input->post('password');

            $query = $this->Data_model->orwhere('username', $ue, 'email_address', $ue, 'tb_users'); // Query Login Check

            if ($query != null) {
                if (password_verify($pass, $query['password'])) {
                    if ($query['level'] == 'Admin') {
                        $array = array(
                            'users' => $query
                        );
                        $this->session->set_userdata($array);
                        $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Login Successfully\',\'Happy logging in admin\')"');
                        redirect(base_url('admin/dashboard'));
                    } elseif ($query['level'] == 'Employee') {
                        $array = array(
                            'users' => $query
                        );
                        $this->session->set_userdata($array);
                        $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Login Successfully\',\'Happy logging in employee\')"');
                        redirect(base_url('employee/dashboard'));
                    } elseif ($query['level'] == 'Student') {
                        $student_data = $this->Data_model->getwhere('users_id', $query['id_users'], 'student_data'); // get nisn
                        $verify = $this->Data_model->getwhere('nisn', $student_data['nisn'], 'verify'); // get verify

                        if ($verify['status'] == 0) {
                            $rand = rand(321312, 2132133213);
                            $crypt = crypt($query['username'], $rand);
                            $insert['crypt'] = $crypt;
                            $insert['status'] = 0;

                            $tanggalSekarang = date("Y-m-d h:i:s");
                            $newTanggalSekarang = strtotime($tanggalSekarang);

                            $jumlahHari = 1;
                            $NewjumlahHari = 86400 * $jumlahHari;

                            $hasilJumlah = $newTanggalSekarang + $NewjumlahHari;
                            $tampilHasil = date("Y-m-d h:i:s", $hasilJumlah);

                            $insert['expired'] = $tampilHasil;
                            $emailConfig = array(
                                'protocol' => 'smtp',
                                'smtp_host' => 'ssl://smtp.googlemail.com',
                                'smtp_port' => 465,
                                'smtp_user' => 'alfigofranspratamaa@gmail.com',
                                'smtp_pass' => 'hmhwdqqnsgewgere',
                                'mailtype' => 'html', //text or html
                                'charset' => 'iso-8859-1',
                            );
                            $from = array('email' => 'no-reply@spp.com');
                            $to = array($query['email_address']);
                            $subject = "Register student account.";
                            $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">

                                <head>
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                                    <meta name="x-apple-disable-message-reformatting" />
                                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                    <meta name="color-scheme" content="light dark" />
                                    <meta name="supported-color-schemes" content="light dark" />
                                    <title></title>
                                    <style type="text/css" rel="stylesheet" media="all">
                                        /* Base ------------------------------ */

                                        @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");

                                        body {
                                            width: 100% !important;
                                            height: 100%;
                                            margin: 0;
                                            -webkit-text-size-adjust: none;
                                        }

                                        a {
                                            color: #3869D4;
                                        }

                                        a img {
                                            border: none;
                                        }

                                        td {
                                            word-break: break-word;
                                        }

                                        .preheader {
                                            display: none !important;
                                            visibility: hidden;
                                            mso-hide: all;
                                            font-size: 1px;
                                            line-height: 1px;
                                            max-height: 0;
                                            max-width: 0;
                                            opacity: 0;
                                            overflow: hidden;
                                        }

                                        /* Type ------------------------------ */

                                        body,
                                        td,
                                        th {
                                            font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
                                        }

                                        h1 {
                                            margin-top: 0;
                                            color: #333333;
                                            font-size: 22px;
                                            font-weight: bold;
                                            text-align: left;
                                        }

                                        h2 {
                                            margin-top: 0;
                                            color: #333333;
                                            font-size: 16px;
                                            font-weight: bold;
                                            text-align: left;
                                        }

                                        h3 {
                                            margin-top: 0;
                                            color: #333333;
                                            font-size: 14px;
                                            font-weight: bold;
                                            text-align: left;
                                        }

                                        td,
                                        th {
                                            font-size: 16px;
                                        }

                                        p,
                                        ul,
                                        ol,
                                        blockquote {
                                            margin: .4em 0 1.1875em;
                                            font-size: 16px;
                                            line-height: 1.625;
                                        }

                                        p.sub {
                                            font-size: 13px;
                                        }

                                        /* Utilities ------------------------------ */

                                        .align-right {
                                            text-align: right;
                                        }

                                        .align-left {
                                            text-align: left;
                                        }

                                        .align-center {
                                            text-align: center;
                                        }

                                        .u-margin-bottom-none {
                                            margin-bottom: 0;
                                        }

                                        /* Buttons ------------------------------ */

                                        .button {
                                            background-color: #3869D4;
                                            border-top: 10px solid #3869D4;
                                            border-right: 18px solid #3869D4;
                                            border-bottom: 10px solid #3869D4;
                                            border-left: 18px solid #3869D4;
                                            display: inline-block;
                                            color: #FFF;
                                            text-decoration: none;
                                            border-radius: 3px;
                                            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
                                            -webkit-text-size-adjust: none;
                                            box-sizing: border-box;
                                        }

                                        .button--green {
                                            background-color: #22BC66;
                                            border-top: 10px solid #22BC66;
                                            border-right: 18px solid #22BC66;
                                            border-bottom: 10px solid #22BC66;
                                            border-left: 18px solid #22BC66;
                                        }

                                        .button--red {
                                            background-color: #FF6136;
                                            border-top: 10px solid #FF6136;
                                            border-right: 18px solid #FF6136;
                                            border-bottom: 10px solid #FF6136;
                                            border-left: 18px solid #FF6136;
                                        }

                                        @media only screen and (max-width: 500px) {
                                            .button {
                                                width: 100% !important;
                                                text-align: center !important;
                                            }
                                        }

                                        /* Attribute list ------------------------------ */

                                        .attributes {
                                            margin: 0 0 21px;
                                        }

                                        .attributes_content {
                                            background-color: #F4F4F7;
                                            padding: 16px;
                                        }

                                        .attributes_item {
                                            padding: 0;
                                        }

                                        /* Related Items ------------------------------ */

                                        .related {
                                            width: 100%;
                                            margin: 0;
                                            padding: 25px 0 0 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                        }

                                        .related_item {
                                            padding: 10px 0;
                                            color: #CBCCCF;
                                            font-size: 15px;
                                            line-height: 18px;
                                        }

                                        .related_item-title {
                                            display: block;
                                            margin: .5em 0 0;
                                        }

                                        .related_item-thumb {
                                            display: block;
                                            padding-bottom: 10px;
                                        }

                                        .related_heading {
                                            border-top: 1px solid #CBCCCF;
                                            text-align: center;
                                            padding: 25px 0 10px;
                                        }

                                        /* Discount Code ------------------------------ */

                                        .discount {
                                            width: 100%;
                                            margin: 0;
                                            padding: 24px;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                            background-color: #F4F4F7;
                                            border: 2px dashed #CBCCCF;
                                        }

                                        .discount_heading {
                                            text-align: center;
                                        }

                                        .discount_body {
                                            text-align: center;
                                            font-size: 15px;
                                        }

                                        /* Social Icons ------------------------------ */

                                        .social {
                                            width: auto;
                                        }

                                        .social td {
                                            padding: 0;
                                            width: auto;
                                        }

                                        .social_icon {
                                            height: 20px;
                                            margin: 0 8px 10px 8px;
                                            padding: 0;
                                        }

                                        /* Data table ------------------------------ */

                                        .purchase {
                                            width: 100%;
                                            margin: 0;
                                            padding: 35px 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                        }

                                        .purchase_content {
                                            width: 100%;
                                            margin: 0;
                                            padding: 25px 0 0 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                        }

                                        .purchase_item {
                                            padding: 10px 0;
                                            color: #51545E;
                                            font-size: 15px;
                                            line-height: 18px;
                                        }

                                        .purchase_heading {
                                            padding-bottom: 8px;
                                            border-bottom: 1px solid #EAEAEC;
                                        }

                                        .purchase_heading p {
                                            margin: 0;
                                            color: #85878E;
                                            font-size: 12px;
                                        }

                                        .purchase_footer {
                                            padding-top: 15px;
                                            border-top: 1px solid #EAEAEC;
                                        }

                                        .purchase_total {
                                            margin: 0;
                                            text-align: right;
                                            font-weight: bold;
                                            color: #333333;
                                        }

                                        .purchase_total--label {
                                            padding: 0 15px 0 0;
                                        }

                                        body {
                                            background-color: #F2F4F6;
                                            color: #51545E;
                                        }

                                        p {
                                            color: #51545E;
                                        }

                                        .email-wrapper {
                                            width: 100%;
                                            margin: 0;
                                            padding: 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                            background-color: #F2F4F6;
                                        }

                                        .email-content {
                                            width: 100%;
                                            margin: 0;
                                            padding: 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                        }

                                        /* Masthead ----------------------- */

                                        .email-masthead {
                                            padding: 25px 0;
                                            text-align: center;
                                        }

                                        .email-masthead_logo {
                                            width: 94px;
                                        }

                                        .email-masthead_name {
                                            font-size: 16px;
                                            font-weight: bold;
                                            color: #A8AAAF;
                                            text-decoration: none;
                                            text-shadow: 0 1px 0 white;
                                        }

                                        /* Body ------------------------------ */

                                        .email-body {
                                            width: 100%;
                                            margin: 0;
                                            padding: 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                        }

                                        .email-body_inner {
                                            width: 570px;
                                            margin: 0 auto;
                                            padding: 0;
                                            -premailer-width: 570px;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                            background-color: #FFFFFF;
                                        }

                                        .email-footer {
                                            width: 570px;
                                            margin: 0 auto;
                                            padding: 0;
                                            -premailer-width: 570px;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                            text-align: center;
                                        }

                                        .email-footer p {
                                            color: #A8AAAF;
                                        }

                                        .body-action {
                                            width: 100%;
                                            margin: 30px auto;
                                            padding: 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                            text-align: center;
                                        }

                                        .body-sub {
                                            margin-top: 25px;
                                            padding-top: 25px;
                                            border-top: 1px solid #EAEAEC;
                                        }

                                        .content-cell {
                                            padding: 45px;
                                        }

                                        /*Media Queries ------------------------------ */

                                        @media only screen and (max-width: 600px) {

                                            .email-body_inner,
                                            .email-footer {
                                                width: 100% !important;
                                            }
                                        }

                                        @media (prefers-color-scheme: dark) {

                                            body,
                                            .email-body,
                                            .email-body_inner,
                                            .email-content,
                                            .email-wrapper,
                                            .email-masthead,
                                            .email-footer {
                                                background-color: #333333 !important;
                                                color: #FFF !important;
                                            }

                                            p,
                                            ul,
                                            ol,
                                            blockquote,
                                            h1,
                                            h2,
                                            h3,
                                            span,
                                            .purchase_item {
                                                color: #FFF !important;
                                            }

                                            .attributes_content,
                                            .discount {
                                                background-color: #222 !important;
                                            }

                                            .email-masthead_name {
                                                text-shadow: none !important;
                                            }
                                        }

                                        :root {
                                            color-scheme: light dark;
                                            supported-color-schemes: light dark;
                                        }
                                    </style>
                                    <!--[if mso]>
                                    <style type="text/css">
                                    .f-fallback  {
                                        font-family: Arial, sans-serif;
                                    }
                                    </style>
                                <![endif]-->
                                </head>

                                <body>
                                    <span class="preheader">Student account registration.</span>
                                    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                        <tr>
                                            <td align="center">
                                                <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                    <tr>
                                                        <td class="email-masthead">
                                                            <a href="' . base_url() . '" class="f-fallback email-masthead_name">
                                                                SPP SMKN 4 Payakumbuh
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <!-- Email Body -->
                                                    <tr>
                                                        <td class="email-body" width="570" cellpadding="0" cellspacing="0">
                                                            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                                                <!-- Body content -->
                                                                <tr>
                                                                    <td class="content-cell">
                                                                        <div class="f-fallback">
                                                                            <h1>Welcome, ' . $student_data["name"] . '!</h1>
                                                                            <p>You have registered an account on the SPP SMKN 4 Payakumbuh Website the blue text is your button for activate account, do this primary next step:</p>
                                                                            <!-- Action -->
                                                                            <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                <tr>
                                                                                    <td align="center">
                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                                                                            <tr>
                                                                                                <td align="center">
                                                                                                    <a href="' . base_url('auth/verify/') . $crypt . '" class="f-fallback button" style="color:white !important;">Verify</a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <p>For reference, here\'s your information:</p>
                                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                <tr>
                                                                                    <td class="attributes_content">
                                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                            <tr>
                                                                                                <td class="attributes_item">
                                                                                                    <span class="f-fallback">
                                                                                                        <strong>NISN : </strong> ' . $student_data["nisn"] . '
                                                                                                    </span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="attributes_item">
                                                                                                    <span class="f-fallback">
                                                                                                        <strong>Name : </strong> ' . $student_data["name"] . '
                                                                                                    </span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="attributes_item">
                                                                                                    <span class="f-fallback">
                                                                                                        <strong>Phone : </strong> ' . $student_data["phone"] . '
                                                                                                    </span>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <p>Thanks,
                                                                                <br>SMKN 4 Payakumbuh
                                                                            </p>
                                                                            <table class="body-sub" role="presentation">
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="f-fallback sub">If you\'re having trouble with the button above, copy and paste the URL below into your web browser.</p>
                                                                                        <p class="f-fallback sub"><a href="' . base_url('auth/verify/') . $crypt . '">' . base_url("auth/verify/") . $crypt . '</a></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </body>

                                </html>
                                ';
                            $this->load->library('email', $emailConfig);
                            $this->email->initialize($emailConfig);

                            $this->email->set_newline("\r\n");
                            $this->email->from($from['email']);
                            $this->email->to($to);
                            $this->email->subject($subject);
                            $this->email->message($message);

                            if ($this->email->send()) {
                                $this->Data_model->update('nisn', $student_data['nisn'], 'verify', $insert); // verify baru
                                $this->session->set_flashdata('message', 'onload="swal(\'warning\',\'The account has not been verified\',\'We sent you the latest verification link, please check the message in your email\')"');
                                redirect(base_url(''));
                            } else {
                                $this->session->set_flashdata('message', 'onload="swal(\'error\',\'Error\',\' ' . $this->email->print_debugger() . '\')"');
                                redirect(base_url(''));
                            }
                        } elseif ($verify['status'] == 1) {
                            $array = array(
                                'users' => $query
                            );
                            $this->session->set_userdata($array);
                            $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Login Successfully\',\'Happy logging in student\')"');
                            redirect(base_url('student/dashboard'));
                        }
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
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
        if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
            $data['captcha'] = $this->recaptcha->getWidget();
            $data['title'] = 'Sign Up';
            $data['script_captcha'] = $this->recaptcha->getScriptTag();

            $this->load->view('auth/signup', $data, FALSE);
        } else {
            $nisn = $this->input->post('nisn');

            $username = $this->input->post('username');
            $email_address = $this->input->post('email_address');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $rand = rand(321312, 2132133213);
            $crypt = crypt($username, $rand);
            $student = $this->Data_model->getwhere('nisn', $nisn, 'student_data');

            $student = $this->Data_model->getwhere('nisn', $nisn, 'student_data');
            $account = array(
                'name' => $student['name'],
                'username' => $username,
                'email_address' => $email_address,
                'password' => $password,
                'level' => 'Student'
            );

            $insert['crypt'] = $crypt;
            $insert['nisn'] = $this->input->post('nisn');
            $insert['status'] = 0;

            $tanggalSekarang = date("Y-m-d h:i:s");
            $newTanggalSekarang = strtotime($tanggalSekarang);

            $jumlahHari = 1;
            $NewjumlahHari = 86400 * $jumlahHari;

            $hasilJumlah = $newTanggalSekarang + $NewjumlahHari;
            $tampilHasil = date("Y-m-d h:i:s", $hasilJumlah);

            $insert['expired'] = $tampilHasil;
            $emailConfig = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'alfigofranspratamaa@gmail.com',
                'smtp_pass' => 'hmhwdqqnsgewgere',
                'mailtype' => 'html', //text or html
                'charset' => 'iso-8859-1',
            );
            $from = array('email' => 'no-reply@spp.com');
            $to = array($email_address);
            $subject = "Register student account.";
            $message = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">

            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <meta name="x-apple-disable-message-reformatting" />
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <meta name="color-scheme" content="light dark" />
                <meta name="supported-color-schemes" content="light dark" />
                <title></title>
                <style type="text/css" rel="stylesheet" media="all">
                    /* Base ------------------------------ */

                    @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");

                    body {
                        width: 100% !important;
                        height: 100%;
                        margin: 0;
                        -webkit-text-size-adjust: none;
                    }

                    a {
                        color: #3869D4;
                    }

                    a img {
                        border: none;
                    }

                    td {
                        word-break: break-word;
                    }

                    .preheader {
                        display: none !important;
                        visibility: hidden;
                        mso-hide: all;
                        font-size: 1px;
                        line-height: 1px;
                        max-height: 0;
                        max-width: 0;
                        opacity: 0;
                        overflow: hidden;
                    }

                    /* Type ------------------------------ */

                    body,
                    td,
                    th {
                        font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
                    }

                    h1 {
                        margin-top: 0;
                        color: #333333;
                        font-size: 22px;
                        font-weight: bold;
                        text-align: left;
                    }

                    h2 {
                        margin-top: 0;
                        color: #333333;
                        font-size: 16px;
                        font-weight: bold;
                        text-align: left;
                    }

                    h3 {
                        margin-top: 0;
                        color: #333333;
                        font-size: 14px;
                        font-weight: bold;
                        text-align: left;
                    }

                    td,
                    th {
                        font-size: 16px;
                    }

                    p,
                    ul,
                    ol,
                    blockquote {
                        margin: .4em 0 1.1875em;
                        font-size: 16px;
                        line-height: 1.625;
                    }

                    p.sub {
                        font-size: 13px;
                    }

                    /* Utilities ------------------------------ */

                    .align-right {
                        text-align: right;
                    }

                    .align-left {
                        text-align: left;
                    }

                    .align-center {
                        text-align: center;
                    }

                    .u-margin-bottom-none {
                        margin-bottom: 0;
                    }

                    /* Buttons ------------------------------ */

                    .button {
                        background-color: #3869D4;
                        border-top: 10px solid #3869D4;
                        border-right: 18px solid #3869D4;
                        border-bottom: 10px solid #3869D4;
                        border-left: 18px solid #3869D4;
                        display: inline-block;
                        color: #FFF;
                        text-decoration: none;
                        border-radius: 3px;
                        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
                        -webkit-text-size-adjust: none;
                        box-sizing: border-box;
                    }

                    .button--green {
                        background-color: #22BC66;
                        border-top: 10px solid #22BC66;
                        border-right: 18px solid #22BC66;
                        border-bottom: 10px solid #22BC66;
                        border-left: 18px solid #22BC66;
                    }

                    .button--red {
                        background-color: #FF6136;
                        border-top: 10px solid #FF6136;
                        border-right: 18px solid #FF6136;
                        border-bottom: 10px solid #FF6136;
                        border-left: 18px solid #FF6136;
                    }

                    @media only screen and (max-width: 500px) {
                        .button {
                            width: 100% !important;
                            text-align: center !important;
                        }
                    }

                    /* Attribute list ------------------------------ */

                    .attributes {
                        margin: 0 0 21px;
                    }

                    .attributes_content {
                        background-color: #F4F4F7;
                        padding: 16px;
                    }

                    .attributes_item {
                        padding: 0;
                    }

                    /* Related Items ------------------------------ */

                    .related {
                        width: 100%;
                        margin: 0;
                        padding: 25px 0 0 0;
                        -premailer-width: 100%;
                        -premailer-cellpadding: 0;
                        -premailer-cellspacing: 0;
                    }

                    .related_item {
                        padding: 10px 0;
                        color: #CBCCCF;
                        font-size: 15px;
                        line-height: 18px;
                    }

                    .related_item-title {
                        display: block;
                        margin: .5em 0 0;
                    }

                    .related_item-thumb {
                        display: block;
                        padding-bottom: 10px;
                    }

                    .related_heading {
                        border-top: 1px solid #CBCCCF;
                        text-align: center;
                        padding: 25px 0 10px;
                    }

                    /* Discount Code ------------------------------ */

                    .discount {
                        width: 100%;
                        margin: 0;
                        padding: 24px;
                        -premailer-width: 100%;
                        -premailer-cellpadding: 0;
                        -premailer-cellspacing: 0;
                        background-color: #F4F4F7;
                        border: 2px dashed #CBCCCF;
                    }

                    .discount_heading {
                        text-align: center;
                    }

                    .discount_body {
                        text-align: center;
                        font-size: 15px;
                    }

                    /* Social Icons ------------------------------ */

                    .social {
                        width: auto;
                    }

                    .social td {
                        padding: 0;
                        width: auto;
                    }

                    .social_icon {
                        height: 20px;
                        margin: 0 8px 10px 8px;
                        padding: 0;
                    }

                    /* Data table ------------------------------ */

                    .purchase {
                        width: 100%;
                        margin: 0;
                        padding: 35px 0;
                        -premailer-width: 100%;
                        -premailer-cellpadding: 0;
                        -premailer-cellspacing: 0;
                    }

                    .purchase_content {
                        width: 100%;
                        margin: 0;
                        padding: 25px 0 0 0;
                        -premailer-width: 100%;
                        -premailer-cellpadding: 0;
                        -premailer-cellspacing: 0;
                    }

                    .purchase_item {
                        padding: 10px 0;
                        color: #51545E;
                        font-size: 15px;
                        line-height: 18px;
                    }

                    .purchase_heading {
                        padding-bottom: 8px;
                        border-bottom: 1px solid #EAEAEC;
                    }

                    .purchase_heading p {
                        margin: 0;
                        color: #85878E;
                        font-size: 12px;
                    }

                    .purchase_footer {
                        padding-top: 15px;
                        border-top: 1px solid #EAEAEC;
                    }

                    .purchase_total {
                        margin: 0;
                        text-align: right;
                        font-weight: bold;
                        color: #333333;
                    }

                    .purchase_total--label {
                        padding: 0 15px 0 0;
                    }

                    body {
                        background-color: #F2F4F6;
                        color: #51545E;
                    }

                    p {
                        color: #51545E;
                    }

                    .email-wrapper {
                        width: 100%;
                        margin: 0;
                        padding: 0;
                        -premailer-width: 100%;
                        -premailer-cellpadding: 0;
                        -premailer-cellspacing: 0;
                        background-color: #F2F4F6;
                    }

                    .email-content {
                        width: 100%;
                        margin: 0;
                        padding: 0;
                        -premailer-width: 100%;
                        -premailer-cellpadding: 0;
                        -premailer-cellspacing: 0;
                    }

                    /* Masthead ----------------------- */

                    .email-masthead {
                        padding: 25px 0;
                        text-align: center;
                    }

                    .email-masthead_logo {
                        width: 94px;
                    }

                    .email-masthead_name {
                        font-size: 16px;
                        font-weight: bold;
                        color: #A8AAAF;
                        text-decoration: none;
                        text-shadow: 0 1px 0 white;
                    }

                    /* Body ------------------------------ */

                    .email-body {
                        width: 100%;
                        margin: 0;
                        padding: 0;
                        -premailer-width: 100%;
                        -premailer-cellpadding: 0;
                        -premailer-cellspacing: 0;
                    }

                    .email-body_inner {
                        width: 570px;
                        margin: 0 auto;
                        padding: 0;
                        -premailer-width: 570px;
                        -premailer-cellpadding: 0;
                        -premailer-cellspacing: 0;
                        background-color: #FFFFFF;
                    }

                    .email-footer {
                        width: 570px;
                        margin: 0 auto;
                        padding: 0;
                        -premailer-width: 570px;
                        -premailer-cellpadding: 0;
                        -premailer-cellspacing: 0;
                        text-align: center;
                    }

                    .email-footer p {
                        color: #A8AAAF;
                    }

                    .body-action {
                        width: 100%;
                        margin: 30px auto;
                        padding: 0;
                        -premailer-width: 100%;
                        -premailer-cellpadding: 0;
                        -premailer-cellspacing: 0;
                        text-align: center;
                    }

                    .body-sub {
                        margin-top: 25px;
                        padding-top: 25px;
                        border-top: 1px solid #EAEAEC;
                    }

                    .content-cell {
                        padding: 45px;
                    }

                    /*Media Queries ------------------------------ */

                    @media only screen and (max-width: 600px) {

                        .email-body_inner,
                        .email-footer {
                            width: 100% !important;
                        }
                    }

                    @media (prefers-color-scheme: dark) {

                        body,
                        .email-body,
                        .email-body_inner,
                        .email-content,
                        .email-wrapper,
                        .email-masthead,
                        .email-footer {
                            background-color: #333333 !important;
                            color: #FFF !important;
                        }

                        p,
                        ul,
                        ol,
                        blockquote,
                        h1,
                        h2,
                        h3,
                        span,
                        .purchase_item {
                            color: #FFF !important;
                        }

                        .attributes_content,
                        .discount {
                            background-color: #222 !important;
                        }

                        .email-masthead_name {
                            text-shadow: none !important;
                        }
                    }

                    :root {
                        color-scheme: light dark;
                        supported-color-schemes: light dark;
                    }
                </style>
                <!--[if mso]>
                <style type="text/css">
                .f-fallback  {
                    font-family: Arial, sans-serif;
                }
                </style>
            <![endif]-->
            </head>

            <body>
                <span class="preheader">Student account registration.</span>
                <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td align="center">
                            <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td class="email-masthead">
                                        <a href="' . base_url() . '" class="f-fallback email-masthead_name">
                                            SPP SMKN 4 Payakumbuh
                                        </a>
                                    </td>
                                </tr>
                                <!-- Email Body -->
                                <tr>
                                    <td class="email-body" width="570" cellpadding="0" cellspacing="0">
                                        <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                            <!-- Body content -->
                                            <tr>
                                                <td class="content-cell">
                                                    <div class="f-fallback">
                                                        <h1>Welcome, ' . $student["name"] . '!</h1>
                                                        <p>You have registered an account on the SPP SMKN 4 Payakumbuh Website the blue text is your button for activate account, do this primary next step:</p>
                                                        <!-- Action -->
                                                        <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                            <tr>
                                                                <td align="center">
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                                                        <tr>
                                                                            <td align="center">
                                                                                <a href="' . base_url('auth/verify/') . $crypt . '" class="f-fallback button" style="color:white !important;">Verify</a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <p>For reference, here\'s your information:</p>
                                                        <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                            <tr>
                                                                <td class="attributes_content">
                                                                    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                        <tr>
                                                                            <td class="attributes_item">
                                                                                <span class="f-fallback">
                                                                                    <strong>NISN : </strong> ' . $student["nisn"] . '
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="attributes_item">
                                                                                <span class="f-fallback">
                                                                                    <strong>Name : </strong> ' . $student["name"] . '
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="attributes_item">
                                                                                <span class="f-fallback">
                                                                                    <strong>Phone : </strong> ' . $student["phone"] . '
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <p>Thanks,
                                                            <br>SMKN 4 Payakumbuh
                                                        </p>
                                                        <table class="body-sub" role="presentation">
                                                            <tr>
                                                                <td>
                                                                    <p class="f-fallback sub">If you\'re having trouble with the button above, copy and paste the URL below into your web browser.</p>
                                                                    <p class="f-fallback sub"><a href="' . base_url('auth/verify/') . $crypt . '">' . base_url("auth/verify/") . $crypt . '</a></p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>

            </html>
            ';
            $this->load->library('email', $emailConfig);
            $this->email->initialize($emailConfig);

            $this->email->set_newline("\r\n");
            $this->email->from($from['email']);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                $this->Data_model->insert('verify', $insert);
                $acc = $this->Data_model->insert('tb_users', $account);
                $u = $this->db->get_where('tb_users', $account)->row_array();
                $update['users_id'] = $u['id_users'];
                $this->Data_model->update('nisn', $nisn, 'student_data', $update);
                $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Account register successfully\',\'Please check your email for verify\')"');
                redirect(base_url(''));
            } else {
                $this->session->set_flashdata('message', 'onload="swal(\'error\',\'Error\',\' ' . $this->email->print_debugger() . '\')"');
                redirect(base_url(''));
            }
        }
    }

    public function verify($crypt)
    {
        $cek = $this->Data_model->getwhere('crypt', $crypt, 'verify');
        if ($cek != null) {
            $student_data = $this->Data_model->getwhere('nisn', $cek['nisn'], 'student_data');
            $query = $this->Data_model->getwhere('id_users', $student_data['users_id'], 'tb_users');
            $now = date("Y-m-d H:i:s");

            if ($cek['expired'] > $now) {
                $update['status'] = 1;
                $this->Data_model->update('crypt', $crypt, 'verify', $update);
                $array = array(
                    'users' => $query
                );
                $this->session->set_userdata($array);
                $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Account Verify and Login Successfully\',\'Happy logging in student\')"');
                redirect(base_url('student/dashboard'));
            } else {
                $rand = rand(321312, 2132133213);
                $crypt = crypt($query['username'], $rand);
                $insert['crypt'] = $crypt;
                $insert['status'] = 0;

                $tanggalSekarang = date("Y-m-d h:i:s");
                $newTanggalSekarang = strtotime($tanggalSekarang);

                $jumlahHari = 1;
                $NewjumlahHari = 86400 * $jumlahHari;

                $hasilJumlah = $newTanggalSekarang + $NewjumlahHari;
                $tampilHasil = date("Y-m-d h:i:s", $hasilJumlah);

                $insert['expired'] = $tampilHasil;

                $emailConfig = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'alfigofranspratamaa@gmail.com',
                    'smtp_pass' => 'hmhwdqqnsgewgere',
                    'mailtype' => 'html', //text or html
                    'charset' => 'iso-8859-1',
                );
                $from = array('email' => 'no-reply@spp.com');
                $to = array($query['email_address']);
                $subject = "Register student account.";
                $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">

                                <head>
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                                    <meta name="x-apple-disable-message-reformatting" />
                                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                    <meta name="color-scheme" content="light dark" />
                                    <meta name="supported-color-schemes" content="light dark" />
                                    <title></title>
                                    <style type="text/css" rel="stylesheet" media="all">
                                        /* Base ------------------------------ */

                                        @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");

                                        body {
                                            width: 100% !important;
                                            height: 100%;
                                            margin: 0;
                                            -webkit-text-size-adjust: none;
                                        }

                                        a {
                                            color: #3869D4;
                                        }

                                        a img {
                                            border: none;
                                        }

                                        td {
                                            word-break: break-word;
                                        }

                                        .preheader {
                                            display: none !important;
                                            visibility: hidden;
                                            mso-hide: all;
                                            font-size: 1px;
                                            line-height: 1px;
                                            max-height: 0;
                                            max-width: 0;
                                            opacity: 0;
                                            overflow: hidden;
                                        }

                                        /* Type ------------------------------ */

                                        body,
                                        td,
                                        th {
                                            font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
                                        }

                                        h1 {
                                            margin-top: 0;
                                            color: #333333;
                                            font-size: 22px;
                                            font-weight: bold;
                                            text-align: left;
                                        }

                                        h2 {
                                            margin-top: 0;
                                            color: #333333;
                                            font-size: 16px;
                                            font-weight: bold;
                                            text-align: left;
                                        }

                                        h3 {
                                            margin-top: 0;
                                            color: #333333;
                                            font-size: 14px;
                                            font-weight: bold;
                                            text-align: left;
                                        }

                                        td,
                                        th {
                                            font-size: 16px;
                                        }

                                        p,
                                        ul,
                                        ol,
                                        blockquote {
                                            margin: .4em 0 1.1875em;
                                            font-size: 16px;
                                            line-height: 1.625;
                                        }

                                        p.sub {
                                            font-size: 13px;
                                        }

                                        /* Utilities ------------------------------ */

                                        .align-right {
                                            text-align: right;
                                        }

                                        .align-left {
                                            text-align: left;
                                        }

                                        .align-center {
                                            text-align: center;
                                        }

                                        .u-margin-bottom-none {
                                            margin-bottom: 0;
                                        }

                                        /* Buttons ------------------------------ */

                                        .button {
                                            background-color: #3869D4;
                                            border-top: 10px solid #3869D4;
                                            border-right: 18px solid #3869D4;
                                            border-bottom: 10px solid #3869D4;
                                            border-left: 18px solid #3869D4;
                                            display: inline-block;
                                            color: #FFF;
                                            text-decoration: none;
                                            border-radius: 3px;
                                            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
                                            -webkit-text-size-adjust: none;
                                            box-sizing: border-box;
                                        }

                                        .button--green {
                                            background-color: #22BC66;
                                            border-top: 10px solid #22BC66;
                                            border-right: 18px solid #22BC66;
                                            border-bottom: 10px solid #22BC66;
                                            border-left: 18px solid #22BC66;
                                        }

                                        .button--red {
                                            background-color: #FF6136;
                                            border-top: 10px solid #FF6136;
                                            border-right: 18px solid #FF6136;
                                            border-bottom: 10px solid #FF6136;
                                            border-left: 18px solid #FF6136;
                                        }

                                        @media only screen and (max-width: 500px) {
                                            .button {
                                                width: 100% !important;
                                                text-align: center !important;
                                            }
                                        }

                                        /* Attribute list ------------------------------ */

                                        .attributes {
                                            margin: 0 0 21px;
                                        }

                                        .attributes_content {
                                            background-color: #F4F4F7;
                                            padding: 16px;
                                        }

                                        .attributes_item {
                                            padding: 0;
                                        }

                                        /* Related Items ------------------------------ */

                                        .related {
                                            width: 100%;
                                            margin: 0;
                                            padding: 25px 0 0 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                        }

                                        .related_item {
                                            padding: 10px 0;
                                            color: #CBCCCF;
                                            font-size: 15px;
                                            line-height: 18px;
                                        }

                                        .related_item-title {
                                            display: block;
                                            margin: .5em 0 0;
                                        }

                                        .related_item-thumb {
                                            display: block;
                                            padding-bottom: 10px;
                                        }

                                        .related_heading {
                                            border-top: 1px solid #CBCCCF;
                                            text-align: center;
                                            padding: 25px 0 10px;
                                        }

                                        /* Discount Code ------------------------------ */

                                        .discount {
                                            width: 100%;
                                            margin: 0;
                                            padding: 24px;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                            background-color: #F4F4F7;
                                            border: 2px dashed #CBCCCF;
                                        }

                                        .discount_heading {
                                            text-align: center;
                                        }

                                        .discount_body {
                                            text-align: center;
                                            font-size: 15px;
                                        }

                                        /* Social Icons ------------------------------ */

                                        .social {
                                            width: auto;
                                        }

                                        .social td {
                                            padding: 0;
                                            width: auto;
                                        }

                                        .social_icon {
                                            height: 20px;
                                            margin: 0 8px 10px 8px;
                                            padding: 0;
                                        }

                                        /* Data table ------------------------------ */

                                        .purchase {
                                            width: 100%;
                                            margin: 0;
                                            padding: 35px 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                        }

                                        .purchase_content {
                                            width: 100%;
                                            margin: 0;
                                            padding: 25px 0 0 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                        }

                                        .purchase_item {
                                            padding: 10px 0;
                                            color: #51545E;
                                            font-size: 15px;
                                            line-height: 18px;
                                        }

                                        .purchase_heading {
                                            padding-bottom: 8px;
                                            border-bottom: 1px solid #EAEAEC;
                                        }

                                        .purchase_heading p {
                                            margin: 0;
                                            color: #85878E;
                                            font-size: 12px;
                                        }

                                        .purchase_footer {
                                            padding-top: 15px;
                                            border-top: 1px solid #EAEAEC;
                                        }

                                        .purchase_total {
                                            margin: 0;
                                            text-align: right;
                                            font-weight: bold;
                                            color: #333333;
                                        }

                                        .purchase_total--label {
                                            padding: 0 15px 0 0;
                                        }

                                        body {
                                            background-color: #F2F4F6;
                                            color: #51545E;
                                        }

                                        p {
                                            color: #51545E;
                                        }

                                        .email-wrapper {
                                            width: 100%;
                                            margin: 0;
                                            padding: 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                            background-color: #F2F4F6;
                                        }

                                        .email-content {
                                            width: 100%;
                                            margin: 0;
                                            padding: 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                        }

                                        /* Masthead ----------------------- */

                                        .email-masthead {
                                            padding: 25px 0;
                                            text-align: center;
                                        }

                                        .email-masthead_logo {
                                            width: 94px;
                                        }

                                        .email-masthead_name {
                                            font-size: 16px;
                                            font-weight: bold;
                                            color: #A8AAAF;
                                            text-decoration: none;
                                            text-shadow: 0 1px 0 white;
                                        }

                                        /* Body ------------------------------ */

                                        .email-body {
                                            width: 100%;
                                            margin: 0;
                                            padding: 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                        }

                                        .email-body_inner {
                                            width: 570px;
                                            margin: 0 auto;
                                            padding: 0;
                                            -premailer-width: 570px;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                            background-color: #FFFFFF;
                                        }

                                        .email-footer {
                                            width: 570px;
                                            margin: 0 auto;
                                            padding: 0;
                                            -premailer-width: 570px;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                            text-align: center;
                                        }

                                        .email-footer p {
                                            color: #A8AAAF;
                                        }

                                        .body-action {
                                            width: 100%;
                                            margin: 30px auto;
                                            padding: 0;
                                            -premailer-width: 100%;
                                            -premailer-cellpadding: 0;
                                            -premailer-cellspacing: 0;
                                            text-align: center;
                                        }

                                        .body-sub {
                                            margin-top: 25px;
                                            padding-top: 25px;
                                            border-top: 1px solid #EAEAEC;
                                        }

                                        .content-cell {
                                            padding: 45px;
                                        }

                                        /*Media Queries ------------------------------ */

                                        @media only screen and (max-width: 600px) {

                                            .email-body_inner,
                                            .email-footer {
                                                width: 100% !important;
                                            }
                                        }

                                        @media (prefers-color-scheme: dark) {

                                            body,
                                            .email-body,
                                            .email-body_inner,
                                            .email-content,
                                            .email-wrapper,
                                            .email-masthead,
                                            .email-footer {
                                                background-color: #333333 !important;
                                                color: #FFF !important;
                                            }

                                            p,
                                            ul,
                                            ol,
                                            blockquote,
                                            h1,
                                            h2,
                                            h3,
                                            span,
                                            .purchase_item {
                                                color: #FFF !important;
                                            }

                                            .attributes_content,
                                            .discount {
                                                background-color: #222 !important;
                                            }

                                            .email-masthead_name {
                                                text-shadow: none !important;
                                            }
                                        }

                                        :root {
                                            color-scheme: light dark;
                                            supported-color-schemes: light dark;
                                        }
                                    </style>
                                    <!--[if mso]>
                                    <style type="text/css">
                                    .f-fallback  {
                                        font-family: Arial, sans-serif;
                                    }
                                    </style>
                                <![endif]-->
                                </head>

                                <body>
                                    <span class="preheader">Student account registration.</span>
                                    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                        <tr>
                                            <td align="center">
                                                <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                    <tr>
                                                        <td class="email-masthead">
                                                            <a href="' . base_url() . '" class="f-fallback email-masthead_name">
                                                                SPP SMKN 4 Payakumbuh
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <!-- Email Body -->
                                                    <tr>
                                                        <td class="email-body" width="570" cellpadding="0" cellspacing="0">
                                                            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                                                <!-- Body content -->
                                                                <tr>
                                                                    <td class="content-cell">
                                                                        <div class="f-fallback">
                                                                            <h1>Welcome, ' . $student_data["name"] . '!</h1>
                                                                            <p>You have registered an account on the SPP SMKN 4 Payakumbuh Website the blue text is your button for activate account, do this primary next step:</p>
                                                                            <!-- Action -->
                                                                            <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                <tr>
                                                                                    <td align="center">
                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                                                                            <tr>
                                                                                                <td align="center">
                                                                                                    <a href="' . base_url('auth/verify/') . $crypt . '" class="f-fallback button" style="color:white !important;">Verify</a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <p>For reference, here\'s your information:</p>
                                                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                <tr>
                                                                                    <td class="attributes_content">
                                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                            <tr>
                                                                                                <td class="attributes_item">
                                                                                                    <span class="f-fallback">
                                                                                                        <strong>NISN : </strong> ' . $student_data["nisn"] . '
                                                                                                    </span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="attributes_item">
                                                                                                    <span class="f-fallback">
                                                                                                        <strong>Name : </strong> ' . $student_data["name"] . '
                                                                                                    </span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="attributes_item">
                                                                                                    <span class="f-fallback">
                                                                                                        <strong>Phone : </strong> ' . $student_data["phone"] . '
                                                                                                    </span>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <p>Thanks,
                                                                                <br>SMKN 4 Payakumbuh
                                                                            </p>
                                                                            <table class="body-sub" role="presentation">
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="f-fallback sub">If you\'re having trouble with the button above, copy and paste the URL below into your web browser.</p>
                                                                                        <p class="f-fallback sub"><a href="' . base_url('auth/verify/') . $crypt . '">' . base_url("auth/verify/") . $crypt . '</a></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </body>

                                </html>
                                ';
                $this->load->library('email', $emailConfig);
                $this->email->initialize($emailConfig);

                $this->email->set_newline("\r\n");
                $this->email->from($from['email']);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);

                if ($this->email->send()) {
                    $this->Data_model->update('nisn', $student_data['nisn'], 'verify', $insert); // verify baru
                    $this->session->set_flashdata('message', 'onload="swal(\'warning\',\'Verification link has expired\',\'We sent you the latest verification link, please check the message in your email\')"');
                    redirect(base_url(''));
                } else {
                    $this->session->set_flashdata('message', 'onload="swal(\'error\',\'Error\',\' ' . $this->email->print_debugger() . '\')"');
                    redirect(base_url(''));
                }
            }
        } else {
            // invalid verify code
            $this->session->set_flashdata('message', 'onload="swal(\'error\',\'Invalid Verify Link\',\'Please login again for resend link verification\')"');
            redirect(base_url(''));
        }
    }

    public function nisn_check($str)
    {
        $query = $this->db->query("SELECT * FROM student_data a LEFT JOIN tb_users b ON a.users_id = b.id_users WHERE a.nisn = '$str'")->row_array();
        if ($query == null) {
            $this->form_validation->set_message('nisn_check', '{field} not Registered');
            return FALSE;
        } else {
            if ($query['users_id'] != null) {
                $this->form_validation->set_message('nisn_check', 'The account has been registered using this {field}');
                return FALSE;
            }
            return TRUE;
        }
    }

    public function changepassword()
    {
        $users = $this->session->userdata('users');
        $users = $this->db->get_where('tb_users', ['id_users' => $users['id_users']])->row_array();
        
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        if (password_verify($current_password, $users['password'])) {
            if ($new_password == $confirm_password) {
                $data['password'] = password_hash($new_password, PASSWORD_DEFAULT);
                $this->session->set_flashdata('message', 'onload="swal(\'success\',\'Success\',\'Password Change Successfully\')"');
                redirect(base_url($users['level'] . '/dashboard'));
            } else {
                $this->session->set_flashdata('message', 'onload="swal(\'error\',\'Error\',\'Password Confirm dont match\')"');
                redirect(base_url($users['level'] .'/dashboard'));
            }
        } else {
            $this->session->set_flashdata('message', 'onload="swal(\'error\',\'Error\',\'Current password wrong !\')"');
            redirect(base_url($users['level'] . '/dashboard'));
        }
        
    }
}

/* End of file Auth.php */
