
<html lang="en">
<meta charset="UTF-8">
<title>Modify User Information</title>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Private Page - Herschel</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/modify.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="img/logo_purple_char.png" alt="">
        <h2>Modify Profile Informations</h2>
        <p class="lead">Make sure to set all the fields you want to change</p>
        <div class="row">
            <div class="col-md-4">
                <h3 class="text-left text-muted mb-5">User image</h3>
                <div class="card">
                    <div class="card-header">
                        <img id="preview" src="img/default-account.png" class="card-img-top custom-userimage mx-auto mt-2" alt="..." style="overflow: hidden">
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="input-group mb-3 my-auto">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file text-left">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" onchange="loadname(); displayPreview(this)">
                                    <label class="custom-file-label" for="inputGroupFile01" id="inputGroupFile01label">Choose file</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h3 class="text-left text-muted mb-5">User Information</h3>
                <form action="">
                    <div class="form-row">
                        <div class="col-md-6 text-left">
                            <label for="email" class="text-muted">Email</label>
                            <input type="email" class="form-control mb-3" id="email" aria-describedby="emailinput" placeholder="change your email...">
                        </div>
                        <div class="col-md-6 text-left">
                            <label for="username" class="text-muted">Username</label>
                            <input type="email" class="form-control mb-3" id="username" aria-describedby="emailinput" placeholder="change your username...">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 text-left">
                            <label for="email" class="text-muted">Name</label>
                            <input type="email" class="form-control mb-3" id="name" aria-describedby="nameinput" placeholder="change your name...">
                        </div>
                        <div class="col-md-6 text-left">
                            <label for="username" class="text-muted">Surname</label>
                            <input type="email" class="form-control mb-3" id="surname" aria-describedby="surnameinput" placeholder="change your surname...">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 text-left">
                            <label for="email" class="text-muted">Location</label>
                            <input type="email" class="form-control mb-3" id="name" aria-describedby="nameinput" placeholder="change your location...">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="bg-black small text-center text-white-50 fixed-bottom">
    <div class="container">
        Copyright &copy; Herschel 2018
    </div>
</footer>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.js"></script>
<script src="js/modify.js"></script>
</body>
</html>