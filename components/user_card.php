<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 30/03/19
 * Time: 14.30
 */

$username = isset($_REQUEST["username"])? "" : $_REQUEST["username"];
$name = isset($_REQUEST["name"])? "" : $_REQUEST["name"];
$surname = isset($_REQUEST["surname"])? "" : $_REQUEST["surname"];
$email = isset($_REQUEST["email"])? "" : $_REQUEST["email"];

echo "<div class=\"card m-2 col-md-6\">
        <div class=\"card-header\">
            <div class=\"form-check\">
                <input type=\"radio\" class=\"form-check-input\" name=\"userID\" value=\"{$username}\">
                <label for=\"usernamec\" class=\"form-check-label\">{$username}</label>
            </div>
            </div>
        <div class=\"card-body\">
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <p id=\"nametag\">{$name}</p>
                </div>
                <div class=\"col-md-6\">
                    <p id=\"surnametag\">{$surname}</p>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <p class=\"mb-0\" id=\"emailtag\">{$email}</p>
                </div>
            </div>
        </div>
    </div>";