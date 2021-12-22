<?php

// Seriously - I gotta rework this someday...
$aEP = $_GET["ep"];
$aEP++;
$aTY = $_GET["type"];
$aHO = $_GET["host"];
$aSE = $_GET["service"];
//echo $aEP."<br>".$aTY."<br>".$aHO."<br>".$aSE;
$aID = $_GET["id"];
$anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$aID' LIMIT 1");
$anime = mysqli_fetch_assoc($anime);

?>
<title>Add Episode for <?= $anime["name"] ?> | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Add Episode for <b><a href="<?= $config["url"] ?>anime/<?= $aID ?>"><?= $anime["name"] ?></a></b></h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label class="control-label col-sm-3">Anime</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control input-control" value="<?= $anime["name"] ?>" readonly>
                    <input type="text" class="form-control input-control hidden" name="anime_id" value="<?= $anime["id"] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Episode</label>
                <div class="col-sm-9">
                    <input required type="number" name="anime_episode" class="form-control" placeholder="1" <?php if(!empty($aEP)) { ?>value="<?= $aEP ?>" <?php } ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Type</label>
                <div class="col-sm-9">
                    <select class="form-control selectpicker" title="Sub or Dub?" name="anime_type" required>
                        <option <?php if($aTY=="1") { echo "selected"; } ?> value="1">Sub</option>
                        <option <?php if($aTY=="0") { echo "selected"; } ?> value="0">Dub</option>
                        <option <?php if($aTY=="2") { echo "selected"; } ?> value="2">Raw</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Hoster</label>
                <div class="col-sm-9">
                    <select class="form-control selectpicker" title="External or Internal?" name="anime_host" required>
                        <option <?php if($aHO=="1") { echo "selected"; } ?> value="1">External</option>
                        <option <?php if($aHO=="2") { echo "selected"; } ?> value="2" disabled>Internal</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#external" aria-controls="external" role="tab" data-toggle="tab">External Hoster Settings</a></li>
                    <li role="presentation"><a href="#internal" aria-controls="internal" role="tab" data-toggle="tab">Internal Hosting Settings</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="external">
                        <div class="form-group">
                            <br>
                            <label class="control-label col-sm-3">Service</label>
                            <div class="col-sm-9">
                                <select class="form-control selectpicker" title="Select one Streamhoster below" name="external_service" required>
                                    <option <?php if($aSE=="youtube") { echo "selected"; } ?> value="youtube">YouTube</option>
                                    <option <?php if($aSE=="streamtape") { echo "selected"; } ?> value="streamtape">StreamTape</option>
                                    <option <?php if($aSE=="mp4upload") { echo "selected"; } ?> value="mp4upload">mp4upload</option>
                                    <option <?php if($aSE=="vivo") { echo "selected"; } ?> value="vivo">Vivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Embed URL</label>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control input-control" name="external_url" placeholder="https://mp4upload.com/embed-wdasoihf9827oughd.html or so">
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="internal">
                        <div class="col-sm-12">
                            <br>
                            <div class="input-group">
                                <p><?= glyph("info-sign") ?> This Feature is soon to be (since i & kleineick dont know how to do it)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" value="Add Episode!" name="add_episode" class="btn btn-success form-control">
                </div>
            </div>
        </form>
    </div>
</div>
