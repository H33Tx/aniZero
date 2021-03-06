<?php

if(isset($_POST["delete_anime_disc"])) {
    $anime = mysqli_real_escape_string($conn, $_POST["anime"]);
}

if(isset($_POST["delete_anime_conf"])) {
    $anime = mysqli_real_escape_string($conn, $_POST["anime"]);
    $conn->query("DELETE FROM `anime` WHERE `id`='$anime' LIMIT 1");
    $conn->query("DELETE FROM `episodes` WHERE `aid`='$anime'");
    $nextA = $conn->query("SELECT `id` FROM `anime` ORDER BY `id` DESC LIMIT 1");
    $nextA = mysqli_fetch_assoc($nextA);
    $nextA = $nextA["id"];
    $nextA++;
    $conn->query("ALTER TABLE `anime` AUTO_INCREMENT=$nextA;");
    
    header("location: ".$config["url"]."system/admin/");
}

if(isset($_POST["edit_anime"])) {
    $anime_id = mysqli_real_escape_string($conn, $_POST["anime_id"]);
    $anime_name = strip_tags(mysqli_real_escape_string($conn, $_POST["anime_name"]));
    $anime_alternates = strip_tags(mysqli_real_escape_string($conn, $_POST["anime_alternates"]));
    $anime_desc = mysqli_real_escape_string($conn, $_POST["anime_desc"]);
    $anime_status = mysqli_real_escape_string($conn, $_POST["anime_status"]);
    
    $conn->query("UPDATE `anime` SET `name`='$anime_name', `alternates`='$anime_alternates', `description`='$anime_desc', `status`='$anime_status' WHERE `id`='$anime_id' LIMIT 1");
    
    header("location: ".$config["url"]."anime/$anime_id");
}

if(isset($_POST["delete_anime_link"])) {
    $aid = mysqli_real_escape_string($conn, $_POST["anime_id"]);
    //echo $config["url"]."system/admin/delete_anime/$aid/";
    header("location: ".$config["url"]."system/admin/delete_anime/$aid/");
}

if(isset($_POST["add_episode"])) {
    $anime_id = mysqli_real_escape_string($conn, $_POST["anime_id"]);
    $anime_episode = mysqli_real_escape_string($conn, $_POST["anime_episode"]);
    $anime_type = mysqli_real_escape_string($conn, $_POST["anime_type"]);
    $anime_host = mysqli_real_escape_string($conn, $_POST["anime_host"]);
    //if($anime_host=="1") {
        // External Source
        $anime_service = mysqli_real_escape_string($conn, $_POST["external_service"]);
        $anime_url = mysqli_real_escape_string($conn, $_POST["external_url"]);
    //} else {
        // Internal Source - Soon to come (if smbdy knows how to do it)
    //}
    
    // Need to implement a check if episode already exists (someday)
    $conn->query("INSERT INTO `episodes`(`aid`,`sub`,`episode`,`source`,`host`) VALUES('$anime_id','$anime_type','$anime_episode','$anime_url','$anime_service')");
    
    header("location: ".$config["url"]."system/admin/add_episode/$anime_id/$anime_episode/$anime_type/$anime_host/$anime_service");
}

// Delete Schedule Entry
if(isset($_POST["delete_schedule"])) {
    $schedule = mysqli_real_escape_string($conn, $_POST["schedule_id"]);
    
    $conn->query("DELETE FROM `schedule` WHERE `id`='$schedule' LIMIT 1");
        
    header("location: ".$config["url"]."system/admin/schedule");
}

// Edit Schedule Entry
if(isset($_POST["edit_schedule"])) {
    $schedule = mysqli_real_escape_string($conn, $_POST["schedule_id"]);
    $anime = mysqli_real_escape_string($conn, $_POST["schedule_anime"]);
    $day = mysqli_real_escape_string($conn, $_POST["schedule_day"]);
    $time = mysqli_real_escape_string($conn, $_POST["schedule_time"]);
    
    $conn->query("UPDATE `schedule` SET `aid`='$anime', `day`='$day', `time`='$time' WHERE `id`='$schedule'");
        
    header("location: ".$config["url"]."system/admin/schedule");
}

// Add Anime to Schedule
if(isset($_POST["add_schedule"])) {
    $anime = mysqli_real_escape_string($conn, $_POST["anime_id"]);
    $day = mysqli_real_escape_string($conn, $_POST["anime_day"]);
    $time = mysqli_real_escape_string($conn, $_POST["anime_time"]);
    
    $conn->query("INSERT INTO `schedule`(`aid`, `day`, `time`) VALUES('$anime','$day','$time')");
    
    header("location: ".$config["url"]."system/admin/schedule");
}

// Save Admin Advanced Settings
if(isset($_POST["edit_settings_advanced"])) {
    $store_cleanip = mysqli_real_escape_string($conn, $_POST["store_cleanip"]);
    
    $conn->query("UPDATE `settings` SET `cleanip`='$store_cleanip' WHERE `id`='1'");
    header("location: ".$config["url"]."system/admin/general_settings");
}

// Save Admin Contact Settings
if(isset($_POST["edit_settings_contact"])) {
    $webmaster_email = strip_tags(mysqli_real_escape_string($conn, $_POST["webmaster_email"]));
    
    $conn->query("UPDATE `settings` SET `email`='$webmaster_email' WHERE `id`='1'");
    header("location: ".$config["url"]."system/admin/general_settings");
}

// Save Admin Registrations Settings
if(isset($_POST["edit_settings_registration"])) {
    $registration_enabled = mysqli_real_escape_string($conn, $_POST["registration_enabled"]);
    
    $conn->query("UPDATE `settings` SET `registration`='$registration_enabled' WHERE `id`='1'");
    header("location: ".$config["url"]."system/admin/general_settings");
}

// Save Admin Layout Settings
if(isset($_POST["edit_settings_layout"])) {
    $site_theme = mysqli_real_escape_string($conn, $_POST["site_theme"]);
    
    $conn->query("UPDATE `settings` SET `theme`='$site_theme' WHERE `id`='1'");
    header("location: ".$config["url"]."system/admin/general_settings");
}

// Save Admin General Settings
if(isset($_POST["edit_settings_default"])) {
    $site_name = strip_tags(mysqli_real_escape_string($conn, $_POST["site_name"]));
    $site_url = strip_tags(mysqli_real_escape_string($conn, $_POST["site_url"]));
    $site_descr = strip_tags(mysqli_real_escape_string($conn, $_POST["site_descr"]));
    $site_logo = strip_tags(mysqli_real_escape_string($conn, $_POST["site_logo"]));
    
    $conn->query("UPDATE `settings` SET `name`='$site_name', `url`='$site_url', `descr`='$site_descr', `logo`='$site_logo' WHERE `id`='1'");
    header("location: ".$config["url"]."system/admin/general_settings");
}

// Add Anime
if(isset($_POST["add_anime"])) {
    $image = mysqli_real_escape_string($conn, $_POST["anime_image"]);
    $name = strip_tags(mysqli_real_escape_string($conn, $_POST["anime_name"]));
    $alternates = strip_tags(mysqli_real_escape_string($conn, $_POST["anime_alternates"]));
    $status = mysqli_real_escape_string($conn, $_POST["anime_status"]);
    $description = mysqli_real_escape_string($conn, $_POST["anime_description"]);
    
    $conn->query("INSERT INTO `anime`(`name`, `alternates`, `image`, `description`, `status`) VALUES ('$name','$alternates','$image','$description','$status')");
    header("location: ".$config["url"]."system/admin/browse_animes/1");
}

// Remove Bookmark
if(isset($_POST["remove_bookmark"])) {
    $anime = mysqli_real_escape_string($conn, $_POST["anime"]);
    $user = mysqli_real_escape_string($conn, $_POST["user"]);
    
    $conn->query("DELETE FROM `bookmarks` WHERE `uid`='$user' AND `aid`='$anime'");
}

// Update Bookmark
if(isset($_POST["update_bookmark"])) {
    $anime = mysqli_real_escape_string($conn, $_POST["anime"]);
    $episode = mysqli_real_escape_string($conn, $_POST["episode"]);
    $user = mysqli_real_escape_string($conn, $_POST["user"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    
    $conn->query("UPDATE `bookmarks` SET `status`='$status', `ep`='$episode' WHERE `uid`='$user' AND `aid`='$anime' LIMIT 1");
    header("location: ".$config["url"]."watch/$anime/$episode");
}

// Bookmark Anime
if(isset($_POST["add_bookmark"])) {
    $anime = mysqli_real_escape_string($conn, $_POST["anime"]);
    $episode = mysqli_real_escape_string($conn, $_POST["episode"]);
    $user = mysqli_real_escape_string($conn, $_POST["user"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    
    $conn->query("INSERT INTO `bookmarks`(`uid`, `aid`, `ep`, `status`) VALUES('$user','$anime','$episode','$status')");
    header("location:".$config["url"]."watch/$anime/$episode");
}

// Dismiss Announcement
if(isset($_POST["read-announce"])) {
    $antiheld = $conn->query("UPDATE `users` SET `read_announce`='1' WHERE `id`='$uID'");
}

// Editing Privacy
if(isset($_POST["edit-privacy"])) {
    $private = mysqli_real_escape_string($conn, $_POST["private"]);
    $watchlist = mysqli_real_escape_string($conn, $_POST["watchlist"]);
    $antiheld = $conn->query("UPDATE `users` SET `watchlist`='$watchlist', `private`='$private' WHERE `id`='$uID'");
    header("location:".$config["url"]."user/settings/");
}

// Editing Appearance
if(isset($_POST["edit-appearance"])) {
    $theme = mysqli_real_escape_string($conn, $_POST["theme"]);
    $antiheld = $conn->query("UPDATE `users` SET `theme`='$theme' WHERE `id`='$uID'");
    header("location:".$config["url"]."user/settings/");
}

// Editing Socials
if(isset($_POST["edit-socials"])) {
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    if(!empty($website)) {
        $website = strip_tags(mysqli_real_escape_string($conn, $_POST["website"]));
        $antiheld = $conn->query("UPDATE `users` SET `website`='$website' WHERE `id`='$uID'");
    }
    $twitter = mysqli_real_escape_string($conn, $_POST['twitter']);
    if(!empty($twitter)) {
        $twitter = strip_tags(mysqli_real_escape_string($conn, $_POST["twitter"]));
        $antiheld = $conn->query("UPDATE `users` SET `twitter`='$twitter' WHERE `id`='$uID'");
    }
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    if(!empty($facebook)) {
        $facebook = strip_tags(mysqli_real_escape_string($conn, $_POST["facebook"]));
        $antiheld = $conn->query("UPDATE `users` SET `facebook`='$facebook' WHERE `id`='$uID'");
    }
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    if(!empty($instagram)) {
        $instagram = strip_tags(mysqli_real_escape_string($conn, $_POST["instagram"]));
        $antiheld = $conn->query("UPDATE `users` SET `instagram`='$instagram' WHERE `id`='$uID'");
    }
    $about = mysqli_real_escape_string($conn, $_POST['about']);
    if(!empty($about)) {
        $about = strip_tags(mysqli_real_escape_string($conn, $_POST["about"]));
        $antiheld = $conn->query("UPDATE `users` SET `about`='$about' WHERE `id`='$uID'");
    }
    header("location:".$config["url"]."user/settings/");
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
            session_destroy();
            session_unset();
            header("location:".$config["url"]."login/");
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
    header("location:".$config["url"]."user/settings/");
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

/* FUNCTIONS */

function glyph($typeX) {
    return "<span class='glyphicon glyphicon-$typeX'></span>";
}

?>
