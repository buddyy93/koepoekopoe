<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_resep/' ?>">Data</a></li>
        <li class="active">Edit</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Edit Data Resep</h3>
        <br>
        <?php echo form_open_multipart('manage_resep/editresep/'.$resep->ID_RESEP); ?>
        <div class="row">
            <div class="col-md-2">
                <label>Kategori</label>
            </div>
            <div class="col-md-10">
                <select name="kategori" class="form-control">
                    <?php
                    foreach ($resep_kategoris as $kategori)
                    {
                        echo '<option value="' . $kategori->ID_RESEP_KATEGORI . '"';
                        if($kategori->ID_RESEP_KATEGORI==$resep->ID_RESEP_KATEGORI)
                            echo 'selected>';
                        else
                            echo '>';
                        echo $kategori->NAMA_RESEP_KATEGORI . '</option>';
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
                        echo '<option value="' . $product->ID_PRODUK . '"';
                        if($product->ID_PRODUK==$resep->KEY_PRODUCT)
                            echo 'selected>';
                        else
                            echo '>';
                        echo $product->NAMA_PRODUK . '</option>';
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
                <input name="nama_id" type="text" class="form-control" value="<?php echo $resep->NAMA_RESEP ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Nama Resep EN</label>
            </div>
            <div class="col-md-10">
                <input name="nama_en" type="text" class="form-control" value="<?php echo $resep->EN_NAMA_RESEP; ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Deskripsi Resep ID</label>
            </div>
            <div class="col-md-10">
                <textarea name="deskripsi_id" id="deskripsi_id" rows="2"
                          class="form-control"><?php echo $resep->DESKRIPSI_RESEP ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Deskripsi Resep EN</label>
            </div>
            <div class="col-md-10">
                <textarea name="deskripsi_en" id="deskripsi_en" rows="2"
                          class="form-control"><?php echo $resep->EN_DESKRIPSI_RESEP ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Prep Time</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="prep_time" class="form-control" style="width:10%"
                       value="<?php echo $resep->PREP_TIME ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Cook Time</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="cook_time" class="form-control" style="width:10%"
                       value="<?php echo $resep->COOK_TIME ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Calories</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="calories" class="form-control" style="width:10%"
                       value="<?php echo $resep->KALORI ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Jumlah Ingredients</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="ingredients" class="form-control" style="width:10%"
                       value="<?php echo $resep->JUMLAH_INGREDIENT ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Ingredient ID</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("ingredient_id",$resep->INGREDIENT_RESEP); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Ingredient EN</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("ingredient_en",$resep->EN_INGREDIENT_RESEP); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label>How to Cook ID</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("how_to_cook_id",$resep->HOW_TO_COOK); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label>How to Cook EN</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("how_to_cook_en",$resep->EN_HOW_TO_COOK); ?>
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
                <br>
                <img src="<?php echo base_url() . 'uploads/' . $resep->FOTO; ?>" width="200px" height="200px">
                <input type="hidden" name="existing_foto" value="<?php echo $resep->FOTO ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Status</label>
            </div>
            <div class="col-md-10">
                <input type="radio" name="status" value="0" <?php echo $resep->STATUS == 0 ? "checked" : ""; ?>> Show
                <input type="radio" name="status" value="1" <?php echo $resep->STATUS == 1 ? "checked" : ""; ?>>
                Hidden<br>
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