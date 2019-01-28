<div class="container-fluid"  style="margin-left:300px;margin-top:100px;>
    <div class="block-header">
       
</div>

<div class="row clearfix">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left:310px;margin-top:10px;">
    
    <div class="card">
        <div class="header">
    <?php
    $notifikasi = $this->session->flashdata('notif');
    if($notifikasi != null){
        echo '<div class="alert alert-danger">'.$notifikasi.'</div>';
    }
    ?>
        </div>
        <h2 style="margin-left:50px;">
       <b> DAFTAR PELANGGAN</b>        
    </h2> 
        <div class="body"  >
        

            <form id="form_validation" method="POST" action="<?php echo base_url('index.php/Pelanggan/SendDataPelanggan')?>">
            <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="NamaPelanggan">
                <label class="form-label">Nama Pelanggan</label>
            </div>
</div>
<div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="NoTelp">
                <label class="form-label">No Telephone</label>
            </div>
</div>
<div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="Username">
                <label class="form-label">Username</label>
            </div>
</div>
<div class="form-group form-float">
            <div class="form-line">
                <input type="password" class="form-control" name="Password">
                <label class="form-label">Password</label>
            </div>
</div>
<div class="form-group form-float">
            <div class="form-line">
                <textarea  class="form-control no-resize" cols="10" rows="5" name="Alamat"></textarea>
                <label class="form-label">Description</label>
            </div>
</div>
    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
</form>
</div>
</div>
</div>
</div>
</div>

    