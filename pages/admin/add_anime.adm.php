<title>Add Anime | <?= $config["name"] ?></title>
<div class="alert alert-success text-center" role="alert">If you are missing the relations and other stuff, you can add those once you added the Anime!</div>
<div class="panel panel-default">
    <?php

    $nextA = $conn->query("SELECT `id` FROM `anime` ORDER BY `id` DESC LIMIT 1");

    $nextA = mysqli_fetch_assoc($nextA);
    $nextA = $nextA["id"];
    $nextA++;
    
    if(isset($_GET["step"])) {
        $step = $_GET["step"];
        $ext = $_GET["ext"];
    } else {
        $step = "1";
    }
    if($step!=="2") {
    ?>
    <div class="panel-heading">
        <h3 class="panel-title">
            Upload Image
        </h3>
    </div>
    <div class="panel-body">
        <?php include("upload.php"); ?>
    </div>
    <?php } else { ?>
    <div class="panel-heading">
        <h3 class="panel-title">Add Anime Information</h3>
    </div>
    <div class="panel-body">
        <?php if(!empty($ext)) { ?>
        <form class="form-horizontal" action="" method="post" name="add_anime">
            <div class="form-group">
                <label class="col-sm-3">Image:</label>
                <div class="col-sm-6">
                    <img style="width:100%" src="<?= $config["url"] ?>images/animes/<?= $nextA ?>.<?= $ext ?>">
                    <input hidden type="text" value="<?= $ext ?>" name="anime_image">
                </div>
                <div class="col-sm-3">
                    <a style="width:100%" href="<?= $config["url"] ?>system/admin/add_anime/1" class="btn btn-danger">Wrong image?</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3">Name:</label>
                <div class="col-sm-9">
                    <input maxlength="100" type="text" name="anime_name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3">Alternate Titles:</label>
                <div class="col-sm-9">
                    <input maxlength="250" type="text" name="anime_alternates" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3">Status:</label>
                <div class="col-sm-9">
                    <select class="form-control selectpicker" name="anime_status">
                        <option value="0">Announced</option>
                        <option value="1" selected>Airing</option>
                        <option value="2">Completed</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3">Description:</label>
                <div class="col-sm-9">
                    <textarea maxlength="5000" style="height:100px;max-width:100%" type="text" name="anime_description" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" name="add_anime" class="btn btn-success" style="width:100%" value="Add Anime">
                </div>
            </div>
        </form>
        <hr>
        <a href="<?= $config["url"] ?>system/admin/default" class="btn btn-danger" style="width:100%">Cancel</a>
        <?php } else { ?>
        You did not upload an Image...
        <?php } ?>
    </div>
    <?php } ?>
</div>
