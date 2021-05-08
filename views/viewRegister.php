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
        ;
    }

    .navbar {
        background-color: #0c084c;
    }
    </style>
</head>

<body>



    <?php
    if (isset($_POST['submit'])) {
        ControllerRegister::register();
    }

    ?>
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
        <div>
            <div class="container">
                <div class="row pt-5">
                    <form class="col-lg-6" action="" method="post">
                        <h2>GREAT JOURNEY BEGINS</h2>
                        <h3 class="typed fw-bold fs-1"></h3>
                        <!-- Full Name -->
                        <div class="box d-flex ">
                            <!-- Last Name -->
                            <div class="col input-group-lg me-3 mb-3">
                                <h5 class="fw-bolder">First Name</h5>
                                <input class="form-control" type="text" placeholder="Enter your first name"
                                    id="example-date-input" name="first_Name" required>
                            </div>
                            <!-- Last Name -->
                            <div class="col input-group-lg mb-3">
                                <h5 class="fw-bolder">Last Name</h5>
                                <input class="form-control" type="text" placeholder="Enter your last name"
                                    id="example-date-input" name="last_Name" required>
                            </div>
                        </div>
                        <!-- date and id -->

                        <!-- Email and tele number -->
                        <div class="box ">
                            <!-- date -->
                            <div class="col input-group-lg  mb-3">
                                <h5 class="fw-bolder">Email</h5>
                                <input class="form-control" type="text" placeholder="Enter your email"
                                    id="example-date-input" name="email" required>
                            </div>
                            <!-- Last Name -->

                        </div>
                        <!-- Password -->
                        <div class="box d-flex ">
                            <!-- Last Name -->
                            <div class="col input-group-lg me-3 mb-3">
                                <h5 class="fw-bolder">Password</h5>
                                <input class="form-control" type="password" placeholder="**************"
                                    id="example-date-input" name="password" required>
                            </div>
                            <!-- Last Name -->
                            <div class="col input-group-lg mb-3">
                                <h5 class="fw-bolder">repeat Password</h5>
                                <input class="form-control" type="password" name="repeat_password"
                                    placeholder="**************" id="example-date-input" required>
                            </div>
                        </div>
                        <!-- Button -->
                        <button type="submit" class="btn btn-primary btn-lg " name="submit">Register</button>







                    </form>


                </div>

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