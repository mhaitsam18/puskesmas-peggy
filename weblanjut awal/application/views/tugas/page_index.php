<a class="btn btn-primary" href="<?php echo base_url('petugas/addForm')?>">Tambah Data</a>

<table class="table table-striped" id="myTable">
    <thead class="thead-dark">
<tr>
<td>ID Petugas</td>
<td>Username</td>
<td>Nama Lengkap</td>
<td>Foto</td>
<!-- <td>Password</td> -->
<td>Action</td>

</tr>
</thead>
<tbody>
<?php foreach($data as $value){?>
<tr>
<td><?Php echo $value->id_petugas;?></td>
<td><?php echo $value->username;?></td>
<td><?php echo $value->nama;?></td>
<!-- <td><?php echo $value->password;?></td> -->
<td>
<img src="<?php echo base_url('uploads/'.$value->foto)?>";/>
</td>

<td>
<a class="btn btn-warning" href="<?php echo base_url('petugas/updateForm/'.$value->id_petugas)?>">Update</a>
    <a class="btn btn-danger" href="<?php echo base_url('petugas/delete/'.$value->id_petugas)?>">Delete</a>
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