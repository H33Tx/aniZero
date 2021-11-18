<title>Edit Profile | <?php echo $config["name"]; ?></title>
<div role="tabpanel" class="tab-pane fade in active" id="change_profile">
    <form class="form-horizontal" method="post" id="change_profile_form" name="edit-profile">
        <div class="form-group" class="display-none">
            <label for="username" class="col-sm-3 control-label">UserID:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="username" name="userid" value="<?php echo $uID; ?>" title="You can't change this." disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="username" class="col-sm-3 control-label">Username:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $uName; ?>" title="Email <?php echo $config["email"]; ?> to change this." disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email:</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $uEmail; ?>" title="Email <?php echo $config["email"]; ?> to change this." disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="gender" class="col-sm-3 control-label">Your Gender:</label>
            <div class="col-sm-9">
                <select class="form-control selectpicker" id="theme_id" name="gender">
                    <option <?php if($uGenderN==0) { echo "selected"; } ?> value="0">Not set</option>
                    <option <?php if($uGenderN==1) { echo "selected"; } ?> value="1">Male</option>
                    <option <?php if($uGenderN==2) { echo "selected"; } ?> value="2">Female</option>
                    <option <?php if($uGenderN==3) { echo "selected"; } ?> value="3">Non-Binary</option>
                    <option <?php if($uGenderN==4) { echo "selected"; } ?> value="4">Other</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="avatar" class="col-sm-3 control-label">Avatar:</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Currently not working. Please check back in some time..." name="avatar" readonly name="old_file">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            <span class="span-1280 disabled">Browse</span> <input type="file" name="file" id="file" disabled>
                        </span>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="avatar" class="col-sm-3 control-label">Current avatar:</label>
            <div class="col-sm-9">
                <img alt="avatar" width="100px" src="/images/users/<?php echo $uID.".".$uImage; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input type="submit" class="btn btn-default" id="change_profile_button" value="Save" name="edit-profile">
            </div>
        </div>
    </form>
</div>
