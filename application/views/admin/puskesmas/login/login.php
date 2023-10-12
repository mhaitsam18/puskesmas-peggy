<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Puskesmas - Login</title>

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url(
    'assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet'
); ?>" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?=base_url(
    'assets/css/sb-admin-2.min.css'
)?>" rel="stylesheet">

    </head>

    <body class="bg-gradient-primary">

        <style type="text/css">
        .bck-log {
            background: url("<?=base_url('assets/img/bakti-husada.png')?>");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-size: 250px 350px;
        }
        </style>
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">

                            <!-- Nested Row within Card Body -->

                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bck-log"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        <?=$this->session->flashdata('alert')?>
                                        <?=$this->session->flashdata(
    'alert_not_active'
)?>
                                        <?php if (
    $this->session->flashdata('success')
) {?>
                                        <?=$this->session->flashdata('success')?>
                                        <?php } elseif (
    $this->session->flashdata('error')
) {?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata(
    'error'
); ?>
                                        </div>
                                        <?php }?>
                                        <form class="user" action="<?=site_url(
    'puskesmas/login/cek_login'
)?>" method="POST">

                                            <!-- <?=base_url()?> -->
                                            <!-- <div class="form-group">
                      <input type="number" name="id_petugas" class="form-control form-control-user" id="id_petugas" placeholder="id petugas" readonly>
                    </div> -->
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Enter Email Address..." autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password"
                                                    class="form-control form-control-user" id="exampleInputPassword"
                                                    placeholder="Password">
                                            </div>




                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-user btn-block"
                                                    value="Login" />
                                            </div>

                                            <div class="text-center">
                                                <a class="small" href="<?php echo base_url(
    'home/reza'
); ?>">Menu Login Awal</a>
                                            </div>


                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?=base_url(
    'assets/vendor/jquery/jquery.min.js'
)?>"></script>
        <script src="<?=base_url(
    'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'
)?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?=base_url(
    'assets/vendor/jquery-easing/jquery.easing.min.js'
)?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?=base_url('assets/js/sb-admin-2.min.js')?>"></script>

    </body>

</html>