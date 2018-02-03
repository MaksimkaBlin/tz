<?php
include "includes/config.php";

$contactId = $_GET['id'];
if (isset($contactId)) {

    $contactsDeleteQuery = "DELETE FROM main WHERE id = {$contactId}";
    $contactDeleteResult = mysqli_query($connection, $contactsDeleteQuery);
}

if ($contactDeleteResult) {
    header("Location:contacts_page.php");
} else {
    echo 'Не удалось удалить данные';
}