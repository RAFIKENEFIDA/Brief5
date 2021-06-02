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
    .navbar {
        background-color: #0c084c;
    }
    </style>
</head>
<?php

if (isset($_POST['submit'])) {
    $obj = new ControllerDasboard();
    $obj->logout();
}
$obj = new ControllerDasboard();
$data =  $obj->selectReservation();

?>

<body>

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
                        <?php
                        if (!isset($_SESSION['id'])) {
                        ?>
                        <a class="nav-link2" aria-current="page" href="acceuil">Home</a>
                        <a class="nav-link2" href="login">Login</a>
                        <a class="nav-link2 float-right" href="register">Register</a>
                        <?php } else { ?>


                        <a class="nav-link2" aria-current="page" href="acceuil">Home</a>
                        <a class="nav-link2" href="page_reservation">Reserver</a>
                        <a class="nav-link2" href="dasboard">Mon reservation</a>

                        <?php } ?>

                    </div>

                </div>
            </div>
        </nav>
        <form action="" method="POST">

            <button type="submit" class=" btn btn-primary deconnexion" name="submit">deconnexion</button>

        </form>

        <table class="table   table-striped ">
            <thead>

                <tr>

                    <th scope="col">Nombre enfants</th>
                    <th scope="col">date entrer</th>
                    <th scope="col">date sortie</th>
                    <th scope="col">Type locale</th>
                    <th scope="col" class="non">Type chambre</th>
                    <th scope="col" class="non">Type vue</th>
                    <th scope="col" class="non">Type pension</th>
                    <th scope="col">Prix:Dh</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>


            </thead>
            <tbody>

                <tr>
                    <?php for ($i = 0; $i < count($data); $i++) { ?>


                    <td scope="row"><?php echo $data[$i]['nbr_enfants']; ?></td>
                    <td><?php echo $data[$i]['date_entrer']; ?></td>
                    <td><?php echo $data[$i]['date_sortie']; ?></td>
                    <td><?php echo $data[$i]['local']; ?></td>
                    <td class="non"><?php echo $data[$i]['type_chambre_double']; ?></td>
                    <td class="non"><?php echo $data[$i]['type_vue']; ?></td>
                    <td class="non"><?php echo $data[$i]['type_pension']; ?></td>
                    <td><?php echo $data[$i]['prix_reservation']; ?></td>
                    <td> <a href="/Dasboard/DeletReservation/522" class="badge badge-danger"
                            style="background-color:red">Delete</a>
                    </td>


                </tr>

                <?php } ?>

            </tbody>
        </table>



    </header>

    <script src="public/js/all.js"></script>
    <!-- bootstrap js -->
    <script src="public/js/bootstrap.js"></script>
    <!-- typed js -->
    <script src="public/js/typed.js"></script>
    <!-- typed style -->
    <script src="public/js/type.js"></script>

</body>

</html>