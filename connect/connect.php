<?php
    $host = "localhost";
    $user = "root";
    $password ="";
    $database = "tttn";
    $link = mysqli_connect($host, $user, $password, $database) or die("Server not found");
    mysqli_query($link, 'set names utf8');
?>
