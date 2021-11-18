<div role="tabpanel" class="tab-pane fade" id="reader_settings">
    <form class="form-horizontal" method="post" id="edit-appearance">

        <div class="form-group">
            <label for="theme" class="col-sm-3 control-label">Site Theme:</label>
            <div class="col-sm-9">
                <select class="form-control selectpicker" id="reader_mode" name="theme">
                    <option <?php if($uTheme==1) { echo "selected"; } ?> value="1">Light</option>
                    <option <?php if($uTheme==2) { echo "selected"; } ?> value="2">Dark</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input type="submit" class="btn btn-default" id="reader_settings_button" name="edit-appearance" value="Save">
            </div>
        </div>


    </form>
</div>
