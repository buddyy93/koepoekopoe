<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_slider/'; ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Tambah Slider</h3>
        <br>
        <?php echo form_open_multipart('manage_slider/tambahslider/') ?>
        <div class="row">
            <div class="col-md-2">
                <label>Link Slider</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="link_slider" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Heading ID</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("heading_id", ""); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Heading EN</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("heading_en", ""); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Deskripsi ID</label>
            </div>
            <div class="col-md-10">
                <textarea name="deskripsi_id" id="deskripsi_id" rows="2" class="form-control"></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Deskripsi EN</label>
            </div>
            <div class="col-md-10">
                <textarea name="deskripsi_en" id="deskripsi_en" rows="2" class="form-control"></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Foto Slider</label>
            </div>
            <div class="col-md-10">
                <input type="file" name="foto" id="foto">
                <p>note: ukuran gambar 1220x550 pixel. (recommended)</p>
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