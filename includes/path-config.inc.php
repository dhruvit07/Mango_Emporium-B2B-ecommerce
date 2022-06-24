<?php

global $phpPath;
$phpPath = $_SERVER['DOCUMENT_ROOT'] . "/";
global $htmlPath;
$htmlPath = '';
global $url;
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


// global $phpPath;
// $phpPath = "C:/xampp/htdocs/project-1/";
// global $htmlPath;
// $htmlPath = '/project-1';
// global $url;
// $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
