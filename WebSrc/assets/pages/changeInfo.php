<?php session_start();
require 'php/userUtility.php';

if(!isset($_SESSION['id'])){
    http_response_code(401);
    $_SESSION['last_error'] = "trying to access to changeInfo.php without passing trough sign in or sign up";
    header("Location: ../error.php?code=" . http_response_code());
}

$username = $_SESSION['id'];

$name = getUserName($username);
$surname = getUserSurname($username);
$location = getUserLocation($username);
$description = getUserDescription($username);
$img = getUserImg($username);


?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Modify User Information</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">

</head>
<body >

<nav class="navbar navbar-expand-lg navbar-shrink navbar-light shadow" id="mainNav">
    <div class="container">
        <a class="navbar-brand a-logo" href="index.php"></a>
        <h1 class="mx-auto my-0 text-uppercase gradient-title">Herschel</h1>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="form-container mx-auto card p-2">
        <div class="row text-left justify-content-center">
            <h4 class="text-primary text-center w-100">Edit your profile</h4>
            <form name="formUpdate" enctype="multipart/form-data" method="post" action="php/userUpdate.php" class="custom-form dark text-left">
                <input type="hidden" name="modifyform">
                <div class=" row position-relative px-1 mt-4 mb-2 justify-content-center">
                    <label class="position-absolute image-loader" for="image"><span class="fas fa-file-upload"></span></label>
                    <div class="bg-black image-previewer row align-content-center" style="height: 256px; width: 256px; -webkit-border-radius: 128px">
                        <img src="<?php echo $img; ?>" id="preview" alt="" class="col align-self-center px-0">
                        <input type="file" name="modifyImage" class="d-none" id="image" lang="en">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 col-12">
                        <div class="custom-input-group-wrapper">
                            <div class="custom-input-group">
                                <label for="modifyName" class="input-text-label align-bottom">Name</label>
                                <div class="collapse inputwrapper">
                                    <input type="text" id="modifyName" name="modifyName" placeholder="<?php echo $name; ?>" aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="custom-input-group-wrapper">
                            <div class="custom-input-group">
                                <label for="modifySurname" class="input-text-label align-bottom">Surname</label>
                                <div class="collapse inputwrapper">
                                    <input type="text" id="modifySurname" name="modifySurname" placeholder="<?php echo $surname; ?>" aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 col-12">
                        <div class="custom-input-group-wrapper">
                            <div class="custom-input-group">
                                <label for="modifyUsername" class="input-text-label align-bottom">Username</label>
                                <div class="collapse inputwrapper">
                                    <input type="text" id="modifyUsername" name="modifyUsername" placeholder="" value="<?php echo $username; ?>" aria-describedby="" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="custom-input-group-wrapper">
                            <div class="custom-input-group">
                                <label for="modifyLocation" class="input-text-label align-bottom">Location</label>
                                <div class="collapse inputwrapper">
                                    <input type="text" id="modifyLocation" name="modifyLocation" placeholder="<?php echo $location; ?>" aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row justify-content-center mt-2 mb-4">
                    <a href="php/changePassword.php" class="btn custom-btn mx-auto">Change password</a>
                </div>
                <div class="form-row px-1 mt-4">
                    <label for="desc" class="text-primary">Description</label>
                    <textarea class="text-muted" name="modifyDescription" id="desc" cols="30"
                              rows="5"><?php echo $description; ?>
                    </textarea>
                </div>
                <div class="form-row justify-content-center mt-2 mb-4">
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
<!-- Footer -->
<div class="fading"></div>
<%=require('../components/footer_component.html')%>
</body>
</html>