<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/includes/path-config.inc.php';
if (!isset($_COOKIE["PHPSESSID"])) {
    session_start();
}
define("MYSITE", true);
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
require $phpPath . 'includes/content.inc.php';
require $phpPath . 'includes/store.inc.php';
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
<!-- SECTION -->
<div class="section" style="background-color: white;">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row justify-content-center">
            <!-- ASIDE -->
            <div id="aside" class=" filter-close col-md-2 col-sm-12  text-center">
                <!-- aside Widget -->
                <?php if (isset($_GET['id']) && ($_GET['id'] == 1 ||  $_GET['id'] == 2)) {

                    echo '<form id="filter_form" action="./" type="get">
                        <div class="aside">
                        <input type="hidden" name="id" value="' . $_GET['id'] . '">
                            <h3 class="aside-title">Category</h3>
                            <div class="checkbox-filter">
                            ' . $category_html . '
                            </div>
                        </div>
                        <!-- /aside Widget -->
                        <div class="aside">
							<div id="button">
								<div id="translate"></div>
								<button type="submit" id="filter_button" name="filter" class="button" style="width:98%"> Apply Filter</button>
							</div>
						</div>
                        </form>';
                } ?>
                <form id="filter_form">
                    <div class="aside">
                        <h3 class="aside-title">options</h3>
                        <div class="checkbox-filter">
                            <div class="aside">
                                <div id="button" style="width:100%">
                                    <div id="translate"></div>
                                    <button id="filter_button" class="button" style="width:100%;padding:0px 10px;"><a href="./?id=1">Videos</a></button>
                                </div>
                            </div>
                            <div class="aside">
                                <div id="button" style="width:100%">
                                    <div id="translate"></div>
                                    <button id="filter_button" class="button" style="width:100%;padding:0px 10px;"><a href="./?id=2">Photoshoot</a></button>
                                </div>
                            </div>
                            <div class="aside">
                                <div id="button" style="width:100%">
                                    <div id="translate"></div>
                                    <button id="filter_button" class="button" style="width:100%;padding:0px 10px;"><a href="./?id=3">Catalouge</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->
                </form>
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-10  col-sm-12 col-xs-12 ">
                <?php
                if (isset($_GET['msg']) && isset($_SESSION['msg'])) {
                    echo ' <div class="alert alert-warning alert-dismissible  show" role="alert">
            <strong>' . $_SESSION["msg"] . '</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
                    unset($_SESSION['msg']);
                }
                ?>
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sort By:
                            <select class="input-select">
                                <option value="0">Popular</option>
                                <option value="1">Position</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid" id="filter">
                        Filter:
                        <li><a class="active"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <!-- product -->
                <div class="body">
                    <div class="" id="loader">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div id="pruduct_html">
                    <div class="container col-md-12 col-sm-12 mt-20 mb-30">

                        <div class="row">

                            <?php echo $contentHTML; ?>
                        </div>
                    </div>
                </div>
                <!-- /product -->
                <!-- /product -->

                <!-- /store products -->

                <!-- store bottom filter -->

                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- CATEGORY -->

<!-- /CATEGORY -->

<!-- jQuery Plugins -->
</body>

<?php
include_once $phpPath . "templates/footer.php";

include_once $phpPath . "templates/loadJS.php";
include_once $phpPath . "templates/form.php";
?>


<script type="text/javascript" src="https://www.youtube.com/player_api"></script>
<script>
    $(document).ready(function() {
        $('.toggle').click(function() {
            $('.sidebar-contact').toggleClass('active')
            $('.toggle').toggleClass('active')
        })
    });
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