<!DOCTYPE html>

<?php

session_start();

if(!isset($_GET["page"])) {
    //$home = $config["home"];
    //header("location: /$home");
    $rPage = "home";
    header("location: /home");
} else {
    $rPage = $_GET["page"];
}

require("config.inc.php");
require_once("core/conn.php");
require_once("core/daemon.php");

if($rPage=="logout") {
    session_destroy();
    session_unset();
    setcookie("loggedincookie", "", time() - 3600);
    header("location: /home");
}

// Collect unhashed IPs? Recommended setting: false
$user_ip = $_SERVER['REMOTE_ADDR'];
if($config["cleanip"]=="true") {
    $check_user = $conn->query("SELECT `ip` FROM `DO_NOT_LEAK_OR_SHARE_UNDER_ANY_CIRCUMSTANCES` WHERE `ip`='$user_ip'");
    if(mysqli_num_rows($check_user)>=1) {

    } else {
        $insertuser = $conn->query("INSERT INTO `DO_NOT_LEAK_OR_SHARE_UNDER_ANY_CIRCUMSTANCES`(`ip`) VALUES('$user_ip')");
    }
}

$barNone = array("login","signup","changelog");
$barMain = array("animes","newest","schedule","settings","user");
$barAnime = array("anime","watch");
$barAdmin = array("admin");
$barMod = array("mod");
$barWatchlist = array("watchlist","follows");

include("pages/header.req.php");

?>

<body>

    <?php include("pages/navbar.req.php"); ?>

    <div class="container">

        <?php if($ignoreAnnounce=="0") : ?>
        <div id="announcement" class="alert alert-danger alert-dismissible text-center" role="alert">
            <?php if($ableToDissmis=="1") { ?>
            <form method="post" action="index.php" name="read-announce">
                <input id="read_announcement_button" type="submit" class="close" aria-label="Close" value="&times;" name="read-announce">
            </form>
            <?php } ?>
            <strong>Notice:</strong> The software that powers this site is still in development, please check the <a href="https://github.com/H33Tx/aniZero" target="_blank">GitHub</a> for updates!
        </div>
        <?php endif; ?>

        <?php if(!isset($_SESSION["username"]) && ($rPage=="home" || $rPage=="anime" || $rPage=="latest" || $rPage=="hot")) : ?>
        <div id="announcement" class="alert alert-success alert-dismissible text-center" role="alert">
            <strong>Notice:</strong> <a href="https://discord.gg/gFux2eazGp" target="_blank"><a href="<?php echo $config["url"]; ?>login">Login</a> or <a href="<?php echo $config["url"]; ?>signup">Register</a> to get full functions of <?php echo $config["name"]; ?>!</a>
        </div>
        <?php endif; ?>

        <div class="row">

            <?php if(in_array($rPage, $barNone)) { ?>

            <div class="col-sm-12">

                <?php include("pages/$rPage.req.php"); ?>

            </div>

            <?php } else { ?>

            <div class="col-sm-9">

                <?php include("pages/$rPage.req.php"); ?>

            </div>

            <div class="col-sm-3">

                <?php
                
                if(in_array($rPage, $barMain)) {
                    include("sides/main.bar.php");
                } elseif($rPage=="anime") {
                    include("sides/anime.bar.php");
                } elseif($rPage=="watch") {
                    include("sides/bookmark.bar.php");
                } elseif(in_array($rPage, $barWatchlist)) {
                    include("sides/watchlist.bar.php");
                } elseif(in_array($rPage, $barAdmin)) {
                    include("sides/admin.bar.php");
                } elseif($rPage=="home") {
                    include("sides/home.bar.php");
                }
                
                ?>

            </div>

            <?php } ?>

        </div>

    </div>

    <?php include("pages/footer.req.php"); ?>

</body>
