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
<form action="<?php echo base_url()?>pasienrujukan/update" method="post">
<input type="hidden" name="id_rujukan" value="<?php echo $data->id_rujukan;?>">
    <table boreder="1">
  ID Rujukan:<br>
  <input type="number" name="id_rujukan" value="<?php echo $data->id_rujukan;?>"><br>
  Nama Pasien:<br>
  <input type="text" name="namapasien" value="<?php echo $data->namapasien;?>">
  <br>
  Umur Pasien:<br>
  <input type="text" name="umur" value="<?php echo $data->umur;?>">
  <br>
  Alamat Pasien:<br>
  <input type="text" name="alamat" value="<?php echo $data->alamat;?>">
  <br>
  Nomor Pasien:<br>
  <input type="number" name="nopasien" value="<?php echo $data->nopasien;?>">
  <br>
  Diagnosa Pasien:<br>
  <input type="text" name="diagnosa" value="<?php echo $data->diagnosa;?>">
  <br>
  Nama Puskesmas:<br>
  <input type="text" name="rumahsakit" value="<?php echo $data->rumahsakit;?>">
  <br>
      <td><input type="submit" value="Simpan"></td>
</table>
</form>
</body>
</html>