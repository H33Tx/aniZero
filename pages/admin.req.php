<?php

if(!isset($_GET["action"])) {
    $admin_action = "default";
} else {
    $admin_action = $_GET["action"];
}

?>

<?php if($uGroup=="Administrator") { ?>
<meta property="og:title" content="Shh... Administration-Panel. Not 4 u, only for <?= $config["name"] ?> :^)">
<meta property="og:description" content="You discovered the page, where all the Legends are made, unfortunate, it's not public >_<">
<meta property="og:image" content="<?php echo $config["url"]; ?>404.png">
<?php include("pages/admin/$admin_action.adm.php"); ?>

<?php } else { ?>
<meta property="og:title" content="Shh... Administration-Panel. Not 4 u, only for <?= $config["name"] ?> :^)">
<meta property="og:description" content="You discovered the page, where all the Legends are made, unfortunate, it's not public >_<">
<meta property="og:image" content="<?php echo $config["url"]; ?>404.png">
<title>Error @ Admin-Panel | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Error: Missing Permissions</h3>
    </div>
    <div class="panel-body">
        You aren't allowed to view this!
    </div>
</div>
<?php } ?>
