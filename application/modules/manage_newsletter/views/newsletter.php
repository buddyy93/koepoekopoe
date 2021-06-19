<div class="container">
    <h3><span class="glyphicon glyphicon-file"></span>Story</h3>
    <ol class="breadcrumb">
        <li>List</li>
        <li class="active">Data</li>
        <li><a href="<?php echo base_url() . 'manage_story/tambahstory' ?>">Add</a></li>
    </ol>
    <div class="row">
        <div class="col-md-6 pull-right">
            <?php echo form_open('manage_story/'); ?>
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
            <th>Kategori</th>
            <th>Judul</th>
            <th>EN Judul</th>
            <th>Penulis</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($datas))
        {
            $index = 1;
            foreach ($datas as $data)
            {
                echo '<tr>';
                echo '<td>' . $index. '</td>';
                echo '<td>' . $data->NAMA_STORY_KATEGORI . '</td>';
                echo '<td>'.$data->JUDUL_STORY.'</td>';
                echo '<td>' . $data->EN_JUDUL_STORY . '</td>';
                echo '<td>' . $data->PENULIS . '</td>';
                echo '<td>' . $data->ID_LOKASI . '</td>';
                echo '<td>' . $data->CREATED_AT . '</td>';
                echo '<td><a href="'.base_url().'manage_story/editstory/'.$data->ID_STORY.'" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;<a href="'.base_url().'manage_story/deletestory/'.$data->ID_STORY.'" class="btn btn-danger">Delete</a></td>';
                echo '</tr>';
                $index++;
            }
        }
        ?>
        </tbody>
    </table>
</div>
<?php echo $this->pagination->create_links(); ?>
<?php echo validation_errors(); ?>
<?php if (isset($result)) echo $result; ?>

