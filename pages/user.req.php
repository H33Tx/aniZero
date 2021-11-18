<?php

$reID = $_GET["id"];

if($uID==$reID) { ?>
<title>Profile of <?php echo $uName; echo " | "; echo $config["name"]; ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $uName; echo " <small>"; echo "UID: $uID"; echo "</small>"; ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-condensed ">
            <tr>
                <td width="150px" rowspan="10"><img src="<?php echo $config["url"]; echo "images/users/$uID.$uImage"; ?>" style="width:100%"></td>
            </tr>
            <tr>
                <th>Joined:</th>
                <td><?php echo $uJoin; ?></td>
            </tr>
            <tr>
                <th>Level:</th>
                <td><?php echo $uGroup; ?></td>
            </tr>
            <tr>
                <th>Uses Theme:</th>
                <td><?php if($uTheme==1) { echo "Light"; } else { echo "Dark"; } ?></td>
            </tr>
            <tr>
                <th>Gender:</th>
                <td><?php echo $uGender; ?></td>
            </tr>
            <?php if($uWatchlist=="0") { ?>
            <tr>
                <th>Watchlist:</th>
                <td><a href="<?php echo $config["url"]; ?>user/watchlist/<?php echo $uID; ?>">Here!</a> (Public, for everyone!)</td>
            </tr>
            <?php } else { ?>
            <tr>
                <th>Watchlist:</th>
                <td><a href="<?php echo $config["url"]; ?>user/watchlist/<?php echo $uID; ?>">Here!</a> (Private, only showing for yourself)</td>
            </tr>
            <?php } ?>
            <?php if(!empty($uWebsite)) { ?>
            <tr>
                <th>Website:</th>
                <td><?php echo "<a href='https://$uWebsite/' target='_blank'>www.$uWebsite</a>"; ?></td>
            </tr>
            <?php } ?>
            <?php if(!empty($uTwitter)) { ?>
            <tr>
                <th>Twitter:</th>
                <td><?php echo "<a href='https://twitter.com/$uTwitter' target='_blank'>@$uTwitter</a>"; ?></td>
            </tr>
            <?php } ?>
            <?php if(!empty($uFacebook)) { ?>
            <tr>
                <th>Facebook:</th>
                <td><?php echo "<a href='https://facebook.com/$uFacebook' target='_blank'>$uFacebook</a>"; ?></td>
            </tr>
            <?php } ?>
            <?php if(!empty($uInstagram)) { ?>
            <tr>
                <th>Instagram:</th>
                <td><?php echo "<a href='https://instagram.com/$uInstagram' target='_blank'>@$uInstagram</a>"; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php if(!empty($uAbout)) { ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">About Me</h3>
    </div>
    <div class="panel-body">
        <?php echo $uAbout; ?>
    </div>
</div>
<?php } ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Comments</h3>
    </div>
    <div class="panel-body">
        Soon™
    </div>
</div>

<?php }
else {
    
    $requestUser = $conn->query("SELECT * FROM `users` WHERE `id`='$reID' LIMIT 1");
    if ($requestUser->num_rows > 0) {
        while($uRow = $requestUser->fetch_assoc()) {
            $rPrivate = $uRow["private"];
            $rWatchlist = $uRow["watchlist"];
            $rName = $uRow["username"];
            $rEmail = $uRow["email"];
            $rGroup = $uRow["group"];
            if($rGroup==1) {
                $rGroup = "Administrator";
            } elseif($rGroup==2) {
                $rGroup = "Moderator";
            } else {
                $rGroup = "Member";
            }
            if(!empty($uRow["website"])) {
                $rWebsite = $uRow["website"];
            }
            if(!empty($uRow["gender"])) {
                $rGenderN = $uRow["gender"];
                if($rGenderN==1) {
                    $rGender = "Male";
                } elseif($rGenderN==2) {
                    $rGender = "Female";
                } elseif($rGenderN==3) {
                    $rGender = "Non-Binary";
                } else {
                    $rGender = "Other";
                }
            } else {
                $rGender = "Unknown";
            }
            if(!empty($uRow["twitter"])) {
                $rTwitter = $uRow["twitter"];
            }
            if(!empty($uRow["facebook"])) {
                $rFacebook = $uRow["facebook"];
            }
            if(!empty($uRow["instagram"])) {
                $rInstagram = $uRow["instagram"];
            }
            $rTheme = $uRow["theme"];
            $rImage = $uRow["image"];
            $rJoin = $uRow["create_datetime"];
            $rAbout = $uRow["about"];
        }
    }
              
?>
<title>Profile of <?php echo $rName; echo " | "; echo $config["name"]; ?></title>

<?php if($rPrivate==true) { ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $rName; echo " <small>"; echo "UID: $reID"; echo "</small>"; ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-condensed ">
            <tr>
                <td width="150px" rowspan="2"><img src="<?php echo $config["url"]; echo "images/users/$reID.$rImage"; ?>" style="width:100%"></td>
            </tr>
            <tr>
                <td>This Profile is not public!</td>
            </tr>
        </table>
    </div>
</div>

<?php
} else {
?>

<?php if(!isset($rName)) { ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Error</h3>
    </div>
    <div class="panel-body">
        The requested User-Profile could <b>NOT</b> be found!
    </div>
</div>

<?php } else { ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $rName; echo " <small>"; echo "UID: $reID"; echo "</small>"; ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-condensed ">
            <tr>
                <td width="150px" rowspan="10"><img src="<?php echo $config["url"]; echo "images/users/$reID.$rImage"; ?>" style="width:100%"></td>
            </tr>
            <tr>
                <th>Joined:</th>
                <td><?php echo $rJoin; ?></td>
            </tr>
            <tr>
                <th>Level:</th>
                <td><?php echo $rGroup; ?></td>
            </tr>
            <tr>
                <th>Uses Theme:</th>
                <td><?php if($rTheme==1) { echo "Light"; } else { echo "Dark"; } ?></td>
            </tr>
            <tr>
                <th>Gender:</th>
                <td><?php echo $rGender; ?></td>
            </tr>
            <?php if($rWatchlist=="0") { ?>
            <tr>
                <th>Watchlist:</th>
                <td><a href="<?php echo $config["url"]; ?>user/watchlist/<?php echo $reID; ?>">Here!</a> (Public)</td>
            </tr>
            <?php } ?>
            <?php if(!empty($rWebsite)) { ?>
            <tr>
                <th>Website:</th>
                <td><?php echo "<a href='https://$rWebsite/' target='_blank'>www.$rWebsite</a>"; ?></td>
            </tr>
            <?php } ?>
            <?php if(!empty($rTwitter)) { ?>
            <tr>
                <th>Twitter:</th>
                <td><?php echo "<a href='https://twitter.com/$rTwitter' target='_blank'>@$rTwitter</a>"; ?></td>
            </tr>
            <?php } ?>
            <?php if(!empty($rFacebook)) { ?>
            <tr>
                <th>Facebook:</th>
                <td><?php echo "<a href='https://facebook.com/$rFacebook' target='_blank'>$rFacebook</a>"; ?></td>
            </tr>
            <?php } ?>
            <?php if(!empty($rInstagram)) { ?>
            <tr>
                <th>Instagram:</th>
                <td><?php echo "<a href='https://instagram.com/$rInstagram' target='_blank'>@$rInstagram</a>"; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php if(!empty($rAbout)) { ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">About Me</h3>
    </div>
    <div class="panel-body">
        <?php echo $rAbout; ?>
    </div>
</div>
<?php } ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Comments</h3>
    </div>
    <div class="panel-body">
        Soon™
    </div>
</div>

<?php } } } ?>
