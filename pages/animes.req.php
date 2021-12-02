<?php

// Get the total number of records from our table "students".
$total_pages = $conn->query('SELECT COUNT(*) FROM `anime`')->fetch_row()[0];

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['pagination']) && is_numeric($_GET['pagination']) ? $_GET['pagination'] : 1;

// Number of results to show on each page.
$num_results_on_page = 25;

if ($stmt = $conn->prepare('SELECT * FROM `anime` ORDER BY `id` ASC LIMIT ?,?')) {
	// Calculate the page to get the results we need from our table.
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	// Get the results...
	$result = $stmt->get_result();
	$stmt->close();
}

?>
<title>Animes - Page <?= $page ?> | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Animes - Page <?= $page ?></h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Anime</th>
                        <th width="10%" class="text-center">Views</th>
                        <th width="10%" class="text-center">Rating</th>
                        <th width="10%" class="text-center">Episodes</th>
                        <th width="10%" class="text-right">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $aidd = $row["id"];
                            $episodes = $conn->query("SELECT COUNT(*) AS total FROM `episodes` WHERE `aid`='$aidd'");
                            $total_views = $conn->query("SELECT COUNT(*) AS total FROM `anime_views` WHERE `aid`='$aidd'");
                            $episodes = mysqli_fetch_assoc($episodes);
                            $total_views = mysqli_fetch_assoc($total_views);
                    ?>
                    <tr>
                        <td><a href="<?= $config["url"] ?>anime/<?= $row["id"] ?>"><?= $row["name"] ?></a></td>
                        <td class="text-center"><?= $total_views["total"] ?></td>
                        <td class="text-center">soon™</td>
                        <td class="text-center"><?= $episodes["total"] ?></td>
                        <td class="text-right"><?php if($row["status"]=="0") { echo "Announced"; } elseif($row["status"]=="1") { echo "Airing"; } else { echo "Completed"; } ?></td>
                    </tr>
                    <?php }
                    } else {
                        echo "No Anime have been found :(";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <center>
            <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
            <ul class="pagination">
                <?php if ($page > 1): ?>
                <li class="prev"><a href="<?php echo $config["url"]."animes/"; echo $page-1 ?>">Prev</a></li>
                <?php endif; ?>

                <?php if ($page > 3): ?>
                <li class="start"><a href="<?php echo $config["url"]."animes/1"; ?>">1</a></li>
                <li class="dots"></li>
                <?php endif; ?>

                <?php if ($page-2 > 0): ?><li class="page"><a href="<?php echo $config["url"]."animes/"; echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
                <?php if ($page-1 > 0): ?><li class="page"><a href="<?php echo $config["url"]."animes/"; echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

                <li class="currentpage"><a href="<?php echo $config["url"]."animes/"; echo $page ?>"><?php echo $page ?></a></li>

                <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="<?php echo $config["url"]."animes/"; echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
                <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="<?php echo $config["url"]."animes/"; echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

                <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
                <li class="dots"></li>
                <li class="end"><a href="<?php echo $config["url"]."animes/"; echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                <?php endif; ?>

                <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
                <li class="next"><a href="<?php echo $config["url"]."animes/"; echo $page+1 ?>">Next</a></li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
        </center>
    </div>
</div>
