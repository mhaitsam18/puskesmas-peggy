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
<form action="<?php echo base_url()?>jadwal/insert" method="post">
    <table boreder="1">
  ID Jadwal:<br>
  <input type="number" name="id_jadwal"><br>
  Nama Petugas:<br>
  <input type="text" name="nama">
  <br>
  Bulan:<br>
  <input type="number" name="bln">
  <br>
  Tahun:<br>
  <input type="number" name="thn">
  <br>
  Wilayah Posyandu:<br>
  <input type="text" name="wilayah">
  <br>
      <td><input type="submit" value="Simpan"></td>
</table>
</form>
</body>
</html>