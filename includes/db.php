<?php

$connection = mysqli_connect(
    $config['db']['server'],
    $config['db']['user_name'],
    $config['db']['password'],
    $config['db']['name']
);
mysqli_set_charset($connection, 'utf8');

if ($connection == false){
    echo "Не удалось подключиться к базе данных!<br/>";
    echo mysqli_connect_error();
    exit();
}