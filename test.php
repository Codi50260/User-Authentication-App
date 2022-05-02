<?php

    $email = $_POST['email'];
    $password = $_POST['pass'];

    echo "You have successfully logged in as:" . "<br>";
    echo $email . "<br>";
    echo $password;
?>