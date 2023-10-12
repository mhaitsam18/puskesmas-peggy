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
  background-color: #ADD8E6;
  color: white;
}
</style>
<br></br>
<center><h1> Jadwal Pelaksanaan Posyandu</h1></center>
<br>
    <a class="btn btn-primary" href="<?php echo base_url('jadwal/addForm')?>">Tambah Data</a>
<table class="table table-striped" id="myTable">
    <thead class="thead-dark">
<tr>
<td>Jadwal ID</td>
<td>Nama Petugas</td>
<td>Bulan</td>
<td>Tahun</td>
<td>Wilayah</td>
<td>Action</td>

</tr>
</thead>
<tbody>
<?php foreach($data as $value){?>
<tr>
<td><?Php echo $value->id_jadwal;?></td>
<td><?php echo $value->nama;?></td>
<td><?php echo $value->bln;?></td>
<td><?php echo $value->thn;?></td>
<td><?php echo $value->wilayah;?></td>
<td>
<a class="btn btn-warning" href="<?php echo base_url('jadwal/updateForm/'.$value->id_jadwal)?>">Update</a>
    <a class="btn btn-danger" href="<?php echo base_url('jadwal/delete/'.$value->id_jadwal)?>">Delete</a>
</td>

</tr>

<?php }?>
</tbody>
</table>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<br></br>
<center>
<button><a href="<?php echo site_url('posyandu/PetugasPosiandu');?>">Ingin Login</a></button>
</center>
</body>
</html>