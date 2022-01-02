<?php

$anime = $_GET["id"];
$anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$anime' LIMIT 1");
$anime = mysqli_fetch_assoc($anime);

?>

<title>Delete <?= $anime["name"] ?> | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Delete <a href="<?= $config["url"] ?>anime/<?= $anime["id"] ?>"><b><?= $anime["name"] ?></b></a></h3>
    </div>
    <div class="panel-body">
        <h4><b>Are you sure you want to do this? This cannot be undone!</b></h4>
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <input type="text" hidden value="<?= $anime["id"] ?>" name="anime">
                <div class="col-sm-4">
                    <input type="submit" name="delete_anime_conf" class="btn-danger btn form-control" value="Yes, I am sure.">
                </div>
                <div class="col-sm-8">
                    <input type="submit" name="delete_anime_disc" class="btn-success btn form-control" value="No, I changed my mind.">
                </div>
            </div>
        </form>
    </div>
</div>
