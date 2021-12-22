<?php if($uGroup=="Administrator") { ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Shortcuts</h3>
    </div>
    <div class="list-group">
        <a href="<?= $config["url"] ?>system/admin/" class="list-group-item">Admin Home</a>
        <a href="<?= $config["url"] ?>system/admin/" class="list-group-item">General Settings</a>
        <a href="<?= $config["url"] ?>system/admin/" class="list-group-item">Schedule</a>
        <a href="<?= $config["url"] ?>system/admin/" class="list-group-item">Add Anime</a>
        <a href="<?= $config["url"] ?>system/admin/" class="list-group-item">Browse Animes</a>
        <a href="<?= $config["url"] ?>system/admin/" class="list-group-item">Browse Episodes</a>
        <a href="<?= $config["url"] ?>system/admin/" class="list-group-item">Manage Comments</a>
        <a href="<?= $config["url"] ?>system/admin/" class="list-group-item">Manage Users</a>
        <a href="<?= $config["url"] ?>system/admin/" class="list-group-item">Browse Users</a>
        <a href="<?= $config["url"] ?>system/admin/" class="list-group-item">View Reports</a>
        <!--<ul>
            <li><a href="<?= $config["url"] ?>system/admin/default">Admin Home</a></li>
            <li><a href="<?= $config["url"] ?>system/admin/general_settings">General Settings</a></li>
            <li><a href="<?= $config["url"] ?>system/admin/schedule">Schedule</a></li>
            <li><a href="<?= $config["url"] ?>system/admin/add_anime/1">Add Anime</a></li>
            <li><a href="<?= $config["url"] ?>system/admin/browse_animes/1">Browse Animes</a></li>
            <li><a href="<?= $config["url"] ?>system/admin/browse_episodes/1">Browse Episodes</a></li>
            <li><a href="<?= $config["url"] ?>system/admin/manage_comments/1">Manage Comments</a></li>
            <li><a href="<?= $config["url"] ?>system/admin/manage_users/1">Manage Users</a></li>
            <li><a href="<?= $config["url"] ?>system/admin/browse_users/1">Browse Users</a></li>
            <li><a href="<?= $config["url"] ?>system/admin/view_reports/1">View Reports</a></li>
        </ul>-->
    </div>
</div>

<?php } ?>

<?php include("sides/main.bar.php"); ?>
