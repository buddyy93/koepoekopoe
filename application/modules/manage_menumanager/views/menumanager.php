<div class="container">
    <h3><span class="glyphicon glyphicon-file"></span>Menu Manager</h3>
    <ol class="breadcrumb">
        <li class="active">Data</li>
        <li><a href="<?php echo base_url() . 'manage_menumanager/tambahMenuManager' ?>">Add</a></li>
        <li><a href="<?php echo base_url() . 'manage_menumanager/sorting' ?>">Sorting</a></li>
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
            <?php echo form_open('manage_menumanager/'); ?>
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Search</button>
            </span>
            </div><!-- /input-group -->
            <?php echo form_close()?>
        </div>
    </div>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Title ID</th>
            <th>Title EN</th>
            <th>Kolom Komentar</th>
            <th>Status</th>
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
                echo '<td>' . $data->MENU_TITLE . '</td>';
                echo '<td>' . $data->MENU_TITLE_EN . '</td>';
                if($data->STATUS_KOMENTAR==0)
                    echo '<td class="text-center"><span style="font-weight: bold;padding: 1% 2%;color: white;background: green">Show</span></td>';
                if($data->STATUS_KOMENTAR==1)
                    echo '<td class="text-center"><span style="font-weight: bold;padding: 1% 2%;color: white;background: grey">Hidden</span></td>';
                if($data->STATUS==0)
                    echo '<td class="text-center"><span style="font-weight: bold;padding: 1% 6%;color: white;background: green">Show</span></td>';
                if($data->STATUS==1)
                    echo '<td class="text-center"><span style="font-weight: bold;padding: 1% 6%;color: white;background: grey">Hidden</span></td>';
                echo '<td><a href="' . base_url() . 'manage_menumanager/editmenumanager/' . $data->ID_MENU . '" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;<button onclick="confirmDelete('.$data->ID_MENU.',\'menumanager\')" class="btn btn-danger">Delete</button></td>';
                echo '</tr>';
                $index++;
            }
        }
        ?>
        </tbody>
    </table>
</div>
<?php echo validation_errors(); ?>
<?php if (isset($result)) echo $result; ?>

