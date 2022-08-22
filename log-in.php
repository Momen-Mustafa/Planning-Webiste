<?php

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $user = $QueryBuilder->log_In($username, $password);
    if ($user != 0) {
        $QueryBuilder ->loadTasks();
        return $user;
    } else {
        echo 'there is no such a user, enter the username and the password again';
        require 'log-in.php';
    }


    