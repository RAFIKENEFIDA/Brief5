<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- fontawsome -->
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <!-- bootstrap -->
    <link href="public/css/bootstrap.css" rel="stylesheet" <!-- fontawsome -->
    <!-- css -->
    <link rel="stylesheet" href="public/css/style.css">
    <style>
    body {
        background-color: #126e82;

    }

    .navbar {
        background-color: #0c084c;
    }
    </style>
</head>
<?php

if (isset($_POST['submit'])) {

    ControllerLogin::auth();
}


?>


<body>
    <!-- header star -->
    <header>
        <!-- navbar star -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-trp ">
            <div class="container-xxl">
                <a class="navbar-brand" href="index.html"><img src="./images/Groupe 1.png" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link2" aria-current="page" href="accueil">Home</a>
                        <a class="nav-link2" href="page_reservation">Reservation</a>
                        <a class="nav-link2" href="login">Login</a>

                        <a class="nav-link2 float-right" href="register">Register</a>


                    </div>

                </div>
            </div>
        </nav>
        <!-- navbar end -->

        <!-- home section star -->
        <div class="container pt-5">
            <div class="row pt-5">
                <form name="" method="post" class="col-lg-6 pt-5">
                    <h2>GREAT JOURNEY BEGINS</h2>
                    <h3 class="typed fw-bold fs-1"></h3>

                    <!--login mail and password -->
                    <div class="box ">
                        <!-- Email -->
                        <div class="col-md-8 input-group-lg  mb-3">
                            <h5 class="fw-bolder">Email</h5>
                            <input class="form-control rounded" name="email" type="text" placeholder="Enter your email"
                                id="example-date-input">
                        </div>
                        <!-- password -->
                        <div class="col-md-8 input-group-lg mb-3">
                            <h5 class="fw-bolder">Password</h5>
                            <input class="form-control rounded" name="password" type="password"
                                placeholder="**************" id="example-date-input">
                        </div>
                    </div>


                    <!-- Button -->
                    <div class="col-lg-8 d-grid gap-2">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
                    </div>


                </form>


            </div>

        </div>
        </div>
        <!-- home section end -->
    </header>
    <!-- header end -->
    <!-- ======================================================= -->







    <!-- ===============javascript================= -->
    <!-- fontawsome -->
    <script src="public/js/all.js"></script>
    <!-- bootstrap js -->
    <script src="public/js/bootstrap.js"></script>
    <!-- typed js -->
    <script src="public/js/typed.js"></script>
    <!-- typed style -->
    <script src="public/js/type.js"></script>
</body>

</html>