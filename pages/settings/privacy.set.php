<div role="tabpanel" class="tab-pane fade" id="filter_settings">
    <form class="form-horizontal" method="post" id="edit-privacy">
        <div class="form-group">
            <label for="cat_id" class="col-sm-3 control-label">Profile:</label>
            <div class="col-sm-9">
                <select class="form-control selectpicker" id="hentai_mode" name="private">
                    <option <?php if($uPrivate==0) { echo "selected"; } ?> value="0">Public</option>
                    <option <?php if($uPrivate==1) { echo "selected"; } ?> value="1">Private</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="cat_id" class="col-sm-3 control-label">Watchlist:</label>
            <div class="col-sm-9">
                <select class="form-control selectpicker" id="hentai_mode" name="watchlist">
                    <option <?php if($uWatchlist==0) { echo "selected"; } ?> value="0">Public</option>
                    <option <?php if($uWatchlist==1) { echo "selected"; } ?> value="1">Private</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input type="submit" class="btn btn-default" id="filter_settings_button" value="Save" name="edit-privacy">
            </div>
        </div>


    </form>
</div>
