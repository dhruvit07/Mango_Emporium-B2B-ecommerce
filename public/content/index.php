<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
session_start();
define("MYSITE", true);
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
require $phpPath . 'includes/content.inc.php';
include_once $phpPath . "templates/header.php";
?>
<style>
    body {
        background-color: #eee;
    }

    .mt-20 {
        margin-top: 20px;
    }

    .card {
        border-radius: 7px !important;
        border-color: #e1e7ec;
    }

    .mb-30 {
        margin-bottom: 30px !important;
    }

    .m-20 {
        margin: 20px auto;
    }

    .card-img-tiles {
        display: block;
        border-bottom: 1px solid #e1e7ec;
    }

    a {
        text-decoration: none !important;
    }

    .card-img-tiles>.inner {
        display: table;
        width: 100%;
        background-color: white;
    }

    .card-img-tiles .main-img,
    .card-img-tiles .thumblist {
        display: table-cell;
        width: 50%;
        vertical-align: middle;
    }

    .card-img-tiles .main-img>img:last-child,
    .card-img-tiles .thumblist>img:last-child {
        margin-bottom: 0;
    }

    .card-img-tiles .main-img>img {
        display: block;
        width: 100%;
        margin-bottom: 6px;
    }

    .btn-group-sm>.btn,
    .btn-sm {
        padding: .45rem .5rem !important;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: .2rem;
    }

    .card-body {
        padding: 20px;
        background-color: white;
    }

    @media (max-width: 476px) {
        .col-6 {
            width: 50%;
        }
    }

    .video-container {
        position: relative;
        padding-bottom: 50%;
        padding-top: 30px;
        height: 0;
        overflow: hidden;
    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="<?php echo $htmlPath; ?>/public/">Home</a></li>

                    <li class="active">content</li>

                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- CATEGORY -->
<div class="container mt-20 mb-30">
    <div class="row">
        <?php echo $contentHTML; ?>
    </div>
</div>
<!-- /CATEGORY -->

<!-- jQuery Plugins -->
</body>

<?php
include_once $phpPath . "templates/footer.php";

include_once $phpPath . "templates/loadJS.php";
?>


<script type="text/javascript" src="https://www.youtube.com/player_api"></script>
<script>
    var player;

    var $ = function(id) {
        return document.getElementById(id);
    }
    var $$ = function(tagname) {
        return document.getElementsByTagName(tagname);
    }

    function onYouTubeIframeAPIReady() {
        var videos = $$('iframe'), // the iframes elements
            players = [], // an array where we stock each videos youtube instances class
            playingID = null; // stock the current playing video
        for (var i = 0; i < videos.length; i++) // for each iframes
        {
            var currentIframeID = videos[i].id; // we get the iframe ID
            players[currentIframeID] = new YT.Player(currentIframeID); // we stock in the array the instance
            // note, the key of each array element will be the iframe ID

            videos[i].onmouseover = function(e) { // assigning a callback for this event
                var currentHoveredElement = e.target;
                if (playingID) // if a video is currently played
                {
                    players[playingID].pauseVideo();
                }
                players[currentHoveredElement.id].playVideo();
                playingID = currentHoveredElement.id;
            };
        }

    }
    onYouTubeIframeAPIReady();
    $(document).ready(function() {

    });
</script>


</html>