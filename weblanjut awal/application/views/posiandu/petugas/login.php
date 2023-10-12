
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet');?>" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/css/sb-admin-2.min.css');?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<style type="text/css">
.bck-log {
  background: url("<?= base_url('assets/img/bakti-husada.png');?>");
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
            <?php if ($this->session->flashdata('successRegis')){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php }else if ($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php }?> 
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bck-log"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Posyandu</h1>
                  </div>
                  <form class="user" action="<?= site_url('posyandu/PetugasPosiandu') ?>" method="POST">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login" />
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo site_url('posyandu/PetugasPosiandu/registrasi'); ?>">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Modal -->
<div class="modal fade" id="notifSukses" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Berhasil Login!</h5>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo site_url('posyandu/home') ?>">
          <div class="form-group">
            <label for="inputState">Wilayah</label>
            <select name="wilayah" id="inputState" class="form-control">
              <?php foreach ($wilayah as $data):?>
              <option value="<?php echo $data->id_wilayah ?>"><?php echo $data->nama_wilayah ?></option>
          <?php endforeach ?>
            </select>
          </div>
          </select>
        
      </div>
      <div class="modal-footer">
        <a href="<?php echo site_url('posyandu/PetugasPosiandu/logout') ?>"><button type="button" class="btn btn-danger">Tidak</button></a>
        <input type="submit" name="" class="btn btn-primary" value="Lanjut">
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end moda; -->

<?php 

if ($this->session->flashdata('success')): ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#notifSukses').modal('show');
  });
</script>
<?php endif; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/js/sb-admin-2.min.js');?>"></script>

</body>

</html>
