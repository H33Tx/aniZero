<?php

if(isset($_SESSION["username"])) { ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Controls</h3>
    </div>
    <div class="panel-body">
        <?php
        
        // Check bookmarks for user
        $uBookmarks = $conn->query("SELECT * FROM `bookmarks` WHERE `uid`='$uID' AND `aid`='$aID'");
        if($uBookmarks->num_rows >= 1) {
            $ubm = $uBookmarks->fetch_assoc();
            $bm_episode = $ubm["ep"];
            $bm_status = $ubm["status"];
            // User Bookmarked this
            $bookmarked = true;
            //$bm_episode = $user_bookmark_check["ep"];
        } else {
            // User didn't Bookmark this
            $bookmarked = false;
        }
                                  
        ?>
        <?php
        if($bookmarked==true) { ?>
        <form action="" method="post" name="update_bookmark">
            <input hidden type="text" value="<?= $reEP ?>" name="episode">
            <input hidden type="text" value="<?= $aID ?>" name="anime">
            <input hidden type="text" value="<?= $uID ?>" name="user">
            <select name="status" class="form-control">
                <option <?php if($bm_status=="0") { echo "selected"; } ?> value="0">Planned</option>
                <option <?php if($bm_status=="1") { echo "selected"; } ?> value="1">Watching</option>
                <option <?php if($bm_status=="2") { echo "selected"; } ?> value="2">Completed</option>
                <option <?php if($bm_status=="3") { echo "selected"; } ?> value="3">Paused</option>
                <option <?php if($bm_status=="4") { echo "selected"; } ?> value="4">Dropped</option>
            </select>
            <b>Last Tracked Episode:</b> <b style="color:red"><?= $bm_episode ?></b><br>
            <b>Current Episode:</b> <b style="color:red"><?= $reEP ?></b><br>
            <input style="width:100%" type="submit" name="update_bookmark" class="btn btn-success" value="Update Bookmark">
        </form>
        <hr>
        <form action="" method="post" name="remove_bookmark">
            <input hidden type="text" value="<?= $aID ?>" name="anime">
            <input hidden type="text" value="<?= $uID ?>" name="user">
            <input style="width:100%" type="submit" name="remove_bookmark" class="btn btn-danger" value="Remove Bookmark">
        </form>
        <?php } else { ?>
        <form action="" method="post" name="add_bookmark">
            <input hidden type="text" value="<?= $aID ?>" name="anime">
            <input hidden type="text" value="<?= $reEP ?>" name="episode">
            <input hidden type="text" value="<?= $uID ?>" name="user">
            <select name="status" class="form-control">
                <option value="0">Planned</option>
                <option value="1">Watching</option>
                <option value="2">Completed</option>
                <option value="3">Paused</option>
                <option value="4">Dropped</option>
            </select>
            <input style="width:100%;" type="submit" name="add_bookmark" class="btn btn-success" value="Bookmark Anime">
        </form>
        <?php } ?>
    </div>
</div>

<?php } else { ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Controls</h3>
    </div>
    <div class="panel-body">
        Dear Guest, please <a href="<?= $config["url"] ?>login">Login</a> or <a href="<?= $config["url"] ?>signup">Register</a> to Bookmark or follow Animes to keep track of them.
    </div>
</div>

<?php }

?>

<?php include("sides/main.bar.php"); ?>
