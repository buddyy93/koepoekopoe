<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_brand/' ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Edit Brand</h3>
        <br>
        <?php echo form_open_multipart('manage_brand/editbrand/'.$data->ID_BRAND); ?>
        <div class="row">
            <div class="col-md-2">
                <label>ID  brand</label>
            </div>
            <div class="col-md-10">
                <input name="id" type="text" class="form-control" value="<?php echo $data->ID_BRAND; ?>" disabled/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Nama  Brand</label>
            </div>
            <div class="col-md-10">
                <input name="nama" type="text" class="form-control" value="<?php echo $data->NAMA_BRAND?>"/>
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