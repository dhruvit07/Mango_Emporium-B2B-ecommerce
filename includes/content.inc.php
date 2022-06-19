<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';

$contentObject = new content();

$contentHTML = "";
$result = $contentObject->getAllVideoContent();
$i = 1;
while ($row = $result->fetch_assoc()) {
    $contentHTML .= '
        <div class="col-md-6 col-sm-12 col-xs-12 m-20">
        <h3 class="m-20">'.$row['video_name'].'</h3>
        <div class="video-container">
        <iframe id="player-' . $i++ . '" src="' . $row['video_url'] . '" frameborder="0" allowfullscreen></iframe>
        </div>
        <h4 class="text-center m-20"><a href="' . $htmlPath . '/public/store/product?id=' . $row["product_id"] . '"> View Product<a></h4>
        </div>';
}
$formFillUp = "";
if (isset($_SESSION['u_id'])) {
    $userObj = new user();
    $formFillUp = $userObj->getUser($_SESSION['u_id']);
}
