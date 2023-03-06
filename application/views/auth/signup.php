<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title>SPP SMK NEgeri 4 Payakumbuh</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/') ?>images/favicon.png">
    <link href="<?= base_url('assets/') ?>vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <?= $script_captcha ?>

    <style>
        .btn-primary {
            background-color: #065d98 !important;
            border-color: #065d98 !important;
            color: white !important;
        }

        .btn-primary:hover {
            background-color: #3183d4 !important;
            border-color: #3183d4 !important;
            color: #ddd !important;
        }

        a:hover {
            color: #3183d4 !important;
        }

        a.text-primary {
            color: #065d98 !important;
        }

        a.text-primary:hover {
            color: #3183d4 !important;
        }
    </style>
</head>

<body class="" style="height: 103vh;" <?= $this->session->flashdata('message'); ?>>
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <img src="<?= base_url('assets/') ?>images/icon-navbar.png" height="100" alt="">
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="<?= base_url('auth/signup') ?>" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>NISN Registered by the employee</strong></label>
                                            <input type="text" class="form-control" name="nisn" value="<?= set_value('nisn') ?>" placeholder="ex : 123456xxx" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            <?= form_error('nisn', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="username" value="<?= set_value('username') ?>" placeholder="nana_mizuki">
                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email Address</strong></label>
                                            <input type="text" class="form-control" name="email_address" value="<?= set_value('email_address') ?>" placeholder="nanamizuki@gmail.com">
                                            <?= form_error('email_address', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control" placeholder="*******">
                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <?= $captcha ?>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="<?= base_url('') ?>">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('assets/') ?>vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/deznav-init.js"></script>
    <script>
        function swal(icn, titles, texts) {
            Swal.fire(
                titles,
                texts,
                icn
            )
        }
    </script>


</body>

</html>