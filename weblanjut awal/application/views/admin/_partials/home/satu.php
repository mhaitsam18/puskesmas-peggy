<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
<button type="button" class="btn btn-success"  href="<?php echo site_url('posyandu/PetugasPosiandu');?>">Posyandu</button>
<br></br>
<button type="button" class="btn btn-warning"  href="<?php echo site_url('puskesmas/login');?>">Posyandu</button>
</center>

<div class="container-fluid">
            
            <?php
            if(!empty($this->session->flashdata('success'))){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success');?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <?php }?>
</body>
</html>