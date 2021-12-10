<title>General Settings | <?= $config["name"] ?></title>
<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px">
    <li class="active" role="presentation"><a href="#general" aria-controls="messages" role="tab" data-toggle="tab">General</a></li>
    <li role="presentation"><a href="#layout" aria-controls="layout" role="tab" data-toggle="tab">Layout</a></li>
    <li role="presentation"><a href="#registration" aria-controls="registration" role="tab" data-toggle="tab">Registration</a></li>
    <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">Contact/Socials</a></li>
    <li role="presentation"><a href="#advanced" aria-controls="advanced" role="tab" data-toggle="tab">Advanced</a></li>
</ul>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="general">
        <form class="form-horizontal" name="edit_settings_default" method="post" id="general" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-3 control-label">Site Name:</label>
                <div class="col-sm-9">
                    <input type="text" name="site_name" class="form-control" value="<?= $config["name"] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Site URL:</label>
                <div class="col-sm-9">
                    <input type="text" name="site_url" class="form-control" value="<?= $config["url"] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Site Logo:</label>
                <div class="col-sm-9">
                    <input type="text" name="site_logo" class="form-control" value="<?= $config["logo"] ?>">
                    <label class="text-center">The Logo should be located in "[ROOT]/images/system/[LOGO]".<br>Preferred dimensions are 300x50. Leave empty for Text only.</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">SEO description:</label>
                <div class="col-sm-9">
                    <textarea style="max-width:100%;height:200px;" type="text" name="site_descr" class="form-control"><?= $config["descr"] ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-success" value="Save Changes" style="width:100%" name="edit_settings_default">
                </div>
            </div>
        </form>
    </div>

    <div role="tabpanel" class="tab-pane fade" id="layout">
        <form class="form-horizontal" method="post" name="edit_settings_layout" id="change_password_form">
            <div class="form-group">
                <label class="col-sm-3 control-label">Default Theme:</label>
                <div class="col-sm-9">
                    <select class="form-control selectpicker" name="site_theme">
                        <option <?php if($config["theme"]=="1") { echo "selected"; } ?> value="1">Light Theme</option>
                        <option <?php if($config["theme"]=="2") { echo "selected"; } ?> value="2">Dark Theme</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" name="edit_settings_layout" class="btn btn-success" value="Save Changes" style="width:100%">
                </div>
            </div>
        </form>
    </div>

    <div role=" tabpanel" class="tab-pane fade" id="registration">
        <form class="form-horizontal" method="post" id="edit_settings_registration">
            <div class="form-group">
                <label class="col-sm-3 control-label">Registrations Enabled:</label>
                <div class="col-sm-9">
                    <select title="Registrations enabled?" class="form-control selectpicker" id="lang_id" name="registration_enabled" data-size="10">
                        <option <?php if($config["registration"]=="0") { echo "selected"; } ?> value="0">Disabled</option>
                        <option <?php if($config["registration"]=="1") { echo "selected"; } ?> value="1">Enabled</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" name="edit_settings_registration" class="btn btn-success" value="Save Changes" style="width:100%">
                </div>
            </div>


        </form>
    </div>

    <div role="tabpanel" class="tab-pane fade" id="contact">
        <form class="form-horizontal" method="post" name="edit_settings_contact" id="reader_settings_form">
            <div class="form-group">
                <label class="col-sm-3 control-label">Webmaster Email:</label>
                <div class="col-sm-9">
                    <input type="text" name="webmaster_email" class="form-control" value="<?= $config["email"] ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" name="edit_settings_contact" class="btn btn-success" value="Save Changes" style="width:100%">
                </div>
            </div>
        </form>
    </div>

    <div role="tabpanel" class="tab-pane fade" id="advanced">
        <form class="form-horizontal" method="post" id="filter_settings_form" name="edit_settings_advanced">
            <div class="form-group">
                <label class="col-sm-3 control-label">Clean IPs:</label>
                <div class="col-sm-9">
                    <select name="store_cleanip" class="form-control selectpicker">
                        <option <?php if($config["cleanip"]=="0") { echo "selected"; } ?> value="0">Disabled</option>
                        <option <?php if($config["cleanip"]=="1") { echo "selected"; } ?> value="1">Enabled</option>
                    </select>
                    Store IPs of users in a table unhashed?
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" name="edit_settings_advanced" class="btn btn-success" value="Save Changes" style="width:100%">
                </div>
            </div>
        </form>
    </div>
</div>
