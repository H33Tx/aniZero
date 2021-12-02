<title>Home - Administraion Panel | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Administration Panel</h3>
    </div>
    <div class="panel-body">
        <h4>Settings</h4>
        <div class="row">
            <div class="col-sm-12">
                <a style="width:100%" class="btn btn-success" href="<?= $config["url"] ?>system/admin/general_settings">General Site Settings</a>
            </div>
        </div>
        <h4>Animes</h4>
        <div class="row">
            <div class="col-sm-4">
                <a style="width:100%" class="btn btn-success" href="<?= $config["url"] ?>system/admin/add_anime">Add Anime</a>
            </div>
            <div class="col-sm-4">
                <a style="width:100%" class="btn btn-success" href="<?= $config["url"] ?>system/admin/browse_animes">Browse Animes</a>
            </div>
            <div class="col-sm-4">
                <a style="width:100%" class="btn btn-success" href="<?= $config["url"] ?>system/admin/browse_episodes">Browse Episodes</a>
            </div>
        </div>
        <h4>Comments</h4>
        <div class="row">
            <div class="col-sm-12">
                <a style="width:100%" class="btn btn-success" href="<?= $config["url"] ?>system/admin/manage_comments">Manage Comments</a>
            </div>
        </div>
        <h4>Users</h4>
        <div class="row">
            <div class="col-sm-6">
                <a style="width:100%" class="btn btn-success" href="<?= $config["url"] ?>system/admin/manage_users">Manage Users</a>
            </div>
            <div class="col-sm-6">
                <a style="width:100%" class="btn btn-success" href="<?= $config["url"] ?>system/admin/browse_users">Browse Users</a>
            </div>
        </div>
        <h4>Reports</h4>
        <div class="row">
            <div class="col-sm-12">
                <a style="width:100%" class="btn btn-success" href="<?= $config["url"] ?>system/admin/view_reports">View Reports</a>
            </div>
        </div>
    </div>
</div>
