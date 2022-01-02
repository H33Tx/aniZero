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
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="anime_id">ID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="anime_id" name="anime_id" readonly value="<?= $anime["id"] ?>" placeholder="You shouldn't be seeing this...">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="anime_name">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="anime_name" name="anime_name" value="<?= $anime["name"] ?>" placeholder="Anime Name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="anime_alternates">Alternate Names</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="anime_alternates" name="anime_alternates" placeholder="Alternate Anime Names" style="max-width:100%;"><?= $anime["alternates"] ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <img src="<?= $config["url"] ?>images/animes/<?= $anime["id"] ?>.<?= $anime["image"] ?>" style="width:100%">
                </div>
                <div class="col-sm-9">
                    <a href="<?= $config["url"] ?>system/admin/update_cover/<?= $anime["id"] ?>" class="btn btn-success form-control">Click here to Update Cover-Image</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="anime_desc">Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="anime_desc" name="anime_desc" placeholder="Anime Description" style="max-width:100%;"><?= $anime["description"] ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="anime_status">Status</label>
                <div class="col-sm-9">
                    <select class="form-control selectpicker" name="anime_status" id="anime_status">
                        <option <?php if($anime["status"]=="0") { echo "selected"; } ?> value="0">Announced</option>
                        <option <?php if($anime["status"]=="1") { echo "selected"; } ?> value="1" selected>Airing</option>
                        <option <?php if($anime["status"]=="2") { echo "selected"; } ?> value="2">Completed</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <input class="btn-success btn form-control" name="edit_anime" type="submit" value="Save Changes">
                </div>
                <div class="col-sm-4">
                    <input class="btn-danger btn form-control" name="delete_anime_link" type="submit" value="Delete Anime">
                </div>
            </div>
        </form>
    </div>
</div>
