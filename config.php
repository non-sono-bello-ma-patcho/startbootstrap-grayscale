<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 13/01/19
 * Time: 16.34
 */

return array(
    'index' => '../index.php',
    'private' => '../private.php',
);

?>
<form action="">
    <div class="container bg-white">
        <div class="col-md-5">
            <div class="form-row">
                <label for="email" class="text-muted">Email</label>
                <input type="email" class="form-control mb-3" id="email" aria-describedby="emailinput" placeholder="change your email...">
            </div>
            <div class="form-row">
                <label for="username" class="text-muted">Username</label>
                <input type="email" class="form-control mb-3" id="username" aria-describedby="emailinput" placeholder="change your username...">
            </div>
            <div class="form-row">
                <label for="email" class="text-muted">Name</label>
                <input type="email" class="form-control mb-3" id="name" aria-describedby="nameinput" placeholder="change your name...">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-row">
                <label for="username" class="text-muted">Surname</label>
                <input type="email" class="form-control mb-3" id="surname" aria-describedby="surnameinput" placeholder="change your surname...">
            </div>
            <div class="form-row">
                <label for="email" class="text-muted">Location</label>
                <input type="email" class="form-control mb-3" id="name" aria-describedby="nameinput" placeholder="change your location...">
            </div>
            <div class="form-row">

            </div>
        </div>
        <div class="col-md-2">
            <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img id="preview" src="img/default-account.png" class="custom-userimage mx-auto mt-2" alt="..." style="overflow: hidden">
            </a>
            <div class="dropdown-menu">
                <a href="" class="dropdown-item">Choose image</a>
                <a href="" class="dropdown-item">Delete image</a>
            </div>
        </div>
    </div>
</form>
