<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 30/03/19
 * Time: 14.30
 */

$username = isset($_REQUEST["username"])? $_REQUEST["username"] : "";
$name = isset($_REQUEST["name"])? $_REQUEST["name"] : "";
$surname = isset($_REQUEST["surname"])? $_REQUEST["surname"] : "";
$email = isset($_REQUEST["email"])? $_REQUEST["email"] : "";
$image_path = isset($_REQUEST["img"])? $_REQUEST["img"] : "";
$admin = isset($_REQUEST["admin"])? $_REQUEST["admin"] : "";
$icon = $admin? "fa-user-cog" : "fa-user";
echo "
    <div class='text-black-50 bg-white activate mx-2 callout callout-gray w-100 user-card' id='{$username}'> 
        <div class='row'>
            <div class='col-sm-6 col-lg-4 align-self-center'>
                <img src='{$image_path}' class='img-fluid' alt='' style='max-height: 178px'>
            </div>          
            <div class='col-sm-5 col-lg-7 py-2'>
                <div class='row'>
                    <h4 class='d-inline font-weight-bolder'><span class='fas {$icon}'></span> {$username}</h4>
                </div>
                <div class='row'><h5>{$name} {$surname}</h5></div>
                <div class='row'><p>{$email}</p></div>
            </div>
            <div class='col-sm-1 col-lg-1'>
                <label for='selected-user'>
                    <input type='radio' value='{$username}' id='{$name}-{$surname}-id' name='selected-user' class='selection'>
                </label>
            </div>
        </div>          
    </div>
    ";