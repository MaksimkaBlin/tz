<?php
include "includes/config.php";

$categoryId = $_GET['id'];
if (isset($categoryId)) {
    $categoryDeleteQuery = "DELETE FROM articles_categories WHERE id={$categoryId}";
    $categoryDeleteResult = mysqli_query($connection, $categoryDeleteQuery);

    $articlesDeleteQuery = "DELETE FROM articles WHERE category_id = {$categoryId}";
    $articleDeleteResult = mysqli_query($connection, $articlesDeleteQuery);
}

if ($categoryDeleteResult && $articleDeleteResult) {
    header("Location:categories_page.php");
} else {
    echo 'Не удалось удалить категорию';
}


