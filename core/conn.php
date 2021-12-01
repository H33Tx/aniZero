<?php

$conn = new mysqli($slave["host"], $slave["user"], $slave["pass"], $slave["tale"]);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$fullUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=== 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

if(!empty($_COOKIE["loggedincookie"])) {
    // Checking for any cookies lying around there to eat... or login.
    $_SESSION["username"] = $_COOKIE["loggedincookie"];
}

if(isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $result = $conn->query("SELECT * FROM `users` WHERE `username`='$username' LIMIT 1");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $uPrivate = $row["private"];
            $uWatchlist = $row["watchlist"];
            $uID = $row["id"];
            $uName = $row["username"];
            $uEmail = $row["email"];
            $uGroup = $row["group"];
            $ignoreAnnounce = $row["read_announce"];
            $ableToDissmis = "1";
            if($uGroup==1) {
                $uGroup = "Administrator";
            } elseif($uGroup==2) {
                $uGroup = "Moderator";
            } else {
                $uGroup = "Member";
            }
            if(!empty($row["website"])) {
                $uWebsite = $row["website"];
            }
            if(!empty($row["gender"])) {
                $uGenderN = $row["gender"];
                if($uGenderN==1) {
                    $uGender = "Male";
                } elseif($uGenderN==2) {
                    $uGender = "Female";
                } elseif($uGenderN==3) {
                    $uGender = "Non-Binary";
                } else {
                    $uGender = "Other";
                }
            } else {
                $uGender = "Unknown";
            }
            if(!empty($row["twitter"])) {
                $uTwitter = $row["twitter"];
            }
            if(!empty($row["facebook"])) {
                $uFacebook = $row["facebook"];
            }
            if(!empty($row["instagram"])) {
                $uInstagram = $row["instagram"];
            }
            $uTheme = $row["theme"];
            $uImage = $row["image"];
            $uJoin = $row["create_datetime"];
            $uAbout = $row["about"];
        }
    }
} else {
    $uID = "0";
    $uName = "Guest";
    $uTheme = "1";
    $ableToDissmis = "0";
    $ignoreAnnounce = "0";
    $uGroup = "Guest";
}

?>
