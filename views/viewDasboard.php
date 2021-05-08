<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
session_start();

if (isset($_POST['submit'])) {
    ControllerLogin::logout();
}

?>

<body>
    <h6>Dasboard</h6>
    <p>Bonjour<?php echo $_SESSION['id'];

                ?></p>
    <form action="" method="POST">

        <button type="submit" name="submit">deconnexion</button>

    </form>

</body>

</html>