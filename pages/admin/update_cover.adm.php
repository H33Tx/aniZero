<?php

$anime = $_GET["id"];
$anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$anime' LIMIT 1");
$anime = mysqli_fetch_assoc($anime);

?>

<title>Update Cover-Image of <?= $anime["name"] ?> | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Update Cover for <b><a href="<?= $config["url"] ?>anime/<?= $anime["id"] ?>"><?= $anime["name"] ?></a></b></h3>
    </div>
    <div class="panel-body">
        <?php include("upload.php"); ?>
        <br>
        <a href="<?= $config["url"] ?>system/admin/edit_anime/<?= $anime["id"] ?>" class="btn btn-danger form-control">Cancel Editing</a>
    </div>
</div>
