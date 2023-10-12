<!-- <form action="<?php echo base_url('petugas/save_mk')?>" method="POST">
<table border="">
    <tr>
        <td>Nama Mata Kuliah</td>
        <td><input type="text" name="matkul"></td>
</tr>
<tr>
        <td>SKS</td>
        <td><input type="text" name="sks"></td>
</tr>
<tr>
    <td><input type="submit" value="simpan"></td>
</tr>
</table>
</form> -->
<?php if(!empty(validation_errors())){?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo validation_errors()?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
</button>
</div>
<?php }?>

<form action="<?php echo base_url('petugas/addForm')?>" method="POST">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">ID Petugas</label>
        <div class="col-sm-3">
            <input type="text" name="id_petugas" class="form-control" id="inputEmail3">
</div>
</div>
<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-3">
            <input type="email" name="username" class="form-control" id="inputEmail3">
</div>
</div>
<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-3">
            <input type="text" name="nama" class="form-control" id="inputEmail3">
</div>
</div>
<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-20">
            <input type="file" name="foto" class="form-control-file">
</div>
</div>
<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-3">
            <input type="password" name="password" class="form-control" id="inputEmail3">
</div>
</div>
<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-3">
            <input type="submit" value="Simpan" class="btn btn-success">
            <a href="<?php base_url('petugas')?>" class="btn btn-danger">Batal</a>
</div>
</div>
</form>



