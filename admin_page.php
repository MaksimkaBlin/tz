

<?php
if($_POST['login'] != "admin" || $_POST['password'] != "admin"){
   header('Location: index.php');
}
require "includes/config.php";
include "admin_header.php";