<style type="text/css">
	.gmb {margin: auto; padding: 10px}
</style>
<div class="container-fluid">

    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4 pull-right">
                    <h4><b>Surat Rujukan</b></h4>
                </div>
            </div> 
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p>Silahkan upload file surat rujukan<br>
                    <small><b>dalam format PDF</b></small>
                    </p>
                </div>
                <div class="col">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="background-color: #3498db;color: #fff" id="inputGroupFileAddon01">Upload</span>
                      </div>
                      <div class="custom-file">
                        <input id="filePDF" name="berkas" type="file" class="custom-file-input" accept="application/pdf" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="filePDF">Choose file</label>
                      </div>
                  </div>
                </div>
            </div>
            </div>
            <div id="frameShowDokumen"></div>
        </div>
    </div>
<!-- End of Main Content -->
</div>

 
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script>
$("#filePDF").on("change", function(){
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $('#frameShowDokumen').empty();
    $('#frameShowDokumen').append('<div style="position: relative;">'
        +'<div style="width: 100%;overflow: auto;position: relative;height: auto; margin-top: 70px;">'
            +'<iframe src="'+tmppath+'" id="framePDF"  width="100%" height="800px" allowfullscreen="" webkitallowfullscreen=""></iframe>'
        +'<div>'
    +'</div>');
    $('#framePDF').focus();
});
</script>

