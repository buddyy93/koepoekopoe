<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_menumanager/' ?>">Data</a></li>
        <li class="active">Add</li>
        <li><a href="<?php echo base_url() . 'manage_menumanager/sorting' ?>">Sorting</a></li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Tambah Menu Manager</h3>
        <br>
        <?php echo form_open_multipart('manage_menumanager/tambahmenumanager'); ?>
        <div class="row">
            <div class="col-md-2">
                <label>Top Menu</label>
            </div>
            <div class="col-md-10">
                <select name="top_menu" class="form-control">
                    <option value="0">None</option>
                    <?php
                    if (isset($top_menus))
                    {
                        foreach ($top_menus as $menu)
                        {
                            echo '<option value="' . $menu->ID_MENU . '"' . ($this->session->flashdata('top_menu') == $menu->ID_MENU ? 'selected' : '') . '>' . $menu->MENU_TITLE . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Title ID</label>
            </div>
            <div class="col-md-10">
                <input name="title_id" type="text" class="form-control"
                       value="<?php echo $this->session->flashdata('title_id'); ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Title EN</label>
            </div>
            <div class="col-md-10">
                <input name="title_en" type="text" class="form-control"
                       value="<?php echo $this->session->flashdata('title_en'); ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Content ID</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("content_id", $this->session->flashdata('content_id')); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Content EN</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("content_en", $this->session->flashdata('content_en')); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>URL</label>
            </div>
            <div class="col-md-10">
                <input name="url" type="text" class="form-control"
                       value="<?php echo $this->session->flashdata('url'); ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Target</label>
            </div>
            <div class="col-md-10">
                <input type="radio" name="target" value="0"> New Window
                <input type="radio" name="target" value="1"> Same Window<br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Kolom Komentar</label>
            </div>
            <div class="col-md-10">
                <input type="radio" name="komentar" value="0"> Show
                <input type="radio" name="komentar" value="1"> Hidden<br>
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
        <?php form_close(); ?></div>
</div>