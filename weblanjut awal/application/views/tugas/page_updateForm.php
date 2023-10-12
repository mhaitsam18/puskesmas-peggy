<form action="<?php echo base_url('petugas/updatemk')?>" method="POST">
<input type="hidden" name="id_petugas" value="<?php echo $data->id_petugas?>">
<table>
    <tr>
        <td>ID Petugas</td>
        <td><input type="text" name="id_petugas" value="<?php echo $data->id_petugas;?>"></td>
</tr>
<tr>
        <td>Username</td>
        <td><input type="email" name="username" value="<?php echo $data->username;?>"></td>
</tr>
<tr>
        <td>Nama Lengkap</td>
        <td><input type="text" name="nama" value="<?php echo $data->nama;?>"></td>
</tr>
<tr>
        <td>Foto</td>
        <td><input type="file" name="nama" value="<?php echo $data->foto;?>"></td>
</tr>
<tr>
        <td>Password</td>
        <td><input type="password" name="password" value="<?php echo $data->password;?>"></td>
</tr>
<tr>
    <td><input type="submit" value="simpan"></td>
</tr>
</table>
</form>

