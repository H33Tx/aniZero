<?php

// Get the total number of records from our table "students".
$total_pages = $conn->query('SELECT COUNT(*) FROM `episodes`')->fetch_row()[0];

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['pagination']) && is_numeric($_GET['pagination']) ? $_GET['pagination'] : 1;

// Number of results to show on each page.
$num_results_on_page = 25;

if ($stmt = $conn->prepare('SELECT * FROM `episodes` ORDER BY `released` DESC LIMIT ?,?')) {
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	$result = $stmt->get_result();
	$stmt->close();
}

?>

<title>Newest Episodes - Page <?= $page ?> | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Newest Episodes - Page <?= $page ?></h3>
    </div>
    <div class="panel-body">

        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th width="10%">Image</th>
                        <th width="70%" class="text-center">Information</th>
                        <th width="20%" class="text-right">Released</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $animu = $conn->query("SELECT * FROM `anime` WHERE `id`='".$row["aid"]."' LIMIT 1");
                            $animu = mysqli_fetch_assoc($animu);
                    ?>
                    <tr>
                        <td><a href="<?= $config["url"] ?>watch/<?= $row["aid"] ?>/<?= $row["episode"] ?>"><img src="<?= $config["url"] ?>images/animes/<?= $row["aid"] ?>.<?= $animu["image"] ?>" width="100%"></a></td>
                        <td>
                            <h4><a href="<?= $config["url"] ?>watch/<?= $row["aid"] ?>/<?= $row["episode"] ?>"><?= $animu["name"] ?></a></h4>
                            <?= $row["title"] ?><br>
                            Episode <?= $row["episode"] ?> - <?php if($row["sub"]=="1") { echo "Sub"; } elseif($row["sub"]=="0") { echo "Dub"; } else { echo "Raw"; } ?>
                        </td>
                        <td class="text-right"><?= $row["released"] ?></td>
                    </tr>
                    <?php }
                    } else {
                        echo "<tr><td><img src='".$config["url"]."404.png' style='width:100%'></td><td>There haven't been any new episodes lately...</td><td></td>";
                    }

                    ?>
                </tbody>
            </table>
        </div>

        <center>
            <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
            <ul class="pagination">
                <?php if ($page > 1): ?>
                <li class="prev"><a href="<?php echo $config["url"]."newest/"; echo $page-1 ?>">Prev</a></li>
                <?php endif; ?>

                <?php if ($page > 3): ?>
                <li class="start"><a href="<?php echo $config["url"]."newest"; ?>">1</a></li>
                <li class="dots"></li>
                <?php endif; ?>

                <?php if ($page-2 > 0): ?><li class="page"><a href="<?php echo $config["url"]."newest/"; echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
                <?php if ($page-1 > 0): ?><li class="page"><a href="<?php echo $config["url"]."newest/"; echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

                <li class="currentpage"><a href="<?php echo $config["url"]."newest/"; echo $page ?>"><?php echo $page ?></a></li>

                <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="<?php echo $config["url"]."newest/"; echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
                <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="<?php echo $config["url"]."newest/"; echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

                <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
                <li class="dots"></li>
                <li class="end"><a href="<?php echo $config["url"]."newest/"; echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                <?php endif; ?>

                <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
                <li class="next"><a href="<?php echo $config["url"]."newest/"; echo $page+1 ?>">Next</a></li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
        </center>
    </div>
</div>
