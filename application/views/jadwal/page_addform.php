
<!-- <form action="<?php echo base_url('jadwal/save_mk')?>" method="POST">
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
body{
    background-color:#4169E1;
    color: white;
    margin-top: 150px;
    margin-left: 600px;
    
}
</style>

<?php if(!empty(validation_errors())){?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo validation_errors()?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
</button>
</div>
<?php }?>

<h1>Tambah Data Jadwal Petugas</h1>
<br></br><br></br>
<center>
<form action="<?php echo base_url('jadwal/addForm')?>" method="POST">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">ID Jadwal</label>
        <div class="col-sm-3">
            <input type="number" name="id_jadwal" class="form-control" id="inputEmail3">
</div>
</div>

<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Petugas</label>
        <div class="col-sm-3">
            <input type="text" name="nama" class="form-control" id="inputEmail3">
</div>
</div>
<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Bulan</label>
        <div class="col-sm-3">
            <input type="number" name="bln" class="form-control" id="inputEmail3">
</div>
</div>
<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun</label>
        <div class="col-sm-3">
            <input type="number" name="thn" class="form-control" id="inputEmail3">
</div>
</div>
<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Wilayah</label>
        <div class="col-sm-3">
            <input type="text" name="wilayah" class="form-control" id="inputEmail3">
</div>
</div>
</center>
<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-3">
            <input type="submit" value="Simpan" class="btn btn-success">
            <a href="<?php base_url('jadwal')?>" class="btn btn-danger">Batal</a>
            <a href="<?php echo site_url('jadwal') ?>" class="btn btn-danger">Back</a>
            <!-- <a href="<?php echo site_url('jadwal') ?>"><i class="fas fa-arrow-left"></i> Kembali</a> -->
</div>
</div>

</form>

    
</body>

</html>
