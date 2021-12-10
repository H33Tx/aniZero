<title>Home | <?php echo $config["name"]; ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Animes Currently Airing</h3>
    </div>
    <div class="panel-body">

    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Latest Releases</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th width="15%">Image</th>
                        <th width="60%" class="text-center">Information</th>
                        <th width="20%" class="text-right">Released</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $latestReleases = $conn->query("SELECT * FROM `episodes` ORDER BY `released` DESC LIMIT 25");
                    if ($latestReleases->num_rows > 0) {
                        while($row = $latestReleases->fetch_assoc()) {
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
                        echo "<tr><td></td><td>There haven't been any new episodes lately...</td><td></td>";
                    }

                    ?>
                </tbody>
            </table>
            <a style="width:100%" class="btn btn-success" href="<?= $config["url"] ?>newest">Older Releases</a>
        </div>
    </div>
</div>
