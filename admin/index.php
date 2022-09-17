<?php
if (!isset($_GET['a3643d46a8a4b9ae9e2d932df39d312f'])) {
    header('location: ./');
    exit();
}
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/admin/includes/path-config.inc.php';
header('location: ' . $htmlPath . '/public/auth?a3643d46a8a4b9ae9e2d932df39d312f');
