<?php

$reID = $_GET["id"];
if(!empty($_GET["ep"])) {
    $reEP = $_GET["ep"];
} else {
    $reEP = "1";
}

$killingmylove = $conn->query("SELECT * FROM `anime` WHERE `id`='$reID' LIMIT 1");
while($arow = $killingmylove->fetch_assoc()) {
    $aID = $arow["id"];
    $aName = $arow["name"];
    $aAlt = $arow["alternates"];
    $aImage = $arow["image"];
    $aDesc = $arow["description"];
    $aStatus = $arow["status"];
    if($aStatus==0) {
        $aStatus = "Announced";
    } elseif($aStatus==1) {
        $aStatus = "Airing";
    } elseif($aStatus==2) {
        $aStatus = "Hiatus";
    } elseif($aStatus==3) {
        $aStatus = "Completed";
    } else {
        $aStatus = "Unknown";
    }
    $aTime = $arow["timestamp"];
}

if(isset($aID)) {

    $demigod = $conn->query("SELECT * FROM `episodes` WHERE `aid`='$aID'");
    $antigott = $conn->query("SELECT * FROM `episodes` WHERE `aid`='$aID' AND `episode`='$reEP'");

    while($exrow = $antigott->fetch_assoc()) {
        $exEP = $exrow["episode"];
        $exPlayer = $exrow["source"];
        $exHost = $exrow["host"];
    }
    
    if(!empty($exEP)) {
    
?>

<title>Watch <?= $aName ?> Episode <?= $reEP ?> | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo "<a href='".$config["url"]."anime/$aID'>".$aName."</a>: Episode ".$reEP; ?></h3>
    </div>
    <div class="panel-body">
        <?php
        
        if($exHost=="mp4upload") { ?>
        <iframe id="media-video" scrolling="no" controls loop src="<?php echo $exPlayer; ?>" style="height:60vh;width:100%;" allowfullscreen frameborder="0"></iframe>
        <?php } elseif($exHost=="youtube") { ?>
        <iframe id="media-video" scrolling="no" controls loop src="<?php echo $exPlayer; ?>" style="height:60vh;width:100%;" allowfullscreen frameborder="0"></iframe>
        <?php } elseif($exHost=="streamtape") { ?>
        <iframe src="<?php echo $exPlayer; ?>" style="height:60vh;width:100%;" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
        <?php }

        ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Episode List</h3>
    </div>
    <div class="panel-body">
        <ul class="pagination">
            <?php
            while($erow = $demigod->fetch_assoc()) {
                echo '<li';
                if($reEP==$erow["episode"]) {
                    echo " class=\"active\"";
                }
                echo '><a href="'.$config["url"].'watch/'.$aID.'/'.$erow["episode"].'/
">Ep. '.$erow["episode"].'</a></li>';
            }
            ?>
        </ul>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Anime Info</h3>
    </div>
    <div class="panel-body">
        <div class="col-sm-3">
            <a href="<?php echo $config["url"]."anime/$aID"; ?>"><img src="<?php echo $config["url"]; ?>images/animes/<?php echo $aID.".".$aImage; ?>" width="100%"></a>
        </div>
        <div class="col-sm-9">
            <h3><a href="<?= $config["url"] ?>anime/<?= $aID ?>"><?php echo $aName; ?></a></h3>
        </div>
    </div>
</div>

<?php } else { ?>
<title>Error: Episode not found | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Error</h3>
    </div>
    <div class="panel-body">
        <h3 class="text-center">The Episode you are searching for doesn't exist (yet)...</h3>
        <center><img src="<?= $config["url"] ?>404.png" width="50%"></center>
    </div>
</div>
<?php };
} else { ?>
<title>Error: Anime not found | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Error</h3>
    </div>
    <div class="panel-body">
        <h3 class="text-center">The Anime you are searching for doesn't exist...</h3>
        <center><img src="<?= $config["url"] ?>404.png" width="50%"></center>
    </div>
</div>
<?php } ?>
