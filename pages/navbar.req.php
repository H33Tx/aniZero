<nav id="top_nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="home_button" href="<?= $config["url"] ?>"><?php if(!empty($config["logo"])) { ?><img src="<?= $config["url"] ?>images/system/<?= $config["logo"] ?>" height="130%" alt="<?= $config["name"] ?>'s Logo"><?php } else { ?><?= $config["name"] ?><?php } ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav" id="nav_links">
                <li class="<?php if($rPage=="animes") { echo "active"; } ?>" id="titles">
                    <a href="<?php echo $config["url"]; ?>animes"><i class="bi bi-tv"></i> Animes</a>
                </li>
                <li class="<?php if($rPage=="newest") { echo "active"; } ?>" id="titles">
                    <a href="<?php echo $config["url"]; ?>newest"><i class="bi bi-clock-history"></i><span class="nav-label-1440"> Newest</span></a>
                </li>
                <li class="<?php if($rPage=="schedule") { echo "active"; } ?>" id="titles">
                    <a href="<?php echo $config["url"]; ?>system/schedule"><i class="bi bi-calendar-week"></i><span class="nav-label-1440"> Schedule</span></a>
                </li>
                <li class="<?php if($rPage=="follows") { echo "active"; } ?>" id="titles">
                    <a href="<?php
                             if(isset($_SESSION["username"])) {
                                    echo $config["url"]."user/follows";
                                 } else {
                                    echo $config["url"]."login";
                             }
                            ?>"><i class="bi bi-list-task"></i><span class="nav-label-1440"> Follows</span></a>
                </li>
            </ul>


            <ul class="nav navbar-nav navbar-right" id="pm">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="bi bi-person-circle"></i> Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <?php if(!isset($_SESSION["username"])) { ?></i>
                            <a href="<?php echo $config["url"]; ?>login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                            <a href="<?php echo $config["url"]; ?>signup"><i class="bi bi-person-plus"></i> Register</a>
                            <?php } else { ?>
                            <?php if($uGroup=="Administrator") { ?>
                            <a href="<?php echo $config["url"]; ?>system/admin"><i class="bi bi-wrench"></i> Administration Panel</a>
                            <?php } if($uGroup=="Moderator" || $uGroup=="Administrator") { ?>
                            <a href="<?php echo $config["url"]; ?>system/mod"><i class="bi bi-wrench"></i>Moderation Panel</a>
                            <?php } ?>
                            <a href="<?php echo $config["url"]; ?>user/watchlist/<?php echo $uID; ?>"><i class="bi bi-bookmarks"></i> Watchlist</a>
                            <a href="<?php echo $config["url"]; ?>user/follows"><i class="bi bi-list-task"></i> Follows</a>
                            <a href="<?php echo $config["url"]; ?>user/<?php echo $uID; echo "/"; echo $uName; ?>"><i class="bi bi-person-circle"></i> Profile</a>
                            <a href="<?php echo $config["url"]; ?>user/settings"><i class="bi bi-pencil"></i> Edit Profile</a>
                            <a href="<?php echo $config["url"]; ?>logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
                            <?php } ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
