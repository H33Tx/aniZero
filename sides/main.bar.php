<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">My Account</h3>
    </div>
    <?php if(!isset($_SESSION["username"])) { ?>
    <div class="panel-body">
        Please <a href="<?php echo $config["url"]; ?>signup">register</a> or <a href="<?php echo $config["url"]; ?>login">login</a> to view and manage your account.
    </div>
    <?php } else { ?>
    <!--<div class="panel-body">
        Welcome, <a href="<?php echo $config["url"]; ?>user/<?php echo $uID; echo "/"; echo $uName; ?>"><?php echo $uName; ?></a>!
        <hr>
        <ul>
            <li><a href="<?php echo $config["url"]; ?>user/watchlist/<?php echo $uID; ?>">My Watchlist</a></li>
            <li><a href="<?php echo $config["url"]; ?>user/follows">My Follows</a></li>
            <li><a href="<?php echo $config["url"]; ?>user/<?php echo $uID; echo "/"; echo $uName; ?>">My Profile</a></li>
            <li><a href="<?php echo $config["url"]; ?>user/settings">Edit my Account</a></li>
            <?php if($uGroup=="Administrator") { ?>
            <li><a href="<?php echo $config["url"]; ?>system/admin">Administration Panel</a></li>
            <?php } ?>
            <?php if($uGroup=="Moderator" || $uGroup=="Administrator") { ?>
            <li><a href="<?php echo $config["url"]; ?>system/mod">Moderation Panel</a></li>
            <?php } ?>
        </ul>
        <hr>
        <a href="<?php echo $config["url"]; ?>logout">Logout</a>
    </div>-->
    <div class="list-group">
        <a href="<?= $config["url"] ?>user/<?= $uID ?>/<?= $uName ?>" class="list-group-item">My Profile</a>
        <a href="<?= $config["url"] ?>user/follows/" class="list-group-item">Follows</a>
        <a href="<?= $config["url"] ?>user/watchlist/<?= $uID ?>" class="list-group-item">Watchlist</a>
        <a href="<?= $config["url"] ?>user/settings/" class="list-group-item">Edit Account</a>
        <?php if($uGroup=="Administrator") { ?>
        <a href="<?= $config["url"] ?>system/admin/" class="list-group-item"><?= glyph("wrench") ?> Admin-Panel</a>
        <?php } if($uGroup=="Moderator" || $uGroup=="Administrator") { ?>
        <a href="<?= $config["url"] ?>system/mod/" class="list-group-item"><?= glyph("wrench") ?> Mod-Panel</a>
        <?php } ?>
        <a href="<?= $config["url"] ?>user/watchlist/<?= $uID ?>" class="list-group-item list-group-item-danger">Logout</a>
    </div>
    <?php } ?>
</div>
