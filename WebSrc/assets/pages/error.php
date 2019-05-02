<?php session_start(); ?>
<html>
<head>
    <style>

    </style>
</head>
<body>
<!--                <img src="../img/error.png" height="300">-->
<div class="row h-100 text-center">
    <div class="col-12 pb-0 mb-1">
        <img src="<%=require('../../img/error_ext.png')%>" class="my-auto" alt="">
    </div>
    <div class="col-6 mx-auto">
        <div class="card my-auto" style="background: rgba(14,18,25, 0.6)">
            <div class="card-header" style="height: 50px;">
                <h6 class="text-white text-center">An Error Occurred</h6>
            </div>
            <div class="card-body">
                <p class="text-white text-center" style="z-index: 2">
                    <?php
                        echo $_SESSION['last_error'];
                    ?>
                </p>
            </div>
        </div>
    </div>
    </div>

    <svg class=" gradient gradient-rotate" preserveAspectRatio="none" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <linearGradient x1="0%" y1="0%" y2="100%" id="a">
                <stop id="color-stop-1" stop-color="#187795" offset="0%"></stop>
                <stop id="color-stop-2" stop-color="#2589bd" offset="65%"></stop>
                <stop id="color-stop-3" stop-color="#258ea6" offset="100%"></stop>
            </linearGradient>
        </defs>
        <path fill="url(#a)" d="M0 0h500v500H0z"></path>
    </svg>
	</body>
</html>
