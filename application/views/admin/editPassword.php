<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Edit Password</div>
                    <br>
                </div>
            </div>
        </div>

        <?=$this->session->flashdata('alert')?>


        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <form class="" method="POST" action="<?=base_url('admin/dashboard/ubahPw')?>">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail11" class="">
                                            New Password</label><input name="pw1" id="pw1" placeholder="New Password"
                                            type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="examplePassword11"
                                            class="">Confirm Password</label><input name="pw2" id="pw2"
                                            placeholder="Confirm Password" type="password" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <button class="mt-2 btn btn-primary">Ubah</button>

                            <!-- <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Basic Modal
                            </button> -->

                            <!-- <button onclick="myFunction()">Show dialog</button> -->
                        </form>

                        <!-- <?=$this->session->flashdata('success')?> -->

                        <?php if ($this->session->flashdata('success')): ?>
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            $('#exampleModal').modal('show');
                        });
                        </script>
                        <?php endif;?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                    unknown printer took a galley of type and scrambled.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>

        </div>
    </div>
</div>

<!-- <?php if ($this->session->flashdata('success')): ?>

<script>
var person = prompt("Please enter your name", "Harry Potter");
</script>

<?php endif;?> -->


<script src="<?=base_url('assets/vendor/jquery/jquery.min.js');?>"></script>