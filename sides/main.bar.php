<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">My Account</h3>
    </div>
    <div class="panel-body">
        <?php if(!isset($_SESSION["username"])) { ?>
        Please <a href="<?php echo $config["url"]; ?>signup">register</a> or <a href="<?php echo $config["url"]; ?>login">login</a> to view and manage your account.
        <?php } else { ?>
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
        <?php } ?>
    </div>
</div>
