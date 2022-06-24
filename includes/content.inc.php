<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/includes/path-config.inc.php';

$contentObject = new content();

$contentHTML = "";
if (isset($_GET['id']) && $_GET['id'] == 1) {
    $category = isset($_GET['category']) ? ($_GET['category'][0] == "" ? "" : $_GET['category']) : "";
    $result = $contentObject->getAllVideoContent($category);
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        $contentHTML .= '
        <div class="col-md-6 col-sm-12 col-xs-12 m-20">
        <h3 class="m-20">' . $row['video_name'] . '</h3>
        <div class="video-container">
        <iframe id="player-' . $i++ . '" src="' . $row['video_url'] . '" frameborder="0" allowfullscreen></iframe>
        </div>
        <h4 class="text-center m-20"><a href="' . $htmlPath . '/public/store/product?id=' . $row["product_id"] . '"> View Product<a></h4>
        </div>';
    }
} else if (isset($_GET['id']) && $_GET['id'] == 2) {
    $category = isset($_GET['category']) ? ($_GET['category'][0] == "" ? "" : $_GET['category']) : "";
    $result = $contentObject->getPhotoshoot($category);
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        $contentHTML .= '
        <div class="col-md-6 col-sm-12 col-xs-12 m-20">
        <h3 class="m-20">' . $row['photoshoot_name'] . '</h3>
        <a href="' . $htmlPath . '/uploads/photoshoot/' . $row['image'] . '" target="_blank"><img height="300" style="object-fit:cover" width="100%" src="' . $htmlPath . '/uploads/photoshoot/' . $row['image'] . '">
        </a><h4 class="text-center m-20"><a href="' . $htmlPath . '/public/store/product?id=' . $row["product_id"] . '"> View Product<a></h4>
        </div>';
    }
} else if (isset($_GET['id']) && $_GET['id'] == 3) {
    $result = $contentObject->getCatalouge();
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        $contentHTML .= '
        <div class="col-md-6 col-sm-12 col-xs-12 m-20">
        <h3 class="m-20">' . $row['catalouge_name'] . '</h3>
        <a href="' . $htmlPath . '/uploads/catalouge/' . $row['image'] . '" target="_blank"><img height="300" style="object-fit:cover" width="100%" src="' . $htmlPath . '/uploads/catalouge/' . $row['image'] . '">
        </a><h4 class="text-center m-20"><a href="' . $htmlPath . '/public/store/?filter&user=' . $row["u_id"] . '&category[]=' . $row["c_id"] . '"> View Products<a></h4>
        </div>';
    }
}
if ($contentHTML == "") {

    $contentHTML =  '<img class="img-responsive" src=' . $htmlPath . '/resources/img/not_found.jpg>';
}
$formFillUp = "";
if (isset($_SESSION['u_id'])) {
    $userObj = new user();
    $formFillUp = $userObj->getUser($_SESSION['u_id']);
}
