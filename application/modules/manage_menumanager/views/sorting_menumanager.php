<div class="container">
    <h3><span class="glyphicon glyphicon-file"></span>Sorting Menu Manager</h3>
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_menumanager/' ?>">Data</a></li>
        <li><a href="<?php echo base_url() . 'manage_menumanager/tambahmenumanager' ?>">Add</a></li>
        <li class="active">Sorting</li>
    </ol>
</div>
<div class="container">
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-userer -->
                        <div class="box-body">
                            <?php
                            echo form_open('#', 'id = frmmenus');
                            echo form_close();
                            ?>
                            <span id="generate" style="color:#FF0000; font-weight:bold;"></span>
                            <div style="width:100%; height:2px; clear:both;">&nbsp;</div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div id="menustructure">
                                        <div class="dd" id="nestable">
                                            <ol class="dd-list" id="webmenus">

                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <hr>
    <div class="text-center">
        <button id="savenavmenus" class="btn btn-primary">
            Simpan Sorting
        </button>
    </div>
</div>
<script>
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            return (window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            return false;
        }
    };

    $(document).ready(function () {
        showmenus();

        $('#nestable').nestable({maxDepth: 4});

        $("#savenavmenus").click(function () {
            var structure = updateOutput($('#nestable').data('output', $('#generate')));

            if (structure == false) {
                showalert('error', languages_navmenu['oldbrowser']);
                return false;
            }

            var postForm = $('#frmmenus').serialize() + '&s=' + structure;
            $.ajax({
                type: "POST",
                url: siteRoot + "manage_menumanager/updateSorting",
                data: postForm,
                dataType: "json",
                cache: "false",
                success: function (result) {
                    //remove it
                    if (result == '1') {
                        //success
                        nestlelistchanged = false;
                        alertify.alert('Notification', 'Sorting telah disimpan', function () {
                            alertify.success('Successful');
                        });
                    }
                    else {
                        alertify.alert('Notification', 'Gagal', function () {
                            alertify.success('Gagal');
                        });
                    }
                },
                fail: function (result) {
                    showalert('error', languages_navmenu['servererror']);
                }
            });
        });
        $('#generate').html('');
    });
</script>