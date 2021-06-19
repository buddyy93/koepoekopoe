<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_produk/' ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Tambah Data Produk</h3>
        <br>
        <?php echo form_open_multipart('manage_produk/tambahproduk'); ?>
        <div class="row">
            <div class="col-md-2">
                <label>UPC Code</label>
            </div>
            <div class="col-md-10">
                <input name="upc_code" type="text" class="form-control" value="<?php echo $this->session->flashdata('upc_code'); ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Brand</label>
            </div>
            <div class="col-md-10">
                <select name="brand" class="form-control">
                    <?php
                    foreach ($brands as $brand)
                    {
                        echo '<option value="' . $brand->ID_BRAND . '"'.($this->session->flashdata('brand')==$brand->ID_BRAND?'selected':'').'>' . $brand->NAMA_BRAND . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Kategori</label>
            </div>
            <div class="col-md-10">
                <select name="kategori" class="form-control">
                    <?php
                    foreach ($kategoris as $kategori)
                    {
                        echo '<option value="' . $kategori->ID_PRODUK_KATEGORI . '"'.($this->session->flashdata('kategori')==$brand->ID_BRAND?'selected':'').'>' . $kategori->NAMA_PRODUK_KATEGORI . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Nama Produk ID</label>
            </div>
            <div class="col-md-10">
                <input name="nama_produk_id" type="text" class="form-control" value="<?php echo $this->session->flashdata('nama_produk_id'); ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Nama Produk EN</label>
            </div>
            <div class="col-md-10">
                <input name="nama_produk_en" type="text" class="form-control" <?php echo $this->session->flashdata('nama_produk_en'); ?>/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Deskripsi Produk ID</label>
            </div>
            <div class="col-md-10">
                <textarea name="deskripsi_produk_id" id="deskripsi_produk_id" rows="2" class="form-control"><?php echo $this->session->flashdata('deskripsi_produk_id'); ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Deskripsi Produk EN</label>
            </div>
            <div class="col-md-10">
                <textarea name="deskripsi_produk_en" id="deskripsi_produk_en" rows="2" class="form-control"><?php echo $this->session->flashdata('deskripsi_produk_en'); ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Ingredient ID</label>
            </div>
            <div class="col-md-10">
                <textarea name="ingredient_produk_id" id="ingredient_produk_id" rows="2"
                          class="form-control"><?php echo $this->session->flashdata('ingredient_produk_id'); ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Ingredient EN</label>
            </div>
            <div class="col-md-10">
                <textarea name="ingredient_produk_en" id="ingredient_produk_en" rows="2"
                          class="form-control"><?php echo $this->session->flashdata('ingredient_produk_en'); ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Konten ID</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("konten_id",$this->session->flashdata('konten_id')); ?>
                <!--    		<textarea name="konten_id" id="konten_id" rows="10" cols="80"></textarea>-->
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Konten EN</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("konten_en",$this->session->flashdata('konten_en')); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Foto Produk</label>
            </div>
            <div class="col-md-10">
                <input type="file" name="foto" id="foto">
                <p>note: ukuran gambar 700x700 pixel. (recommended)</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Status</label>
            </div>
            <div class="col-md-10">
                <input type="radio" name="status" value="0" <?php echo ($this->session->flashdata('status')==0?'selected':'') ?>> Show
                <input type="radio" name="status" value="1" <?php echo ($this->session->flashdata('status')==1?'selected':'') ?>> Hidden<br>
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