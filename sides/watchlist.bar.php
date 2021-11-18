<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Watchlist Controls</h3>
    </div>
    <div class="panel-body">
        <p>Sort After:</p>
        <ul>
            <li><a href="<?php echo $config["url"]."user/watchlist/$reID/$pagination/"; ?>planned">Planned</a></li>
            <li><a href="<?php echo $config["url"]."user/watchlist/$reID/$pagination/"; ?>watching">Watching</a></li>
            <li><a href="<?php echo $config["url"]."user/watchlist/$reID/$pagination/"; ?>paused">Paused</a></li>
            <li><a href="<?php echo $config["url"]."user/watchlist/$reID/$pagination/"; ?>completed">Completed</a></li>
            <li><a href="<?php echo $config["url"]."user/watchlist/$reID/$pagination/"; ?>dropped">Dropped</a></li>
        </ul>
        or <a href="<?php echo $config["url"]."user/watchlist/$reID/"; ?>">Reset Filter</a>?
    </div>
</div>

<?php include("sides/main.bar.php"); ?>
