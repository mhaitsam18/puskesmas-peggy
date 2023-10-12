<div class="container-fluid">

<?php $this->load->view('admin/_partials/breadcrumb');?>

    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4 pull-right">
                    <h4><b>Reminder</b></h4>
                </div>
            </div> 
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="<?= site_url('posyandu/reminder/send')?>" method="post">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Tuliskan pesan" name="pesan"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" id="btn-delete" class="btn btn-success" value="Kirim">
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- End of Main Content -->
</div>