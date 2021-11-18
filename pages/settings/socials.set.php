<div role="tabpanel" class="tab-pane fade" id="upload_settings">
    <form class="form-horizontal" method="post" id="upload_settings_form" name="edit-socials">

        <div class="form-group">
            <label for="website" class="col-sm-3 control-label">Website:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="old_password" name="website" placeholder="Website (No need for https:// or www!)" value="<?php echo $uWebsite; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="twitter" class="col-sm-3 control-label">Twitter:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="old_password" name="twitter" placeholder="Twitter Username" value="<?php echo $uTwitter; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="facebook" class="col-sm-3 control-label">Facebook:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="old_password" name="facebook" placeholder="Twitter Username" value="<?php echo $uFacebook; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="instagram" class="col-sm-3 control-label">Instagram:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="old_password" name="instagram" placeholder="Instagram Username" value="<?php echo $uInstagram; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="instagram" class="col-sm-3 control-label">About you:</label>
            <div class="col-sm-9">
                <textarea type="text" class="form-control" id="old_password" name="about" placeholder="Something about you...? (Max. 1000 Characters)" maxlength="1000"><?php echo $uAbout; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input type="submit" class="btn btn-default" name="edit-socials" id="upload_settings_button" value="Save">
            </div>
        </div>

    </form>
</div>
