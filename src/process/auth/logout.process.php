<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
session_start();
session_destroy();
header('location: ../../../public/auth');