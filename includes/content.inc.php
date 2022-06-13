<?php

$contentObject = new content();

$contentHTML = "";
$result = $contentObject->getAllVideoContent();
$i = 1;
while ($row = $result->fetch_assoc()) {
    $contentHTML .= '
<div class="col-md-6 col-sm-12 col-xs-12 m-20">
    <div class="video-container">
        <iframe id="player-' . $i++ . '" src="' . $row['video_url'] . '" frameborder="0" allowfullscreen></iframe>
    </div>
</div>';
}
