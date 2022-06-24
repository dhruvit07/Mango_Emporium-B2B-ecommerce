<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/includes/path-config.inc.php';
session_start();
session_destroy();
header('location: ../../../public/auth');