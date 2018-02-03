<?php
include "includes/config.php";

$articleId = $_GET['id'];
if (isset($articleId)) {
    
    $articlesDeleteQuery = "DELETE FROM articles WHERE id = {$articleId}";
    $articleDeleteResult = mysqli_query($connection, $articlesDeleteQuery);
}

if ($articleDeleteResult) {
    header("Location:articles_page.php");
} else {
    echo 'Не удалось удалить статью';
}