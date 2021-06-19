<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_kategori_resep/' ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Edit Kategori Resep</h3>
        <br>
        <?php echo form_open_multipart('manage_kategori_resep/editkategoriresep/' . $data->ID_RESEP_KATEGORI); ?>
        <div class="row">
            <div class="col-md-2">
                <label>Nama Kategori Resep ID</label>
            </div>
            <div class="col-md-10">
                <input name="nama_kategori_id" type="text" class="form-control" value="<?php echo $data->NAMA_RESEP_KATEGORI ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Nama Kategori Resep EN</label>
            </div>
            <div class="col-md-10">
                <input name="nama_kategori_en" type="text" class="form-control" value="<?php echo $data->EN_NAMA_RESEP_KATEGORI ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Banner Kategori Resep</label>
            </div>
            <div class="col-md-10">
                <input type="file" name="foto" id="foto">
                <p>note: ukuran gambar 1290x500 pixel. (recommended)</p>
                <br>
                <img src="<?php echo base_url()."uploads/".$data->FOTO;?>" width="100%" height="100%">
                <input type="hidden" name="existing_foto" value="<?php echo $data->FOTO ?>">
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