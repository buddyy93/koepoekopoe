<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_resep/' ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Tambah Data Resep</h3>
        <br>
        <?php echo form_open_multipart('manage_resep/tambahresep'); ?>
        <div class="row">
            <div class="col-md-2">
                <label>Kategori</label>
            </div>
            <div class="col-md-10">
                <select name="kategori" class="form-control">
                    <?php
                    foreach ($resep_kategoris as $kategori)
                    {
                        echo '<option value="' . $kategori->ID_RESEP_KATEGORI . '"'.($this->session->flashdata('kategori')==$kategori->ID_RESEP_KATEGORI?'selected':'').'>' . $kategori->NAMA_RESEP_KATEGORI . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Key Product</label>
            </div>
            <div class="col-md-10">
                <select name="key_product" class="form-control">
                    <?php
                    foreach ($key_products as $product)
                    {
                        echo '<option value="' . $product->ID_PRODUK . '"'.($this->session->flashdata('key_product')==$product->ID_PRODUK?'selected':'').'>' . $product->NAMA_PRODUK . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Nama Resep ID</label>
            </div>
            <div class="col-md-10">
                <input name="nama_id" type="text" class="form-control" value="<?php echo $this->session->flashdata('nama_id'); ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Nama Resep EN</label>
            </div>
            <div class="col-md-10">
                <input name="nama_en" type="text" class="form-control" value="<?php echo $this->session->flashdata('nama_en'); ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Deskripsi Resep ID</label>
            </div>
            <div class="col-md-10">
                <textarea name="deskripsi_id" id="deskripsi_id" rows="2" class="form-control"><?php echo $this->session->flashdata('deskripsi_id'); ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Deskripsi Resep EN</label>
            </div>
            <div class="col-md-10">
                <textarea name="deskripsi_en" id="deskripsi_en" rows="2" class="form-control"><?php echo $this->session->flashdata('deskripsi_en'); ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Prep Time</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="prep_time" class="form-control" style="width:10%" value="<?php echo $this->session->flashdata('prep_time'); ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Cook Time</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="cook_time" class="form-control" style="width:10%" value="<?php echo $this->session->flashdata('cook_time'); ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Calories</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="calories" class="form-control" style="width:10%" value="<?php echo $this->session->flashdata('calories'); ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Jumlah Ingredients</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="ingredients" class="form-control" style="width:10%" value="<?php echo $this->session->flashdata('ingredients'); ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Ingredient ID</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("ingredient_id", $this->session->flashdata('ingredient_id')); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Ingredient EN</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("ingredient_en", $this->session->flashdata('ingredient_en')); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label>How to Cook ID</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("how_to_cook_id",$this->session->flashdata('how_to_cook_id')); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label>How to Cook EN</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("how_to_cook_en",$this->session->flashdata('how_to_cook_en')); ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Foto Resep</label>
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
                <input type="radio" name="status" value="0"> Show
                <input type="radio" name="status" value="1"> Hidden<br>
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
        <input name="waktu" type="hidden" value="<?php echo date('Y-m-d');?>" readonly>
        <?php form_close(); ?></div>
</div>