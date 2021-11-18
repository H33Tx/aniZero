<?php

$reID = $_GET["from"];
if(isset($_GET["after"])) {
    $sStatus = $_GET["after"];
} else {
    $sStatus = "all";
}

//PAGINATION PREPS STARTING
if($sStatus=="planned") {
    $reality = "SELECT COUNT(*) FROM `bookmarks` WHERE `uid`='$reID' AND `status`=0";
    $rooting = "SELECT * FROM `bookmarks` WHERE `uid`='$reID' AND `status`=0 LIMIT ?,?";
    $dreamer = "SELECT * FROM `bookmarks` WHERE `uid`='$reID' AND `status`=0";
} elseif($sStatus=="watching") {
    $reality = "SELECT COUNT(*) FROM `bookmarks` WHERE `uid`='$reID' AND `status`=1";
    $rooting = "SELECT * FROM `bookmarks` WHERE `uid`='$reID' AND `status`=1 LIMIT ?,?";
    $dreamer = "SELECT * FROM `bookmarks` WHERE `uid`='$reID' AND `status`=1";
} elseif($sStatus=="paused") {
    $reality = "SELECT COUNT(*) FROM `bookmarks` WHERE `uid`='$reID' AND `status`=2";
    $rooting = "SELECT * FROM `bookmarks` WHERE `uid`='$reID' AND `status`=2 LIMIT ?,?";
    $dreamer = "SELECT * FROM `bookmarks` WHERE `uid`='$reID' AND `status`=2";
} elseif($sStatus=="completed") {
    $reality = "SELECT COUNT(*) FROM `bookmarks` WHERE `uid`='$reID' AND `status`=3";
    $rooting = "SELECT * FROM `bookmarks` WHERE `uid`='$reID' AND `status`=3 LIMIT ?,?";
    $dreamer = "SELECT * FROM `bookmarks` WHERE `uid`='$reID' AND `status`=3";
} elseif($sStatus=="dropped") {
    $reality = "SELECT COUNT(*) FROM `bookmarks` WHERE `uid`='$reID' AND `status`=4";
    $rooting = "SELECT * FROM `bookmarks` WHERE `uid`='$reID' AND `status`=4 LIMIT ?,?";
    $dreamer = "SELECT * FROM `bookmarks` WHERE `uid`='$reID' AND `status`=4";
} else {
    $reality = "SELECT COUNT(*) FROM `bookmarks` WHERE `uid`='$reID'";
    $rooting = "SELECT * FROM `bookmarks` WHERE `uid`='$reID' LIMIT ?,?";
    $dreamer = "SELECT * FROM `bookmarks` WHERE `uid`='$reID'";
}

$total_pages = $conn->query($reality)->fetch_row()[0];

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$pagination = isset($_GET['pagination']) && is_numeric($_GET['pagination']) ? $_GET['pagination'] : 1;

if(isset($_GET["after"])) {
    $whatif = $_GET["after"];
} else {
    $whatif = "all";
}

// Number of results to show on each page.
$num_results_on_page = 5;

if ($stmt = $conn->prepare($rooting)) {
	// Calculate the page to get the results we need from our table.
	$calc_page = ($pagination - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	// Get the results...
	$dreamingindigital = $stmt->get_result();
	$stmt->close();
}

//PAGINATION PREPS DONE

$dreamingindigital2 = $conn->query($dreamer);
if($dreamingindigital2->num_rows > 0) {
    while($rRow = $dreamingindigital2->fetch_assoc()) {
        $qwerty = $conn->query("SELECT `username` FROM `users` WHERE `id`='$reID' LIMIT 1");
        if($qwerty->num_rows > 0) {
            while($qRow = $qwerty->fetch_assoc()) {
                $rName = $qRow["username"];
            }
        }
    }
}

?>
<title><?php echo $rName ?>'s Watchlist | <?php echo $config["name"]; ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo "<a href='".$config["url"]."user/1/$rName'>"; echo $rName."</a>"; ?>'s Watchlist <small>(Spoiler: It's LIT!)</small></h3>
    </div>
    <div class="panel-body">

        <?php

        if ($dreamingindigital2->num_rows > 0) {
                 
                 if (ceil($total_pages / $num_results_on_page) > 0): ?>
        <center>
            <ul class="pagination">
                <?php if ($pagination > 1): ?>
                <li class="prev"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination-1; echo "/".$whatif; ?>"><i class="bi bi-chevron-left"></i></a></li>
                <?php endif; ?>

                <?php if ($pagination > 3): ?>
                <li class="start"><a href="1">1</a></li>
                <li class="dots"></li>
                <?php endif; ?>

                <?php if ($pagination-2 > 0): ?><li class="page"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination-2; echo "/".$whatif; ?>"><?php echo $pagination-2 ?></a></li><?php endif; ?>
                <?php if ($pagination-1 > 0): ?><li class="page"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination-1; echo "/".$whatif; ?>"><?php echo $pagination-1 ?></a></li><?php endif; ?>

                <li class="currentpage"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination; echo "/".$whatif; ?>"><?php echo $pagination ?></a></li>

                <?php if ($pagination+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination+1; echo "/".$whatif; ?>"><?php echo $pagination+1 ?></a></li><?php endif; ?>
                <?php if ($pagination+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination+2; echo "/".$whatif; ?>"><?php echo $pagination+2 ?></a></li><?php endif; ?>

                <?php if ($pagination < ceil($total_pages / $num_results_on_page)-2): ?>
                <li class="dots"></li>
                <li class="end"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo ceil($total_pages / $num_results_on_page); echo "/".$whatif; ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                <?php endif; ?>

                <?php if ($pagination < ceil($total_pages / $num_results_on_page)): ?>
                <li class="next"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination+1; echo "/".$whatif; ?>"><i class="bi bi-chevron-right"></i></a></li>
                <?php endif; ?>
            </ul>
        </center>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Anime</th>
                        <th>Status</th>
                        <th class="text-left"><span class="nav-label-992">Episode</span></th>
                        <th class="text-right">Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            while($wRow = $dreamingindigital->fetch_assoc()) :
                    $animeID = $wRow["aid"];
                    $animehaven = $conn->query("SELECT * FROM `anime` WHERE `id`='$animeID'");
                    if ($animehaven->num_rows > 0) {
                        while($aRow = $animehaven->fetch_assoc()) {
                            $animeNAME = $aRow["name"];
                        }
                    } else {
                        $animeNAME = "Uh oh, Anime doesn't exist?";
                    }
                    ?>
                    <tr>
                        <th><?php echo "<a href='".$config["url"]."anime/$animeID'>$animeNAME</a>"; ?></th>
                        <th>Watching</th>
                        <th><span class="nav-label-992"><a href="<?php echo $config["url"]; ?>anime/<?php echo $animeID; ?>/<?php echo $wRow["ep"]; ?>">Episode <?php echo $wRow["ep"]; ?></a></span></th>
                        <th class="text-right"><?php echo $wRow["timestamp"]; ?></th>
                    </tr>
                    <?php
            
            endwhile; ?>
                </tbody>
            </table>
        </div>

        <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
        <center>
            <ul class="pagination">
                <?php if ($pagination > 1): ?>
                <li class="prev"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination-1; echo "/".$whatif; ?>"><i class="bi bi-chevron-left"></i></a></li>
                <?php endif; ?>

                <?php if ($pagination > 3): ?>
                <li class="start"><a href="1">1</a></li>
                <li class="dots"></li>
                <?php endif; ?>

                <?php if ($pagination-2 > 0): ?><li class="page"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination-2; echo "/".$whatif; ?>"><?php echo $pagination-2 ?></a></li><?php endif; ?>
                <?php if ($pagination-1 > 0): ?><li class="page"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination-1; echo "/".$whatif; ?>"><?php echo $pagination-1 ?></a></li><?php endif; ?>

                <li class="currentpage"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination; echo "/".$whatif; ?>"><?php echo $pagination ?></a></li>

                <?php if ($pagination+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination+1; echo "/".$whatif; ?>"><?php echo $pagination+1 ?></a></li><?php endif; ?>
                <?php if ($pagination+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination+2; echo "/".$whatif; ?>"><?php echo $pagination+2 ?></a></li><?php endif; ?>

                <?php if ($pagination < ceil($total_pages / $num_results_on_page)-2): ?>
                <li class="dots"></li>
                <li class="end"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo ceil($total_pages / $num_results_on_page); echo "/".$whatif; ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                <?php endif; ?>

                <?php if ($pagination < ceil($total_pages / $num_results_on_page)): ?>
                <li class="next"><a href="<?php echo $config["url"]; echo "user/watchlist/$reID/"; echo $pagination+1; echo "/".$whatif; ?>"><i class="bi bi-chevron-right"></i></a></li>
                <?php endif; ?>
            </ul>
        </center>
        <?php endif; 
        } else {
            echo "You didn't bookmark anything yet :(";
        }?>
    </div>
</div>

<?php  ?>
