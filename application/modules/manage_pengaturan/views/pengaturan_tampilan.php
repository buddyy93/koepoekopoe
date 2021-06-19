<div class="container">
    <h2 class="text-center">Pengaturan Tampilan</h2>
    <hr>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Media (Logo)</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php echo form_open_multipart('manage_pengaturan/'); ?>
                    <label><strong>Logo</strong></label>
                    <br>
                    <img src="<?php echo base_url(); ?>/public/images/logo.png">
                    <input type="file" name="foto" id="foto">
                    <p>Recommended: ukuran gambar 144x115 pixel</p>
                    <div id="errors">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    Teks & Tulisan</a>
            </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="container">
                    <div class="container" style="background: #f5f5f5;">
                        <?php echo form_open_multipart('')?>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Company</label>
                            </div>
                            <div class="col-md-10">
                                <input name="company" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Address</label>
                            </div>
                            <div class="col-md-10">
                                <input name="address" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-10">
                                <input name="phone" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Fax</label>
                            </div>
                            <div class="col-md-10">
                                <input name="fax" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Email</label>
                            </div>
                            <div class="col-md-10">
                                <input name="email" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Website</label>
                            </div>
                            <div class="col-md-10">
                                <input name="website" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Widget Facebook</label>
                            </div>
                            <div class="col-md-10">
                                <input name="weidget_facebook" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Widget Twitter</label>
                            </div>
                            <div class="col-md-10">
                                <input name="widget_twitter" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Facebook Fanpage URL</label>
                            </div>
                            <div class="col-md-10">
                                <input name="facebook_fanpage_url" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Facebook Page ID</label>
                            </div>
                            <div class="col-md-10">
                                <input name="facebook_page_id" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Facebook App ID</label>
                            </div>
                            <div class="col-md-10">
                                <input name="facebook_app_id" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Facebook App Secret Key</label>
                            </div>
                            <div class="col-md-10">
                                <input name="facebook_app_secret_key" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Twitter URL</label>
                            </div>
                            <div class="col-md-10">
                                <input name="twitter_url" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Twitter Oauth Access Token</label>
                            </div>
                            <div class="col-md-10">
                                <input name="twitter_oauth_access_token" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Twitter Oauth Access Token Secret</label>
                            </div>
                            <div class="col-md-10">
                                <input name="twitter_oauth_access_token_secret" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Twitter Consumer Key</label>
                            </div>
                            <div class="col-md-10">
                                <input name="twitter_consumer_key" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Twitter Screen Name</label>
                            </div>
                            <div class="col-md-10">
                                <input name="twitter_screen_name" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Instagram URL</label>
                            </div>
                            <div class="col-md-10">
                                <input name="instagram_url" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Instagram URL</label>
                            </div>
                            <div class="col-md-10">
                                <input name="instagram_url" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Instagram Access Token Text</label>
                            </div>
                            <div class="col-md-10">
                                <input name="instagram_access_token_text" type="text" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Copyright</label>
                            </div>
                            <div class="col-md-10">
                                <input name="copyright" type="text" class="form-control"/>
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
                            <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
                        </div>
                        <?php form_close(); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

