<meta property="og:title" content="Account Settings of your <?= $config["name"] ?> Account.">
<meta property="og:description" content="Switch between Themes, add your socials and manage much more! Gain superiority with an <?= $config["name"] ?> Account today.">
<meta property="og:image" content="<?php echo $config["url"]; ?>sup.png">
<?php

if(!isset($_SESSION["username"])) {
    header("location: /home");
}

?>

<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px">
    <li role="presentation" class="active"><a href="#change_profile" aria-controls="messages" role="tab" data-toggle="tab">Edit Profile</a></li>
    <li role="presentation"><a href="#change_password" aria-controls="profile" role="tab" data-toggle="tab">Edit Password</a></li>
    <li role="presentation"><a href="#upload_settings" aria-controls="settings" role="tab" data-toggle="tab">Edit Socials</a></li>
    <li role="presentation"><a href="#reader_settings" aria-controls="reader" role="tab" data-toggle="tab">Edit Site Appearance</a></li>
    <li role="presentation"><a href="#filter_settings" aria-controls="filter" role="tab" data-toggle="tab">Edit Privacy</a></li>
</ul>

<div class="tab-content">

    <?php include("pages/settings/profile.set.php"); ?>

    <?php include("pages/settings/password.set.php"); ?>

    <?php include("pages/settings/socials.set.php"); ?>

    <?php include("pages/settings/appearance.set.php"); ?>

    <?php include("pages/settings/privacy.set.php"); ?>

</div>
