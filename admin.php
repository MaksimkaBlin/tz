<?php
require "includes/config.php";
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <!-- Title -->
    <title>Habitat - A Professional Bootstrap Template</title>
    <!-- Meta -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Favicon -->
    <link href="favicon.ico" rel="shortcut icon">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/nexus.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
</head>
<body>

    <!-- Header -->
    <?php
    $contacts = mysqli_query($connection, "SELECT * FROM `main` ORDER BY id DESC");
    $contact = mysqli_fetch_assoc($contacts);
    ?>
    <div id="header">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="logo">
                    <a href="index.php" title="">
                        <img height="46px" width="444px" src="images/<?php echo $contact['image']; ?>">
                    </a>
                </div>
                <!-- End Logo -->
            </div>
        </div>
    </div>
    <!-- End Header -->



<div class="container">

    <form class="form-signin" role="form" method="post" action="admin_page.php">
        <h2 class="form-signin-heading" align="center">Пожалуйста введите логин и пароль</h2>
        <input type="text" class="form-control" placeholder="Логин" required autofocus name="login">
        <input type="password" class="form-control" placeholder="Пароль" required name="password">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
    </form>

</div> <!-- /container -->

</body>
</html>


