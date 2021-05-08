<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href="public/css/style_reservation.css">



    <title>Document</title>
    <style>
    .navbar {
        background-color: #0c084c;
    }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {

        $obj = new ControllerPage_reservation();
        $obj->prend_reservation();
    }

    ?>

    <header>

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
    </header>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <div class="form-header">
                            <h1>Make your reservation</h1>
                        </div>
                        <form action="" method="POST">

                            <div class="row">


                                <div class="col-md-4">
                                    <div class="form-group"> <input name="date_entrer" class="form-control" type="date"
                                            required> <span class="form-label">Check In</span> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> <input name="date_sortie" class="form-control" type="date"
                                            required> <span class="form-label">Check out</span> </div>
                                </div>
                            </div>

                            <div class="row  ">

                                <!-- <div class="col-md-4">
                                    <div class="col-sm-4 order-md-2 mb-4">
                                        <form class="card p-2">
                                            <img src="Assets/Img/font.jpg" alt="" id="resImg">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary my-2" type="submit">Reserve</button>
                                            </div>
                                        </form>
                                    </div>

                                </div> -->
                                <!-- partie lift -->
                                <div class="col-md-4">

                                    <div class="row ">

                                        <div class="form-group"> <select name="localSelected"
                                                class="form-control selectLocale" required>
                                                <option value="" selected hidden>Type de locale</option>
                                                <option value="chambre">Chambre</option>
                                                <option value="bungalow">Bungalow</option>
                                                <option value="appartement">Appartement</option>
                                            </select> </div>

                                    </div>
                                    <div class="row choiser_type_chambre">
                                    </div>

                                    <div class="row Schambre">

                                    </div>

                                    <div class="row Stype_lit">

                                    </div>

                                    <div class="row Spension">
                                        <div class="form-group"> <select name="pensionSelected"
                                                class="form-control selectPension" required>
                                                <option value="" selected hidden>Type de pension</option>
                                                <option value="complete">Complete</option>
                                                <option value="demi">Demi</option>
                                                <option value="sans">Sans</option>
                                            </select> </div>
                                    </div>

                                    <div class="row SdemiPension">

                                    </div>

                                </div>

                                <!-- partie right -->
                                <div class="col-md-4">

                                    <div class="row ">
                                        <div class="form-group"> <input name="nombreEnfants"
                                                class="form-control nbrEnfants" type="number"
                                                placeholder=" Nmb enfants"> </div>
                                    </div>
                                    <div class="row stokageEnfants">


                                    </div>

                                </div>



                            </div>

                            <div class="row">
                                <div class="col-md-4 rafik">

                                </div>

                            </div>



                            <div class="row justify-content-center form-btn "> <button type="submit" name="submit"
                                    class="submit-btn">Book
                                    Now</button> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="public/js/reservation.js"></script>

</html>