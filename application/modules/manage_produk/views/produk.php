<div class="container">
    <h3><span class="glyphicon glyphicon-file"></span>Produk</h3>
    <ol class="breadcrumb">
        <li>List</li>
        <li class="active">Data</li>
        <li><a href="<?php echo base_url() . 'manage_produk/tambahproduk' ?>">Add</a></li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <?php if (isset($search))
            { ?>
                <p style="padding: 16px;    background-color: #10be28; color: white;">Hasil pencarian berdasarkan kata
                    kunci <?php echo isset($search) ? $search : "" ?></p>

                <?php $this->session->set_flashdata('search', $search);
            } ?>
        </div>
        <div class="col-md-6">
            <?php echo form_open('manage_produk/'); ?>
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Search</button>
            </span>
            </div><!-- /input-group -->
            </form>
        </div>
    </div>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>UPC Code</th>
            <th>Kategori</th>
            <th>Nama Produk ID</th>
            <th>Nama Produk EN</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($datas))
        {
            $index = 1;
            if(isset($page)&&$page!=0)
                $index = $index+$page;
            foreach ($datas as $data)
            {
                echo '<tr>';
                echo '<td>' . $index . '</td>';
                echo '<td>' . $data->UPC_CODE . '</td>';
                echo '<td>' . $data->NAMA_PRODUK_KATEGORI . '</td>';
                echo '<td>' . $data->NAMA_PRODUK . '</td>';
                echo '<td>' . $data->EN_NAMA_PRODUK . '</td>';
                echo '<td><a href="' . base_url() . 'manage_produk/editproduk/' . $data->ID_PRODUK . '" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;<button onclick="confirmDelete('.$data->ID_PRODUK.',\'produk\')" class="btn btn-danger btn-delete">Delete</button></td>';
                echo '</tr>';
                $index ++;
            }
        }
        ?>
        </tbody>
    </table>
</div>
<?php echo $this->pagination->create_links(); ?>
<?php echo validation_errors(); ?>
<?php if (isset($result)) echo $result; ?>

