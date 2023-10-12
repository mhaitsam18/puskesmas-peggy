<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Posyandu - Login</title>

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
            background-size: 350px 500px;
        }
        </style>
        <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bck-log"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Pendapaftaran Petugas <br><b>POSYANDU</b></h1><br>
                                </div>

                                <?=$this->session->flashdata('pesan')?>

                                <form class="user" action="<?php echo site_url(
    'posyandu/PetugasPosiandu/add'
); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" name="nama" class="form-control form-control-user"
                                                id="nama" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="email" placeholder="Email Address">
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <select class="custom-select" id="inputGroupSelect02"
                                                style="border-top-left-radius: 16px;border-bottom-left-radius: 16px;"
                                                name="wilayah">
                                                <option selected>Pilih Wilayah...</option>
                                                <?php foreach ($wilayah as $w): ?>


                                                <option value="<?=$w->id_wilayah?>"><?=$w->nama_wilayah?></option>


                                                <?php endforeach;?>

                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    style="background-color: #3498db;color: #fff"
                                                    id="inputGroupFileAddon01">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="foto" id="foto">
                                                <label class="custom-file-label" for="foto">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                      <input type="text" name="pekerjaan" class="form-control form-control-user" id="exampleInputPassword" placeholder="Pekerjaan">
                    </div> -->
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group row mb-4 mb-sm-4">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="submit" class="btn btn-primary btn-user btn-block" name="btn"
                                                value="Register Account">
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?php echo site_url(
    'posyandu/PetugasPosiandu'
); ?>">Already have an account? Login!</a>
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
