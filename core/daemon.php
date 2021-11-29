<?php

// Dismiss Announcement
if(isset($_POST["read-announce"])) {
    $antiheld = $conn->query("UPDATE `users` SET `read_announce`='1' WHERE `id`='$uID'");
}

// Editing Privacy
if(isset($_POST["edit-privacy"])) {
    $private = mysqli_real_escape_string($conn, $_POST["private"]);
    $watchlist = mysqli_real_escape_string($conn, $_POST["watchlist"]);
    $antiheld = $conn->query("UPDATE `users` SET `watchlist`='$watchlist', `private`='$private' WHERE `id`='$uID'");
    header("Refresh:0");
    echo '<div class="container"><div id="announcement" class="alert alert-success alert-dismissible text-center" role="alert"><strong>Success:</strong> Your Privacy settings have changed!</div></div>';
}

// Editing Appearance
if(isset($_POST["edit-appearance"])) {
    $theme = mysqli_real_escape_string($conn, $_POST["theme"]);
    $antiheld = $conn->query("UPDATE `users` SET `theme`='$theme' WHERE `id`='$uID'");
    header("Refresh:0");
    echo '<div class="container"><div id="announcement" class="alert alert-success alert-dismissible text-center" role="alert"><strong>Success:</strong> Your site appearance has changed!</div></div>';
}

// Editing Socials
if(isset($_POST["edit-socials"])) {
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    if(!empty($website)) {
        $antiheld = $conn->query("UPDATE `users` SET `website`='$website' WHERE `id`='$uID'");
    }
    $twitter = mysqli_real_escape_string($conn, $_POST['twitter']);
    if(!empty($twitter)) {
        $antiheld = $conn->query("UPDATE `users` SET `twitter`='$twitter' WHERE `id`='$uID'");
    }
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    if(!empty($facebook)) {
        $antiheld = $conn->query("UPDATE `users` SET `facebook`='$facebook' WHERE `id`='$uID'");
    }
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    if(!empty($instagram)) {
        $antiheld = $conn->query("UPDATE `users` SET `instagram`='$instagram' WHERE `id`='$uID'");
    }
    $about = mysqli_real_escape_string($conn, $_POST['about']);
    if(!empty($about)) {
        $antiheld = $conn->query("UPDATE `users` SET `about`='$about' WHERE `id`='$uID'");
    }
    header("Refresh:0");
    echo '<div class="container"><div id="announcement" class="alert alert-success alert-dismissible text-center" role="alert"><strong>Success:</strong> Your socials have been edited!</div></div>';
}

// Editing Password
if(isset($_POST["edit-password"])) {
    $old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
    $new_password1 = mysqli_real_escape_string($conn, $_POST['new_password1']);
    $new_password2 = mysqli_real_escape_string($conn, $_POST['new_password2']);
    $old_password2 = md5($old_password);
    $new_password = md5($new_password1);
    
    if($new_password1==$new_password2) {
        //New passwords matching
        $password_query = $conn->query("SELECT `password` FROM `users` WHERE `password`='$old_password2' AND `id`='$uID' LIMIT 1");
        if(mysqli_num_rows($password_query)==1) { //Old passwords matching?
            // Old passwords matching!!
            $password_change_query = $conn->query("UPDATE `users` SET `password`='$new_password' WHERE `password`='$old_password2' AND `id`='$uID'");
            header("Refresh:0");
            echo '<div class="container"><div id="announcement" class="alert alert-success alert-dismissible text-center" role="alert"><strong>Success:</strong> Your Password has been changed!</div></div>';
        } else {
            // Don't match :/
            echo '<div class="container"><div id="announcement" class="alert alert-danger alert-dismissible text-center" role="alert"><strong>Error:</strong> Your actual Old Password doesn\'t match with the old password entered! If you forgot your password, please contact '.$config["email"].'</div></div>';
        }
    } else {
        echo '<div class="container"><div id="announcement" class="alert alert-danger alert-dismissible text-center" role="alert"><strong>Error:</strong> The passwords entered don\'t match!</div></div>';
    }
    
}

// Editing Profile
if(isset($_POST["edit-profile"])) {
    //$username = mysqli_real_escape_string($conn, $_POST['username']);
    //$email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    //$avatar = mysqli_real_escape_string($conn, $_POST['avatar']);
    
    //$result = $conn->query("UPDATE `users` SET `username`='$username', `email`='$email', `gender`='$gender', `avatar`='$avatar'");
    $result = $conn->query("UPDATE `users` SET `gender`='$gender' WHERE `id`='$uID' LIMIT 1");
    //echo "<script type='text/javascript'>window.location.reload(false)</script>";
    header("Refresh:0");
    echo '<div class="container"><div id="announcement" class="alert alert-success alert-dismissible text-center" role="alert"><strong>Success:</strong> Your Profile has been updated!</div></div>';
}

// User-Registration
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    // Checking if user already exists
    $user_check_query = "SELECT * FROM `users` WHERE `username`='$username' OR `email`='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if already exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already taken!");
        }
        if ($user['email'] === $email) {
            array_push($errors, "Email already used!");
        }
    }

    // Register User, if everything fine
    if (count($errors) == 0) {
        $password = md5($password_1); //Encrypting password
        
        $hella = $conn->query("SELECT `id` FROM `users` ORDER BY `id` DESC LIMIT 1");
        if($row = mysqli_fetch_assoc($hella)) {
            $latestID = $row['id'];
        }
        $latestID++;
        
        $source = 'images/users/0.jpg'; 
        $destination = 'images/users/'.$latestID.'.jpg'; 
        
        if(!copy($source, $destination)) { 
            echo "File couldn't be copied! \n"; 
        } 
        else { 
            echo "File has been copied! \n"; 
        }
        
        $date = date('Y-m-d H:i:s');

        $query = "INSERT INTO `users` (`id`, `private`, `username`, `email`, `password`, `group`, `create_datetime`, `theme`, `image`, `website`, `gender`, `twitter`, `facebook`, `instagram`, `watchlist`, `about`, `read_announce`) VALUES (NULL, '0','$username', '$email', '$password', '3', '$date', '1', 'jpg', NULL, NULL, NULL, NULL, NULL, '1', NULL, '0')";
        mysqli_query($conn, $query);
        header('location: /login');
    }
}

// User-Login
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        setcookie("loggedincookie", $username, time()+(86400*30), "/");
        header('location: /home');
    }
}

?>
