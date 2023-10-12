<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Kode Akses Superadmin</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Ubah Kode Akses</h5>

                        <form class="" action="<?=base_url('admin/dashboard/updateKode')?>" method="post">
                            <div class="form-row">
                                <div class="col-sm">
                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Kode
                                            Akses</label><input name="kode" id="exampleEmail11" type="text"
                                            class="form-control" value="<?=$kodeAkses->password?>">
                                        <input name="id_kode" id="exampleEmail11" type="text" class="form-control"
                                            value="<?=$kodeAkses->id_password?>" hidden>
                                    </div>
                                </div>
                            </div>
                            <button class="mt-2 btn btn-primary" type="submit">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>
            <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
            </script>
        </div>
    </div>
</div>
