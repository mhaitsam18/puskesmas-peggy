<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <style>
body {
  background-color: #4169E1;

}

h1 {
  color: white;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}
.ukuran{
  font-size:30px;
  margin:20px;
}
</style>
<h1>Poli Kesehatan Ibu dan Anak (KIA)
<br>Puskesmas Makrayu</br><br>
<img src="<?=base_url()?>assets/img/puskesmas.png" alt="" height="330px" weight="290px">
</h1>
<br>
<center>
<div class="ukuran">
<table>
<tr>
<td>
<img src="<?=base_url()?>assets/img/ibuhamil.jpg" alt="" height="150px" weight="200px">
<br>
 <center><button><a href="<?php echo site_url('puskesmas/login');?>">Puskesmas</a></button></center>
</td>
<td><p style="color:DodgerBlue">...................</p></td>

<td>
<img src="<?=base_url()?>assets/img/posyandu.jpg" alt="" height="150px" weight="200px">
<br>
<center> <button><a href="<?php echo site_url('jadwal');?>">Posyandu</a></button></center>
</td>

</tr>
</table>
</div>
</center>
</body>
</html>