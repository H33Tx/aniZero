<title>Edit Password | <?php echo $config["name"]; ?></title>
<div role="tabpanel" class="tab-pane fade" id="change_password">
    <form class="form-horizontal" method="post" id="change_password_form" name="edit-password">
        <div class="form-group">
            <label for="old_password" class="col-sm-3 control-label">Old password:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old password">
            </div>
        </div>
        <div class="form-group">
            <label for="new_password1" class="col-sm-3 control-label">New password:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="New password">
            </div>
        </div>
        <div class="form-group">
            <label for="new_password2" class="col-sm-3 control-label">New password (again):</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="new_password1" name="new_password2" placeholder="New password (again)">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input type="submit" class="btn btn-danger" id="change_password_button" value="Change Password" name="edit-password">
            </div>
        </div>
    </form>
</div>
