
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
    <link rel="stylesheet" href="css/grayscale.css">
</head>
<body class="">
<div class="modifypage">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="img/logo_purple_char.png" alt="">
        <h2>Modify Profile Informations</h2>
        <p class="lead">Make sure to set all the fields you want to change</p>
        <div class="container mx-auto">
            <div class="row">
                <div class="col-md-3" style="background-color: rgba(0,0,0,0.2); border-top-left-radius: calc(0.25rem - 1px); border-bottom-left-radius: calc(0.25rem - 1px)">
                    <ul class="nav flex-column">
                        <li class="dropdown-item">
                            <a href="" class="nav-link active text-muted">User Informations</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="" class="nav-link text-muted">Email & Billing</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9" style="background-color: rgba(0,0,0,0.2); border-top-right-radius: calc(0.25rem - 1px); border-bottom-right-radius: calc(0.25rem - 1px)">
                    <h3 class="text-left text-muted my-3">User Information</h3>
                    <form action="">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
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
                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="username" class="text-muted">Surname</label>
                                        <input type="email" class="form-control mb-3" id="surname" aria-describedby="surnameinput" placeholder="change your surname...">
                                    </div>
                                    <div class="form-row">
                                        <label for="email" class="text-muted">Location</label>
                                        <input type="email" class="form-control mb-3" id="name" aria-describedby="nameinput" placeholder="change your location...">
                                    </div>
                                    <div class="form-row">
                                        <label for="email" class="text-muted">Description</label>
                                        <textarea class="form-control" aria-label="With textarea"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <a href="" class="mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img id="preview" src="img/default-account.png" class="custom-userimage mt-2" alt="..." style="overflow: hidden">
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="" class="dropdown-item">Choose image</a>
                                        <a href="" class="dropdown-item">Delete image</a>
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
    </div>
</div>
<!-- Footer -->
<footer class="bg-black small text-center text-white-50">
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