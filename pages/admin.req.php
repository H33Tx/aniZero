<?php

if(!isset($_GET["action"])) {
    $admin_action = "default";
} else {
    $admin_action = $_GET[action];
}

?>

<?php if($uGroup=="Administrator") { ?>

<?php include("pages/admin/$admin_action.adm.php"); ?>

<?php } else {
    echo "You aren't allowed to view this!";
} ?>
