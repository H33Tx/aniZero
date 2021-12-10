<?php

$monday = $conn->query("SELECT * FROM `schedule` WHERE `day`='1'");
$tuesday = $conn->query("SELECT * FROM `schedule` WHERE `day`='2'");
$wednesday = $conn->query("SELECT * FROM `schedule` WHERE `day`='3'");
$thursday = $conn->query("SELECT * FROM `schedule` WHERE `day`='4'");
$friday = $conn->query("SELECT * FROM `schedule` WHERE `day`='5'");
$saturday = $conn->query("SELECT * FROM `schedule` WHERE `day`='6'");
$sunday = $conn->query("SELECT * FROM `schedule` WHERE `day`='7'");

?>

<title>Anime Schedule | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Anime Schedule</h3>
    </div>
    <div class="panel-body">
        <h4>Monday</h4>
        <?php
    if ($monday->num_rows > 0) {
        while($row = $monday->fetch_assoc()) {
            $animeID = $row["aid"];
            $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$animeID' LIMIT 1");
            $anime = mysqli_fetch_assoc($anime);
        ?>
        <form class="form-horizontal" method="post" action="">
            <input type="text" value="<?= $row["id"] ?>" name="schedule_id" hidden>
            <div class="form-group">
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="schedule_anime" value="<?= $row["aid"] ?>">
                </div>
                <div class="col-sm-3">
                    <select class="selectpicker form-control" title="Release Day" required name="schedule_day">
                        <option <?php if($row["day"]=="1") { echo "selected"; } ?> value="1">Monday</option>
                        <option <?php if($row["day"]=="2") { echo "selected"; } ?> value="2">Tuesday</option>
                        <option <?php if($row["day"]=="3") { echo "selected"; } ?> value="3">Wednesday</option>
                        <option <?php if($row["day"]=="4") { echo "selected"; } ?> value="4">Thursday</option>
                        <option <?php if($row["day"]=="5") { echo "selected"; } ?> value="5">Friday</option>
                        <option <?php if($row["day"]=="6") { echo "selected"; } ?> value="6">Saturday</option>
                        <option <?php if($row["day"]=="7") { echo "selected"; } ?> value="7">Sunday</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="time" name="schedule_time" class="form-control" value="<?= $row["time"] ?>" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="edit_schedule" class="form-control btn btn-success" value="Save">
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="delete_schedule" class="form-control btn btn-danger" value="Delete">
                </div>
            </div>
        </form>
        <?php }
    }
        ?>
        <hr>
        <h4>Tuesday</h4>

        <?php
    if ($tuesday->num_rows > 0) {
        while($row = $tuesday->fetch_assoc()) {
            $animeID = $row["aid"];
            $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$animeID' LIMIT 1");
            $anime = mysqli_fetch_assoc($anime);
        ?>
        <form class="form-horizontal" method="post" action="">
            <input type="text" value="<?= $row["id"] ?>" name="schedule_id" hidden>
            <div class="form-group">
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="schedule_anime" value="<?= $row["aid"] ?>">
                </div>
                <div class="col-sm-3">
                    <select class="selectpicker form-control" title="Release Day" required name="schedule_day">
                        <option <?php if($row["day"]=="1") { echo "selected"; } ?> value="1">Monday</option>
                        <option <?php if($row["day"]=="2") { echo "selected"; } ?> value="2">Tuesday</option>
                        <option <?php if($row["day"]=="3") { echo "selected"; } ?> value="3">Wednesday</option>
                        <option <?php if($row["day"]=="4") { echo "selected"; } ?> value="4">Thursday</option>
                        <option <?php if($row["day"]=="5") { echo "selected"; } ?> value="5">Friday</option>
                        <option <?php if($row["day"]=="6") { echo "selected"; } ?> value="6">Saturday</option>
                        <option <?php if($row["day"]=="7") { echo "selected"; } ?> value="7">Sunday</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="time" name="schedule_time" class="form-control" value="<?= $row["time"] ?>" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="edit_schedule" class="form-control btn btn-success" value="Save">
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="delete_schedule" class="form-control btn btn-danger" value="Delete">
                </div>
            </div>
        </form>
        <?php }
    }
        ?>
        <hr>
        <h4>Wednesday</h4>

        <?php
    if ($wednesday->num_rows > 0) {
        while($row = $wednesday->fetch_assoc()) {
            $animeID = $row["aid"];
            $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$animeID' LIMIT 1");
            $anime = mysqli_fetch_assoc($anime);
        ?>
        <form class="form-horizontal" method="post" action="">
            <input type="text" value="<?= $row["id"] ?>" name="schedule_id" hidden>
            <div class="form-group">
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="schedule_anime" value="<?= $row["aid"] ?>">
                </div>
                <div class="col-sm-3">
                    <select class="selectpicker form-control" title="Release Day" required name="schedule_day">
                        <option <?php if($row["day"]=="1") { echo "selected"; } ?> value="1">Monday</option>
                        <option <?php if($row["day"]=="2") { echo "selected"; } ?> value="2">Tuesday</option>
                        <option <?php if($row["day"]=="3") { echo "selected"; } ?> value="3">Wednesday</option>
                        <option <?php if($row["day"]=="4") { echo "selected"; } ?> value="4">Thursday</option>
                        <option <?php if($row["day"]=="5") { echo "selected"; } ?> value="5">Friday</option>
                        <option <?php if($row["day"]=="6") { echo "selected"; } ?> value="6">Saturday</option>
                        <option <?php if($row["day"]=="7") { echo "selected"; } ?> value="7">Sunday</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="time" name="schedule_time" class="form-control" value="<?= $row["time"] ?>" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="edit_schedule" class="form-control btn btn-success" value="Save">
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="delete_schedule" class="form-control btn btn-danger" value="Delete">
                </div>
            </div>
        </form>
        <?php }
    }
        ?>
        <hr>
        <h4>Thursday</h4>

        <?php
    if ($thursday->num_rows > 0) {
        while($row = $thursday->fetch_assoc()) {
            $animeID = $row["aid"];
            $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$animeID' LIMIT 1");
            $anime = mysqli_fetch_assoc($anime);
        ?>
        <form class="form-horizontal" method="post" action="">
            <input type="text" value="<?= $row["id"] ?>" name="schedule_id" hidden>
            <div class="form-group">
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="schedule_anime" value="<?= $row["aid"] ?>">
                </div>
                <div class="col-sm-3">
                    <select class="selectpicker form-control" title="Release Day" required name="schedule_day">
                        <option <?php if($row["day"]=="1") { echo "selected"; } ?> value="1">Monday</option>
                        <option <?php if($row["day"]=="2") { echo "selected"; } ?> value="2">Tuesday</option>
                        <option <?php if($row["day"]=="3") { echo "selected"; } ?> value="3">Wednesday</option>
                        <option <?php if($row["day"]=="4") { echo "selected"; } ?> value="4">Thursday</option>
                        <option <?php if($row["day"]=="5") { echo "selected"; } ?> value="5">Friday</option>
                        <option <?php if($row["day"]=="6") { echo "selected"; } ?> value="6">Saturday</option>
                        <option <?php if($row["day"]=="7") { echo "selected"; } ?> value="7">Sunday</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="time" name="schedule_time" class="form-control" value="<?= $row["time"] ?>" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="edit_schedule" class="form-control btn btn-success" value="Save">
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="delete_schedule" class="form-control btn btn-danger" value="Delete">
                </div>
            </div>
        </form>
        <?php }
    }
        ?>
        <hr>
        <h4>Friday</h4>

        <?php
    if ($friday->num_rows > 0) {
        while($row = $friday->fetch_assoc()) {
            $animeID = $row["aid"];
            $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$animeID' LIMIT 1");
            $anime = mysqli_fetch_assoc($anime);
        ?>
        <form class="form-horizontal" method="post" action="">
            <input type="text" value="<?= $row["id"] ?>" name="schedule_id" hidden>
            <div class="form-group">
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="schedule_anime" value="<?= $row["aid"] ?>">
                </div>
                <div class="col-sm-3">
                    <select class="selectpicker form-control" title="Release Day" required name="schedule_day">
                        <option <?php if($row["day"]=="1") { echo "selected"; } ?> value="1">Monday</option>
                        <option <?php if($row["day"]=="2") { echo "selected"; } ?> value="2">Tuesday</option>
                        <option <?php if($row["day"]=="3") { echo "selected"; } ?> value="3">Wednesday</option>
                        <option <?php if($row["day"]=="4") { echo "selected"; } ?> value="4">Thursday</option>
                        <option <?php if($row["day"]=="5") { echo "selected"; } ?> value="5">Friday</option>
                        <option <?php if($row["day"]=="6") { echo "selected"; } ?> value="6">Saturday</option>
                        <option <?php if($row["day"]=="7") { echo "selected"; } ?> value="7">Sunday</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="time" name="schedule_time" class="form-control" value="<?= $row["time"] ?>" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="edit_schedule" class="form-control btn btn-success" value="Save">
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="delete_schedule" class="form-control btn btn-danger" value="Delete">
                </div>
            </div>
        </form>
        <?php }
    }
        ?>
        <hr>
        <h4>Saturday</h4>

        <?php
    if ($saturday->num_rows > 0) {
        while($row = $saturday->fetch_assoc()) {
            $animeID = $row["aid"];
            $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$animeID' LIMIT 1");
            $anime = mysqli_fetch_assoc($anime);
        ?>
        <form class="form-horizontal" method="post" action="">
            <input type="text" value="<?= $row["id"] ?>" name="schedule_id" hidden>
            <div class="form-group">
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="schedule_anime" value="<?= $row["aid"] ?>">
                </div>
                <div class="col-sm-3">
                    <select class="selectpicker form-control" title="Release Day" required name="schedule_day">
                        <option <?php if($row["day"]=="1") { echo "selected"; } ?> value="1">Monday</option>
                        <option <?php if($row["day"]=="2") { echo "selected"; } ?> value="2">Tuesday</option>
                        <option <?php if($row["day"]=="3") { echo "selected"; } ?> value="3">Wednesday</option>
                        <option <?php if($row["day"]=="4") { echo "selected"; } ?> value="4">Thursday</option>
                        <option <?php if($row["day"]=="5") { echo "selected"; } ?> value="5">Friday</option>
                        <option <?php if($row["day"]=="6") { echo "selected"; } ?> value="6">Saturday</option>
                        <option <?php if($row["day"]=="7") { echo "selected"; } ?> value="7">Sunday</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="time" name="schedule_time" class="form-control" value="<?= $row["time"] ?>" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="edit_schedule" class="form-control btn btn-success" value="Save">
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="delete_schedule" class="form-control btn btn-danger" value="Delete">
                </div>
            </div>
        </form>
        <?php }
    }
        ?>
        <hr>
        <h4>Sunday</h4>

        <?php
    if ($sunday->num_rows > 0) {
        while($row = $sunday->fetch_assoc()) {
            $animeID = $row["aid"];
            $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$animeID' LIMIT 1");
            $anime = mysqli_fetch_assoc($anime);
        ?>
        <form class="form-horizontal" method="post" action="">
            <input type="text" value="<?= $row["id"] ?>" name="schedule_id" hidden>
            <div class="form-group">
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="schedule_anime" value="<?= $row["aid"] ?>">
                </div>
                <div class="col-sm-3">
                    <select class="selectpicker form-control" title="Release Day" required name="schedule_day">
                        <option <?php if($row["day"]=="1") { echo "selected"; } ?> value="1">Monday</option>
                        <option <?php if($row["day"]=="2") { echo "selected"; } ?> value="2">Tuesday</option>
                        <option <?php if($row["day"]=="3") { echo "selected"; } ?> value="3">Wednesday</option>
                        <option <?php if($row["day"]=="4") { echo "selected"; } ?> value="4">Thursday</option>
                        <option <?php if($row["day"]=="5") { echo "selected"; } ?> value="5">Friday</option>
                        <option <?php if($row["day"]=="6") { echo "selected"; } ?> value="6">Saturday</option>
                        <option <?php if($row["day"]=="7") { echo "selected"; } ?> value="7">Sunday</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="time" name="schedule_time" class="form-control" value="<?= $row["time"] ?>" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="edit_schedule" class="form-control btn btn-success" value="Save">
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="delete_schedule" class="form-control btn btn-danger" value="Delete">
                </div>
            </div>
        </form>
        <?php }
    }
        ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Add Schedule</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" name="add_schedule" action="" method="post">
            <div class="form-group">
                <label class="col-sm-3 control-label">Anime ID:</label>
                <div class="col-sm-9">
                    <input type="text" name="anime_id" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Time</label>
                <div class="col-sm-9">
                    <input type="time" name="anime_time" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Day:</label>
                <div class="col-sm-9">
                    <select class="selectpicker form-control" title="Release Day" required name="anime_day">
                        <option value="1">Monday</option>
                        <option value="2">Tuesday</option>
                        <option value="3">Wednesday</option>
                        <option value="4">Thursday</option>
                        <option value="5">Friday</option>
                        <option value="6">Saturday</option>
                        <option value="7">Sunday</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" name="add_schedule" class="form-control btn btn-success" value="Add to Schedule">
                </div>
            </div>
        </form>
    </div>
</div>
