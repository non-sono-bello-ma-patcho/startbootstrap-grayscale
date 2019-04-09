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
$icon = $admin? "fa-user-lock" : "fa-user";
echo "
    <a href='#' class='card-activator'>
        <div class='text-black-50 bg-light'>
            <div class='row py-1 px-3'>
                <div class='col-4'>
                    <img src='{$image_path}' class='img-fluid' alt=''>
                </div>          
                <div class='col-7 py-2'>
                    <div class='row'><span class='fas {$icon} text-primary'>{$username}</span></div>
                    <div class='row'><h5>{$name} {$surname}</h5></div>
                    <div class='row'><p>{$email}</p></div>
                </div>
                <div class='col-1'>
                    <label for='{$name}-{$surname}-id' class='sr-only'><input type='radio' value='{$username}' class='' id='{$name}-{$surname}-id'></label>
                </div>
            </div>          
        </div>
    </a>
    ";