<meta property="og:title" content="Release Schedule of <?= $config["name"] ?>.">
<meta property="og:description" content="Wanna know what Anime comes next? Check this out, here you get to know it!">
<meta property="og:image" content="<?php echo $config["url"]; ?>sup.png">
<?php

$schedule = $conn->query("SELECT * FROM `schedule` ORDER BY day ASC, time ASC");

?>
<title>Anime Schedule | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Anime Schedule</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th width="10%">Day</th>
                        <th width="10%">Time</th>
                        <th width="10%">Episode</th>
                        <th width="50%">Anime</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    if ($schedule->num_rows > 0) {
        while($row = $schedule->fetch_assoc()) {
            if($row["day"]=="1") {
                $row["day"] = "Monday";
            } elseif($row["day"]=="2") {
                $row["day"] = "Tuesday";
            } elseif($row["day"]=="3") {
                $row["day"] = "Wednesday";
            } elseif($row["day"]=="4") {
                $row["day"] = "Thursday";
            } elseif($row["day"]=="5") {
                $row["day"] = "Friday";
            } elseif($row["day"]=="6") {
                $row["day"] = "Saturday";
            } elseif($row["day"]=="7") {
                $row["day"] = "Sunday";
            }
            $animeID = $row["aid"];
            $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$animeID' LIMIT 1");
            $anime = mysqli_fetch_assoc($anime);
            $episode = $conn->query("SELECT * FROM `episodes` WHERE `aid`='$animeID' AND `episode`<='10000' ORDER BY LENGTH(`episode`) DESC, `episode` DESC LIMIT 1");
            $episode = mysqli_fetch_assoc($episode);
            $episode["episode"]++;
            //Planned to use on greening episodes already past due date but idk how 2 do
            /*if(date("D")=="Mon") {
                $date["day"] = "Monday";
            } elseif(date("D")=="Tue") {
                $date["day"] = "Tuesday";
            } elseif(date("D")=="Wed") {
                $date["day"] = "Wednesday";
            } elseif(date("D")=="Thu") {
                $date["day"] = "Thursday";
            } elseif(date("D")=="Fri") {
                $date["day"] = "Friday";
            } elseif(date("D")=="Sat") {
                $date["day"] = "Saturday";
            } elseif(date("D")=="Sun") {
                $date["day"] = "Sunday";
            } */
    ?>
                    <tr <?php //if(($row["day"]==)) { echo 'style="background:darkgreen;"';} ?>>
                        <td><?= $row["day"] ?></td>
                        <td><?= $row["time"] ?></td>
                        <td>Ep. <?= $episode["episode"] ?></td>
                        <td><a href="<?= $config["url"] ?>anime/<?= $anime["id"] ?>"><?= $anime["name"] ?></a></td>
                    </tr>
                    <?php
        }
    }
    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
