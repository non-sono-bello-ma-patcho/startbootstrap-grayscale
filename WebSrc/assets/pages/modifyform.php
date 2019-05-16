<?php session_start();
require 'php/userUtility.php';
/*if(!isset($_SERVER['PHP_AUTH_USER'])){
    http_response_code(401);
    header("Location: ../error.php?code=".http_response_code());
}*/
if(!isset($_SESSION['id'])){
    http_response_code(401);
    $_SESSION['last_error'] = "trying to access to modifyform.php without passing trough sign in or sign up";
    header("Location: ../error.php?code=" . http_response_code());
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Modify User Information</title>

    <!-- Bootstrap core CSS -->
</head>
<body class="">
<div class="main-bg modify-bg" style="height: calc(100vh - 20px);">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../../img/logo_magenta_green_css.png" alt="">
        <h2 class="text-white">Modify Profile Informations</h2>
        <p class="lead text-white">Make sure to set all the fields you want to change</p>
        <div class="container mx-auto">
            <div class="row py-3">
                <div class="col-md-3" style="background-color: rgba(0,0,0,0.7); border-top-left-radius: calc(0.25rem - 1px); border-bottom-left-radius: calc(0.25rem - 1px);">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a href="" class="nav-link text-white">User Informations</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link text-white"><?php echo $_SESSION['id']; ?></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9" style="background-color: rgba(0,0,0,0.4); border-top-right-radius: calc(0.25rem - 1px); border-bottom-right-radius: calc(0.25rem - 1px)">
                    <h3 class="text-left my-3 text-white">User Information</h3>
                    <form name="formUpdate" enctype="multipart/form-data" method="post" action="php/updateUser.php">
                        <input type="hidden" name="modifyform">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="modifyName" class="text-white">Name</label>
                                        <input type="text" class="form-control mb-3" name="modifyName" aria-describedby="nameinput" placeholder="<?php echo getUserName($_SESSION['id']);?>">
                                    </div>
                                    <div class="form-row">
                                        <label for="modifyUsername" class="text-white">Username</label>
                                        <input type="text" class="form-control mb-3" name="modifyUsername" aria-describedby="usernameinput" placeholder="<?php echo $_SESSION['id']?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="modifySurname" class="text-white">Surname</label>
                                        <input type="text" class="form-control mb-3" name="modifySurname" aria-describedby="surnameinput" placeholder="<?php echo getUserSurname($_SESSION['id']);?>">
                                    </div>
                                    <div class="form-row">
                                        <label for="modifyLocation" class="text-white">Location</label>
                                        <input type="text" class="form-control mb-3" name="modifyLocation" aria-describedby="nameinput" placeholder="<?php echo getUserLocation($_SESSION['id']);?>">
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img name="modifyImage" src="<?php echo getUserImg($_SESSION['id'])?>" class="custom-userimage mt-2" alt="..." style="overflow: hidden">
                                    <div class="custom-file">
                                        <input name="photo" type="file" class="custom-file-input">
                                        <label for="" class="custom-file-label"></label>
                                    </div>
                                    <a href="" class="dropdown-item">Delete image</a>
                                    <input type="submit" value="update" onclick="formUpdate.action='php/userUpdate.php'">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-row">
                                        <label for="modifyDescription" class="text-white">Description</label>
                                        <textarea name="modifyDescription" id="modifyDescription" class="form-control text-left" aria-label="With textarea" rows="3" style="resize: none"><?php echo getUserDescription($_SESSION['id'])?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Footer -->
<footer class="bg-black small text-center text-white-50">
    <div class="container">
        Copyright &copy; Herschel 2018
    </div>
</footer>
</body>
</html>