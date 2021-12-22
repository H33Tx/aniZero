<meta property="og:title" content="Changelog of <?= $config["name"] ?>">
<meta property="og:description" content="What's happening at the site? Read it here!">
<meta property="og:image" content="<?php echo $config["url"]; ?>sup.png">
<title>Changelog | <?php echo $config["name"]; ?></title>

<div class="panel panel-default" id="22-12-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 22.12.2021 <small>v0.2.2</small></h3>
    </div>
    <div class="panel-body">
        Reworked:
        <ul>
            <li>Sidebar, from ugly menu items to stylish items (also, I forgot to fully integrate Glyphicons to the new sidebar, I'm sorry)</li>
            <li>Shows now Version in a fancy way in the footer</li>
        </ul>
        Also, just a small announcement: This'll be the last push for 2021. I'll be in Barcelona for a week until the end of December. Happy new year (before I forget to mention it).
    </div>
</div>

<div class="panel panel-default" id="21-12-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 21.12.2021 <small>v0.2.1</small></h3>
    </div>
    <div class="panel-body">
        Added:
        <ul>
            <li>Adding Episodes</li>
        </ul>
        Fixed:
        <ul>
            <li>Bookmark page once again (didn't work out as planned in v0.2.0)</li>
        </ul>
        Preparations:
        <ul>
            <li>Editing Episodes</li>
            <li>Deleting Episodes</li>
            <li>Editing Animes</li>
            <li>Deleting Animes</li>
        </ul>
        <i>These changes have not been commited to GitHub yet. I forgor and will push them with v0.2.2.</i>
    </div>
</div>

<div class="panel panel-default" id="18-12-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 18.12.2021 <small>v0.2.0</small></h3>
    </div>
    <div class="panel-body">
        Added:
        <ul>
            <li>If Watchlist set to private, it won't be shown to others (shows error to users that it is private)</li>
            <li>Completely reworked the design on the Animes-page</li>
        </ul>
        Fixed:
        <ul>
            <li>Bookmark-Page buggy if no Animes found</li>
            <li>Links to Anime on Schedule-page</li>
        </ul>
        <i>These changes have not been commited to GitHub yet. I forgor and will push them with v0.2.1.</i>
    </div>
</div>

<div class="panel panel-default" id="10-12-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 10.12.2021 <small>v0.1.9</small></h3>
    </div>
    <div class="panel-body">
        Finally, the new update nobody waited for!<br>
        Added:
        <ul>
            <li>Admin Panel General Settings</li>
            <li>Admin Panel Adding Anime</li>
            <li>Admin Panel Adding/Editing Schedule</li>
            <li>Viewing Schedule Page works</li>
        </ul>
        Fixed:
        <ul>
            <li>Some Layout in "general_settings.adm.php"</li>
        </ul>
        I started counting Version because I plan on making some kind of autoupdater... current version if 0.1.9 (don't ask me how the system works!!)<br>
        I'm currently working on the Admin CP (it's by faaar not done >_>).<br><br>
        Cya in the next update when I finished all my exams (and eventually passed some of them by luck) :3
    </div>
</div>

<div class="panel panel-default" id="02-12-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 02.12.2021 <small>v0.1.8</small></h3>
    </div>
    <div class="panel-body">
        Added:
        <ul>
            <li>Finally somewhat of a homepage</li>
            <li>Page with newest Animes and pagination</li>
            <li>Preperations for Admin panel</li>
            <li>Use Logo in Navbar instead of plain text (can use text too but not both at the same time)</li>
        </ul>
        Fixed:
        <ul>
            <li>Video-player having wrong aspect-ratio (w3schools rocks!)</li>
        </ul>
    </div>
</div>

<div class="panel panel-default" id="01-12-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 01.12.2021 <small>v0.1.7</small></h3>
    </div>
    <div class="panel-body">
        Added:
        <ul>
            <li>Viewcount System</li>
            <li>Collect clean/hashed IPs (default is hashed)</li>
            <li>Bookmarking system (see below)</li>
        </ul>
        Bookmarking System:
        <ul>
            <li>Adding Bookmarks</li>
            <li>Removing Bookmarks</li>
            <li>Updating Bookmarks</li>
        </ul>
        Fixed:
        <ul>
            <li>Bookmarks not properly sorting on watchlist page</li>
        </ul>
        Bugs to fix:
        <ul>
            <li>User error when no bookmark entries</li>
        </ul>
    </div>
</div>

<div class="panel panel-default" id="30-11-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 30.11.2021 <small>v0.1.6</small></h3>
    </div>
    <div class="panel-body">
        Added:
        <ul>
            <li>Indexing Animes somewhat</li>
            <li>Somewhat good layout when viewing specific Anime</li>
            <li>Preparations for Admin Control-Panel</li>
            <li>That's it for today...</li>
        </ul>
        Tomorrow Math exam... I didn't even study :^) send halp plez
    </div>
</div>

<div class="panel panel-default" id="29-11-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 29.11.2021 <small>v0.1.5</small></h3>
    </div>
    <div class="panel-body">
        Fixed Bugs:
        <ul>
            <li>Newest page erroring</li>
            <li>Updating Privacy while editing account fixed</li>
        </ul>
        Added:
        <ul>
            <li>Barebones for viewing specific Anime</li>
            <li>Preparations for indexing Anime</li>
        </ul>
        I was sick the past two days... >_>
    </div>
</div>

<div class="panel panel-default" id="18-11-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 18.11.2021 <small>v0.1.4</small></h3>
    </div>
    <div class="panel-body">
        Improved Account System
        <ul>
            <li>View account of yourself and others</li>
            <li>Edit account mostly (except avatar)</li>
        </ul>
        Fixed several major bugs
        <ul>
            <li>Video player height now right</li>
            <li>Cookies not properly read (-> logged out everytime u close window)</li>
            <li>Schedule System barebones</li>
        </ul>
    </div>
</div>

<div class="panel panel-default" id="17-11-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 17.11.2021 <small>v0.1.3</small></h3>
    </div>
    <div class="panel-body">
        Full redesign & system.
        <ul>
            <li>Using the RewriteEngine for better URLs</li>
            <li>Using Bootstrap for Front-end</li>
            <li>Made site completely resposive</li>
            <li>Stealing code of MangaDex v1 :^)</li>
        </ul>
        User Account System
        <ul>
            <li>Added login & registration</li>
            <li>Sessions stored in Cookies (expire after 30 days)</li>
            <li>View watchlist of yourself and others</li>
            <li>Light & dark theme added</li>
        </ul>
        Preperations of Anime indexing
        <ul>
            <li>Viewing an episode of an anime works</li>
            <li>Added Streamtape to supported media players</li>
            <li>Added episode indexing of below video player</li>
            <li>Can bookmark anime (will overwrite old bookmark of episode)</li>
        </ul>
    </div>
</div>

<div class="panel panel-default" id="29-10-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 29.10.2021 <small>v0.1.2</small></h3>
    </div>
    <div class="panel-body">
        Video suport for mp4upload & YouTube.
    </div>
</div>

<div class="panel panel-default" id="27-10-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 27.10.2021 <small>v0.1.1</small></h3>
    </div>
    <div class="panel-body">
        Barebones for front-end & account-system, early schema of Database.
    </div>
</div>

<div class="panel panel-default" id="26-10-2021">
    <div class="panel-heading">
        <h3 class="panel-title">Changelog of 26.10.2021 <small>v0.1.0</small></h3>
    </div>
    <div class="panel-body">
        $aintly wanted to create his own Anime CMS for his Fansub group, so here we are now... in containers :)
    </div>
</div>
