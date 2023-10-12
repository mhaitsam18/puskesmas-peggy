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
<form action="<?php echo base_url()?>petugas/insert" method="post">
    <table boreder="1">
  ID Petugas:<br>
  <input type="text" name="id_petugas"><br>
  Username:<br>
  <input type="email" name="username">
  <br>
  Nama Lengkap:<br>
  <input type="text" name="nama">
  <br>
  Foto:<br>
  <input type="file" name="foto">
  <br>
  Password:<br>
  <input type="password" name="password">
  <br>
      <td><input type="submit" value="Simpan"></td>
</table>
</form>
</body>
</html>