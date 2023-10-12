<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<style>
body {
  background-color: #4169E1;
  color: white;
}
</style>
<form action="<?php echo base_url()?>jadwal/update" method="post">
<input type="hidden" name="id_jadwal" value="<?php echo $data->id_jadwal;?>">
    <table boreder="1">
  ID Jadwal:<br>
  <input type="number" name="id_jadwal" value="<?php echo $data->id_jadwal;?>"><br>
  Nama Petugas:<br>
  <input type="text" name="nama" value="<?php echo $data->nama;?>">
  <br>
  Bulan:<br>
  <input type="number" name="bln" value="<?php echo $data->bln;?>">
  <br>
  Tahun:<br>
  <input type="number" name="thn" value="<?php echo $data->thn;?>">
  <br>
  Wilayah:<br>
  <input type="text" name="wilayah" value="<?php echo $data->wilayah;?>">
  <br>
      <td><input type="submit" value="Simpan"></td>
</table>
</form>
</body>
</html>