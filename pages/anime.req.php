<?php

if(empty($_GET["id"])) {
    $aid = "0";
} else {
    $aid = $_GET["id"];
}

$anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$aid'");
$anime = mysqli_fetch_assoc($anime);

?>

<?php if(!empty($anime["name"])) { ?>

<title><?= $anime["name"] ?> | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $anime["name"] ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-3">
                <img src="<?= $config["url"] ?>images/animes/<?= $anime["id"] ?>.<?= $anime["image"] ?>" width="100%">
            </div>
            <div class="col-sm-9">
                <table class="table table-condensed">
                    <tr>
                        <?= $anime["description"] ?>
                    </tr>
                    <tr>
                        <th width="50%">Rating:</th>
                        <td>Soon™</td>
                    </tr>
                    <tr>
                        <th>Your Rating:</th>
                        <td>Soon™</td>
                    </tr>
                    <tr>
                        <th>Tags:</th>
                        <td>Soon™</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Episodes</h3>
    </div>
    <div class="panel-body">
        <?php
    
        $episodeSQL = $conn->query("SELECT * FROM `episodes` WHERE `aid`='$aid' ORDER BY LENGTH(`episode`), `episode`");
        if ($episodeSQL->num_rows > 0) { ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th width="60%">Episode</th>
                        <th class="text-right">Released</th>
                    </tr>
                </thead>
                <tbody>
                    <?php // output data of each row
            while($row = $episodeSQL->fetch_assoc()) {
                echo "<tr>";
                echo "<td>";
                echo "<a href='".$config["url"]."watch/$aid/".$row["episode"]."'>Episode ".$row["episode"]."</a>";
                echo "</td>";
                echo "<td class='text-right'>";
                echo $row["released"];
                echo "</td>";
                echo "</td>";
            } ?>
                </tbody>
            </table>
        </div>
        <?php } else {
            echo "There are no Episodes at the Moment.";
        }
    
    ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Comments</h3>
    </div>
    <div class="panel-body">
        Soon™
    </div>
</div>

<?php

if($uGroup=="1" || $uGroup=="2") {
    // Happens when user is admin/mod
}

?>

<?php } else { ?>

<title>Error: Anime not found | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Uh oh...!</h3>
    </div>
    <div class="panel-body">
        <h3 class="text-center">Anime not found :(</h3>
        <center><img src="<?= $config["url"] ?>404.png" width="50%"></center>
    </div>
</div>

<?php } ?>
