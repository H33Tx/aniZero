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

        // Anime exists, episode too, add Pageview +1

        $user_ip_hash = md5($user_ip);

        $check_ip = $conn->query("SELECT `ip` FROM `anime_views` WHERE `aid`='$aID' AND `ip`='$user_ip_hash'");
        if(mysqli_num_rows($check_ip)>=1) {

        } else {
            $insertview = $conn->query("INSERT INTO `anime_views`(`aid`, `ip`) VALUES('$aID','$user_ip_hash')");
            //$updateview = mysql_query("UPDATE `anime_views` SET totalvisit = totalvisit+1 where page=''");
        }
    
?>

<title>Watch <?= $aName ?> Episode <?= $reEP ?> | <?= $config["name"] ?></title>
<style>
    .vid-container {
        position: relative;
        width: 100%;
        overflow: hidden;
        padding-top: 56.25%;
        /* 16:9 Aspect Ratio */
    }


    .media-video {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
        border: none;
    }

</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo "<a href='".$config["url"]."anime/$aID'>".$aName."</a>: Episode ".$reEP; ?></h3>
    </div>
    <div class="panel-body">
        <div class="vid-container">
            <iframe class="media-video" scrolling="no" controls allowtransparency allow="autoplay" scrolling="no" loop src="<?php echo $exPlayer; ?>" allowfullscreen frameborder="0"></iframe>
        </div>
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
