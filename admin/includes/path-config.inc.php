<?php
global $phpPath;
$phpPath = $_SERVER['DOCUMENT_ROOT'] . "/admin/";
global $htmlPath;
$htmlPath = '/admin';
global $url;
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
global $rootPhp;
$rootPhp = $_SERVER['DOCUMENT_ROOT'] . "/";
global $rootHtml;
$rootHtml = '';

// global $phpPath;
// $phpPath = "C:/xampp/htdocs/project-1/admin/";
// global $htmlPath;
// $htmlPath = '/project-1/admin';
// global $url;
// $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// global $rootPhp;
// $rootPhp = "C:/xampp/htdocs/project-1/";
// global $rootHtml;
// $rootHtml = '/project-1';

