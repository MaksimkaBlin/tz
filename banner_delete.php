<?php
include "includes/config.php";

$bannerId = $_GET['id'];
if (isset($bannerId)) {
    $bannerDeleteQuery = "DELETE FROM banners WHERE id={$bannerId}";
    $bannerDeleteResult = mysqli_query($connection, $bannerDeleteQuery);
}

if ($bannerDeleteResult) {
    header("Location:banners_page.php");
} else {
    echo 'Не удалось удалить категорию';
}


