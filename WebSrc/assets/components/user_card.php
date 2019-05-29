<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 30/03/19
 * Time: 14.30
 */

require_once '../php/userUtility.php';

$username = isset($_REQUEST["username"])? $_REQUEST["username"] : "";
$name = isset($_REQUEST["name"])? $_REQUEST["name"] : "";
$surname = isset($_REQUEST["surname"])? $_REQUEST["surname"] : "";
$email = isset($_REQUEST["email"])? $_REQUEST["email"] : "";
$image_path = isset($_REQUEST["img"])? $_REQUEST["img"] : "";
$admin = isAdmin($username);
$icon = $admin? "fa-user-cog" : "fa-user";
echo "
    <div class='text-black-50 bg-white activate mx-2 callout callout-gray user-card' id='{$username}'> 
        <div class='row'>
            <div class='col-sm-5 col-lg-4 align-self-center d-none d-md-block'>
                <img src='{$image_path}' class='img-fluid' alt='' style='max-height: 178px'>
            </div>          
            <div class='col-sm-5 col-lg-6 py-2 col-8'>
                <div class='row'>
                    <h4 class='d-inline font-weight-bolder'><span class='fas {$icon}'></span> {$username}</h4>
                </div>
                <div class='row'><h5>{$name} {$surname}</h5></div>
                <div class='row'><p>{$email}</p></div>
            </div>
            <div class='col-sm-2 col-lg-2 col-4'>
                <label class=\"switch d-inline-block\">
                    <input type='radio' id='{$name}-{$surname}-id' name='userID' value='{$username}'>
                    <span class=\"slider round\"></span>
                </label>
            </div>
        </div>          
    </div>
    ";