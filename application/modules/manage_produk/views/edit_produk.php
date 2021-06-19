<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_produk/' ?>">Data</a></li>
        <li class="active">Edit</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Edit Data Produk</h3>
        <br>
        <?php echo form_open_multipart('manage_produk/editproduk/'.$produk->ID_PRODUK); ?>
        <div class="row">
            <div class="col-md-2">
                <label>UPC Code</label>
            </div>
            <div class="col-md-10">
                <input name="upc_code" type="text" class="form-control" value="<?php echo $produk->UPC_CODE ?>"/>
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
                        echo '<option value="' . $brand->ID_BRAND . '"';
                        if($produk->ID_BRAND==$brand->ID_BRAND)
                            echo 'selected>';
                        else
                            echo '>';
                        echo $brand->NAMA_BRAND . '</option>';
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
                        echo '<option value="' . $kategori->ID_PRODUK_KATEGORI . '"';
                        if($produk->ID_PRODUK_KATEGORI==$kategori->ID_PRODUK_KATEGORI)
                            echo 'selected>';
                        else
                            echo '>';
                        echo $kategori->NAMA_PRODUK_KATEGORI . '</option>';
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
                <input name="nama_produk_id" type="text" class="form-control" value="<?php echo $produk->NAMA_PRODUK; ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Nama Produk EN</label>
            </div>
            <div class="col-md-10">
                <input name="nama_produk_en" type="text" class="form-control" value="<?php echo $produk->EN_NAMA_PRODUK?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Deskripsi Produk ID</label>
            </div>
            <div class="col-md-10">
                <textarea name="deskripsi_produk_id" id="deskripsi_produk_id" rows="2" class="form-control"><?php echo $produk->DESKRIPSI_PRODUK ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Deskripsi Produk EN</label>
            </div>
            <div class="col-md-10">
                <textarea name="deskripsi_produk_en" id="deskripsi_produk_en" rows="2" class="form-control"><?php echo $produk->EN_DESKRIPSI_PRODUK ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Ingredient ID</label>
            </div>
            <div class="col-md-10">
                <textarea name="ingredient_produk_id" id="ingredient_produk_id" rows="2"
                          class="form-control"><?php echo $produk->INGREDIENT_PRODUK?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Ingredient EN</label>
            </div>
            <div class="col-md-10">
                <textarea name="ingredient_produk_en" id="ingredient_produk_en" rows="2"
                          class="form-control"><?php echo $produk->EN_INGREDIENT_PRODUK?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Konten ID</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("konten_id",$produk->KONTEN_PRODUK); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Konten EN</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("konten_en",$produk->EN_KONTEN_PRODUK); ?>
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
                <br>
                <img src="<?php echo base_url()."uploads/".$produk->FOTO;?>" width="200px" height="200px">
                <input type="hidden" name="existing_foto" value="<?php echo $produk->FOTO ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Status</label>
            </div>
            <div class="col-md-10">
                <input type="radio" name="status" value="0" <?php echo $produk->STATUS==0?'checked':'';?>> Show
                <input type="radio" name="status" value="1" <?php echo $produk->STATUS==1?'checked':'';?>> Hidden<br>
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