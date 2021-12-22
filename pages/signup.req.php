<meta property="og:title" content="Signing up your Account at <?= $config["name"] ?>!">
<meta property="og:description" content="Become part of the superior Anime-Website. Today. Free. Forever.">
<meta property="og:image" content="<?php echo $config["url"]; ?>sup.png">
<title>Register | <?php echo $config["name"]; ?></title>
<?php if($config["registration"]=="1") { ?>
<?php if(!isset($_SESSION["username"])) { ?>
<div style="margin: 0 auto; width: 300px" id="signup_container">
    <form method="post" id="signup_form" name="reg_user">
        <h1 class="text-center">Register</h1>
        <hr>

        <div class="form-group">
            <label for="reg_username" class="sr-only">Username</label>
            <input data-toggle="popover" data-content="Alphanumeric characters only." type="text" name="username" id="reg_username" class="form-control" placeholder="Username" required>
        </div>

        <div class="form-group">
            <label for="reg_pass1" class="sr-only">Password</label>
            <input data-toggle="popover" data-content="Minimum length: 8 characters." type="password" name="password_1" id="reg_pass1" class="form-control" placeholder="Password" required>
        </div>

        <div class="form-group">
            <label for="reg_pass2" class="sr-only">Confirm Password</label>
            <input data-toggle="popover" data-content="Type your password again." type="password" name="password_2" id="password_2" class="form-control" placeholder="Password (again)" required>
        </div>

        <div class="form-group">
            <label for="reg_email1" class="sr-only">Email Address</label>
            <input data-toggle="popover" data-content="Valid email required for activation." type="email" name="email" id="reg_email1" class="form-control" placeholder="Email Address" required>
        </div>

        <button class="btn btn-lg btn-success btn-block" type="submit" name="reg_user" id="signup_button">Register</button>
        <hr>
        <p>Already have an account? <a href="/login">Login!</a></p>

    </form>
</div>
<?php } else {
    header("location: /home");
} ?>
<?php } else { ?>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">Error</h3>
    </div>
    <div class="panel-body">
        Registrations are currently disabled!
    </div>
</div>
<?php } ?>
