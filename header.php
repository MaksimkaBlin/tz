<?php
require "includes/config.php";
?>
<!-- === BEGIN HEADER === -->
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
<div id="body-bg">
    <!-- Phone/Email -->
    <div id="pre-header" class="background-gray-lighter">
        <div class="container no-padding">
            <div class="row hidden-xs">
                <div class="col-sm-6 padding-vert-5">
                    <strong>Phone:</strong>&nbsp;1-800-123-4567
                </div>
                <div class="col-sm-6 text-right padding-vert-5">
                    <strong>Email:</strong>&nbsp;info@joomla51.com
                </div>
            </div>
        </div>
    </div>
    <!-- End Phone/Email -->
    <!-- Header -->
    <div id="header">
        <div class="container no-padding">
            <div class="row">
                <!-- Logo -->
                <div class="logo">
                    <?php
                    $contacts = mysqli_query($connection, "SELECT * FROM `main` ORDER BY id DESC");
                    $contact = mysqli_fetch_assoc($contacts);

                    ?>

                    <a href="index.php" title="">
                        <img height="46px" width="444px" src="images/<?php echo $contact['image']; ?>">
                    </a>
                </div>
                <!-- End Logo -->
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Top Menu -->
    <div id="hornav" class="bottom-border-shadow">
        <div class="container no-padding border-bottom">
            <div class="row">
                <div class="col-md-8 no-padding">
                    <div class="visible-lg">
                        <ul id="hornavmenu" class="nav navbar-nav">
                            <li>
                                <a href="index.php" class="fa-home active">Home</a>
                            </li>
                            <?php
                            $categories = mysqli_query($connection, "SELECT * FROM `articles_categories`")
                            ?>
                            <li>
                                <span class="fa-font ">Categories</span>
                                <ul>
                                    <?php
                                    while($category = mysqli_fetch_assoc($categories))
                                    {
                                        ?>
                                        <li>
                                            <a href="categories.php?category=<?php echo $category['id'];?>"><?php echo $category['title'];?></a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <a href="contact.php" class="fa-comment ">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 no-padding">
                    <ul class="social-icons pull-right">
                        <li class="social-rss">
                            <a href="#" target="_blank" title="RSS"></a>
                        </li>
                        <li class="social-twitter">
                            <a href="#" target="_blank" title="Twitter"></a>
                        </li>
                        <li class="social-facebook">
                            <a href="#" target="_blank" title="Facebook"></a>
                        </li>
                        <li class="social-googleplus">
                            <a href="#" target="_blank" title="Google+"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Top Menu -->
    <!-- === END HEADER === -->