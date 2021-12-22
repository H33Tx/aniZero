<?php

// Still WIP

$aID = $_GET["id"];
$anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$aID' LIMIT 1");
$anime = mysqli_fetch_assoc($anime);

?>
<title>Edit Anime: <?= $anime["name"] ?> | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Anime: <b><a href="<?= $config["url"] ?>anime/<?= $aID ?>"><?= $anime["name"] ?></a></b></h3>
    </div>
    <div class="panel-body">
        <?= glyph("info-sign") ?> This Feature is soon to come (we are working on it!).
    </div>
</div>
