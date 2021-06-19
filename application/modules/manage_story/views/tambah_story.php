<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_story/' ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Tambah Data Story</h3>
        <br>
        <?php echo form_open_multipart('manage_story/tambahstory'); ?>
        <div class="row">
            <div class="col-md-2">
                <label>Date</label>
            </div>
            <div class="col-md-10">
                <input name="waktu" class="form-control" type="date" value="<?php echo date('Y-m-d');?>" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Penulis</label>
            </div>
            <div class="col-md-10">
                <input name="penulis" type="text" class="form-control" value="<?php echo $myaccount->nama ?>" readonly/>
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
                        echo '<option value="' . $kategori->ID_STORY_KATEGORI . '">' . $kategori->NAMA_STORY_KATEGORI . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Lokasi</label>
            </div>
            <div class="col-md-10">
                <select name="lokasi" class="form-control">
                    <?php
                    foreach ($lokasis as $lokasi)
                    {
                        echo '<option value="' . $lokasi->ID_LOKASI . '">' . $lokasi->NAMA_LOKASI . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Judul Story ID</label>
            </div>
            <div class="col-md-10">
                <input name="judul_id" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Judul Story EN</label>
            </div>
            <div class="col-md-10">
                <input name="judul_en" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Konten ID</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("konten_id",""); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Konten EN</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("konten_en",""); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Foto Story</label>
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
            <hr>
        </div>
        <?php form_close(); ?>
    </div>
</div>