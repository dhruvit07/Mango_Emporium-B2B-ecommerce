<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/includes/path-config.inc.php';
session_start();
define("MYSITE", true);
define("ABOUT", true);
include_once $phpPath . "templates/header.php";
?>
<html>

<head>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,400italic);

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .product-navbar {
            height: 40px;
            width: 100%;
            background: #090b0f;
            border-bottom: 1px solid #090b0f;
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
        }

        .product-navbar .product-navbar-centered {
            max-width: 90vw;
            height: 20px;
            margin: 0 5vw;
        }

        .product-navbar .product-navbar-centered ul {
            margin: 0;
            padding: 0;
        }

        .product-navbar .product-navbar-centered ul li {
            float: left;
            list-style: none;
            margin-right: 30px;
            padding-top: 9px;
        }

        .product-navbar .product-navbar-centered ul li a {
            color: #6f7782;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            text-transform: uppercase;
            text-shadow: none !important;
        }

        .hero {
            background: var(--dark2);
            padding-left: 0;
            padding-right: 0;
        }

        .navbar {
            margin-bottom: 0;
        }

        .hero .container {
            margin: 0 5vw;
            padding: 0 0vw;
            max-width: 90vw;
        }

        .hero .navbar-brand {
            color: #fff;
        }

        .hero .navbar-brand img {
            margin-right: 7px;
            margin-top: -7px;
        }

        #about-main {
            font-family: 'Open Sans', sans-serif;
            margin: 0 auto;
        }

        #about-main .row {
            margin-left: 0;
            margin-right: 0;
        }

        #about-main .jumbotron {
            width: 100%;
            height: 530px;
            background: #FFCC00;
            position: relative;
            margin: 0;
            z-index: 3;
            border-radius: 0px;
        }

        #about-main .jumbotron .img-layer-container {
            position: relative;
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
        }

        #about-main .jumbotron .img-layer-container img {
            max-width: 95vw;
        }

        #about-main .jumbotron .img-layer-container .team-image {
            position: absolute;
        }

        #about-main .jumbotron .img-layer-container .team-image img {
            position: relative;
            z-index: 3;
        }

        #about-main .jumbotron .img-layer-container .circles-container {
            position: absolute;
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
        }

        #about-main .jumbotron .img-layer-container .circles-container .img-1 {
            position: absolute;
            z-index: 2;
        }

        #about-main .jumbotron .img-layer-container .circles-container .img-2 {
            position: absolute;
            z-index: 5;
        }

        #about-main .jumbotron .jumbotron-inner {
            max-width: 1350px;
            margin: 0 auto;
        }

        #about-main .jumbotron .jumbotron-inner a {
            text-decoration: none;
        }

        #about-main .jumbotron .jumbotron-inner .top-box {
            max-width: 950px;
            margin: 0 auto;
        }

        #about-main .jumbotron .jumbotron-inner .top-box .content-box {
            margin: 0 50px 35px;
        }

        #about-main .jumbotron .jumbotron-inner .top-box .content-box h1 {
            text-align: center;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #about-main .jumbotron .jumbotron-inner .top-box .content-box p {
            text-align: center;
            color: #6f7782;
            font-size: 18px;
            font-weight: 500;
            margin: 0;
            margin-bottom: 15px;
        }

        @media (max-width: 1401px) {
            #about-main .jumbotron {
                height: 595px !important;
            }

            #about-main .jumbotron .jumbotron-inner {
                max-width: 900px;
            }

            #about-main .jumbotron .jumbotron-inner .top-box {
                max-width: 900px;
            }

            #about-main .jumbotron .jumbotron-inner .top-box .content-box {
                /* margin-top: 30px; */
                margin-bottom: 50px;
            }

            #about-main .jumbotron .jumbotron-inner .top-box .content-box h3 {
                font-size: 35px;
                margin: 5px 0px 20px 0px;
                color: #6f7782;
                font-weight: 300;
            }
        }

        @media (max-width: 1000px) {
            #about-main .jumbotron .img-layer-container {
                width: 100%;
            }
        }

        @media (max-width: 815px) {
            #about-main .jumbotron .jumbotron-inner {
                max-width: 600px;
            }
        }

        @media (max-width: 640px) {
            #about-main .jumbotron {
                height: 400px !important;
            }

            #about-main .jumbotron .jumbotron-inner {
                max-width: 550px;
                padding: 0 20px;
            }

            #about-main .jumbotron .img-1,
            #about-main .jumbotron .img-2,
            #about-main .jumbotron .team-image {
                display: none;
            }
        }

        @media (max-width: 420px) {
            #about-main .jumbotron .jumbotron-inner {
                max-width: 600px;
                padding: 0 20px;
            }
        }

        @media (max-width: 400px) {
            #about-main .jumbotron .jumbotron-inner .top-box .content-box {
                margin: 30px 0;
            }

            #about-main .jumbotron .jumbotron-inner .top-box .content-box h1 {
                font-size: 35px;
            }

            #about-main .jumbotron .jumbotron-inner .top-box .content-box p {
                font-size: 16px;
            }
        }

        #about-main .story-container {
            height: 100%;
            width: 100%;
            margin-top: 150px;
        }

        @media (max-width: 640px) {
            #about-main .story-container {
                margin-top: 80px;
            }
        }

        #about-main .story-container .container-divider {
            margin-top: 100px;
        }

        @media (max-width: 640px) {
            #about-main .story-container .container-divider {
                margin-top: 50px;
            }
        }

        #about-main .story-container .need-for-dx-container,
        #about-main .story-container .our-tech-container,
        #about-main .story-container .origin-story-container,
        #about-main .story-container .today-container {
            max-width: 950px;
            margin: 0 auto;
            padding: 0 20px;
        }

        @media (max-width: 815px) {

            #about-main .story-container .need-for-dx-container,
            #about-main .story-container .our-tech-container,
            #about-main .story-container .origin-story-container,
            #about-main .story-container .today-container {
                width: 100%;
            }
        }

        #about-main .story-container .need-for-dx-container .img-container,
        #about-main .story-container .our-tech-container .img-container,
        #about-main .story-container .origin-story-container .img-container,
        #about-main .story-container .today-container .img-container {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        #about-main .story-container .need-for-dx-container .img-container img,
        #about-main .story-container .our-tech-container .img-container img,
        #about-main .story-container .origin-story-container .img-container img,
        #about-main .story-container .today-container .img-container img {
            margin: 50px auto;
        }

        #about-main .story-container .need-for-dx-container h3,
        #about-main .story-container .our-tech-container h3,
        #about-main .story-container .origin-story-container h3,
        #about-main .story-container .today-container h3 {
            color: #074e8c;
        }

        #about-main .story-container .need-for-dx-container p,
        #about-main .story-container .our-tech-container p,
        #about-main .story-container .origin-story-container p,
        #about-main .story-container .today-container p {
            font-size: 15px;
            margin-top: 20px;
            color: #676a6c;
        }

        @media (max-width: 640px) {

            #about-main .story-container .need-for-dx-container p,
            #about-main .story-container .our-tech-container p,
            #about-main .story-container .origin-story-container p,
            #about-main .story-container .today-container p {
                font-size: 13px;
            }
        }

        #about-main .story-container .need-for-dx-container ul,
        #about-main .story-container .our-tech-container ul,
        #about-main .story-container .origin-story-container ul,
        #about-main .story-container .today-container ul {
            margin-top: 30px;
            list-style-image: url('https://apimatic.io/img/theme/aboutUs/bullet.svg');
        }

        #about-main .story-container .need-for-dx-container ul li,
        #about-main .story-container .our-tech-container ul li,
        #about-main .story-container .origin-story-container ul li,
        #about-main .story-container .today-container ul li {
            line-height: 25px;
            padding-left: 5px;
            color: #676a6c;
        }
    </style>
</head>

<body>




    <div id="about-main">
        <div class="jumbotron">
            <div class="jumbotron-inner">
                <div class="top-box">
                    <div class="content-box">
                        <h1>
                            About Mango Emporium
                        </h1>
                        <p>
                            APIMatic is a developer experience platform for web APIs. <br /> Our mission is to make developers productive through automatic code generation.
                        </p>
                    </div>
                </div>
            </div>
            <div class="img-layer-container">
                <div class="team-image" id="team-image">
                    <img src="https://apimatic.io/img/theme/aboutUs/images-1.png" />
                </div>

                <div class="circles-container">
                    <div class="img-1">
                        <img src="https://apimatic.io/img/theme/aboutUs/Circles-1-1.svg" />
                    </div>
                    <div class="img-2">
                        <img src="https://apimatic.io/img/theme/aboutUs/Circles-2-1.svg" />
                    </div>
                </div>
            </div>
        </div>
        <div class="story-container">
            <div class="need-for-dx-container">
                <h3 class="text-center">
                    Need for Mango Emporium
                </h3>
                <p>
                    content
                </p>
                <div class="img-container">
                    <img src="https://apimatic.io/img/theme/aboutUs/dxFlow.svg" alt="apimatic developer experience process" class="img-responsive" />
                </div>
            </div>
            <div class="container-divider"></div>
            <div class="our-tech-container">
                <h3 class="text-center">
                    Our Technology
                </h3>
                <p>
                    content
                </p>
                <div class="img-container">
                    <!-- <img src="https://apimatic.io/img/theme/cgaasIcons/cgaasProcess.gif" alt="apimatic code generation engine" class="img-responsive" /> -->
                </div>
            </div>
            <div class="container-divider"></div>
            <div class="origin-story-container">
                <h3 class="text-center">
                    Origin Story
                </h3>
                <p>
                    While doing research work for their PhDs from the University of Auckland in 2014, our founders came across one of the API industry's pain points: SDKs. They realized that API providers who spent hundreds of thousands of dollars every year on improving developer experience, by providing SDKs and user-friendly documentation were able to reach a wider developer audience for their APIs compared to API providers who weren't able to do so.
                </p>
                <p>
                    It was so clear that even though writing SDKs and documentation was a difficult and expensive task, it followed repeatable patterns which could be defined as logic blocks in a code generation engine. So, as a research project, they started working on a code generation engine which dynamically generated SDKs using API description as input.
                </p>
                <p>
                    After a rigorous journey, this research project was selected as a candidate for commercialization by Return on Science (a NZ national research commercialization program focused on bringing new academic research to market) and the concept was transformed into a product i.e. APIMatic.
                </p>
            </div>
            <div class="container-divider"></div>
            <div class="today-container">
                <h3 class="text-center">
                    Flash Forward Today
                </h3>
                <p>
                    APIMatic has come a long way since its inception 3 years ago. Having started with only generating SDKs, APIMatic now provides solutions in other areas of developer experience as well. Presently, APIMatic is used by numerous organizations around the world to:
                </p>
                <ul>
                    <li>Create and store definitions of their APIs</li>
                    <li>Generate SDKs for their APIs for 10 platforms</li>
                    <li>Keep these SDKs in sync with API updates</li>
                    <li>Convert API descriptions into multiple formats (Swagger, API Blueprint, RAML etc.)</li>
                    <li>Generate beautiful documentation for their APIs and SDKs</li>
                    <li>Generate complete Developer Experience API Portals</li>
                </ul>
            </div>
            <div class="container-divider"></div>
        </div>
    </div>

    <?php
    include_once $phpPath . "templates/loadJS.php";
    include_once $phpPath . "templates/footer.php";
    ?>
    <script>
        'use strict';

        $(document).ready(function() {
            $(window).bind('scroll', function(e) {
                parallaxScroll();
            });
        });

        function parallaxScroll() {
            const scrolled = $(window).scrollTop();
            $('#team-image').css('top', (0 - (scrolled * .20)) + 'px');
            $('.img-1').css('top', (0 - (scrolled * .35)) + 'px');
            $('.img-2').css('top', (0 - (scrolled * .05)) + 'px');
        }
    </script>
</body>

</html>