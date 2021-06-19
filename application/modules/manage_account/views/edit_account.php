<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_account/' ?>">Data</a></li>
        <li class="active">Edit</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Edit User</h3>
        <br>
        <?php echo form_open_multipart('manage_account/editaccount/'.$data->username); ?>
        <div class="row">
            <div class="col-md-2">
                <label>Nama</label>
            </div>
            <div class="col-md-10">
                <input name="nama" type="text" class="form-control" value="<?php echo $data->nama; ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Email</label>
            </div>
            <div class="col-md-10">
                <input name="email" type="text" class="form-control" value="<?php echo $data->email?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Username</label>
            </div>
            <div class="col-md-10">
                <input name="username" type="text" class="form-control" value="<?php echo $data->username?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Password</label>
            </div>
            <div class="col-md-10">
                <input name="password" type="password" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Confirm Password</label>
            </div>
            <div class="col-md-10">
                <input name="confirm_password" type="password" class="form-control"/>
            </div>
        </div>
        <br>
        <div>
            <?php if (isset($results))
            {
                foreach ($results as $result)
                {
                    echo $result;
                }
            }; ?>
        </div>
        <div id="errors">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <?php form_close(); ?></div>
</div>
<script>
    CKEDITOR.replace('konten_id');
    CKEDITOR.replace('konten_en');
</script>