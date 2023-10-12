<style>
body {
  background-color: #4169E1;
  color: white;
  /* width:20px; */
  height:1000px;
  margin: 4px 10px;
  <center></center>
}
input {
  width: 350px;
  height: 35px;
}
.sub{
        width:20px;
        height:100px;
        margin-left:-230px;
}
</style>
<center>
<form action="<?php echo base_url('jadwal/updatemk')?>" method="POST">
<input type="hidden" name="id_jadwal" value="<?php echo $data->id_jadwal?>">
<table>
<br></br>
<br></br>
<br></br>
<div class="card mb-3">
<!-- <div class="card-header">
<a href="<?php echo site_url('jadwal/index/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
</div> -->
<br></br>
<tittle>Edit Jadwal Petugas</tittle>
<br></br>
    <tr>
        <td>ID Jadwal</td>
        <td><input type="number" name="id_jadwal" width="1000px" height="100px" value="<?php echo $data->id_jadwal;?>"></td>
</tr>
<tr>
        <td>Nama Petugas</td>
        <td><input type="text" name="nama" value="<?php echo $data->nama;?>"></td>
</tr>
<tr>
        <td>Bulan</td>
        <td><input type="number" name="bln" value="<?php echo $data->bln;?>"></td>
</tr>
<tr>
        <td>Tahun</td>
        <td><input type="number" name="thn" value="<?php echo $data->thn;?>"></td>
</tr>
<tr>
        <td>Wilayah</td>
        <td><input type="text" name="wilayah" value="<?php echo $data->wilayah;?>"></td>
</tr>

</form>
</table>
<br></br>
<tr>
<div class="sub">
    <td><input type="submit" value="simpan"></td>
    <button onclick="goBack()">Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
    </div>
</tr>
</center>