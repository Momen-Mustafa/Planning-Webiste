<?php

    $user = array('username' => 'momen', 'password' => 'password', 'role' => 'student');

    $currentUsers = $QueryBuilder->load_Users();
    if ($user['username'] != currentUsers['username']) {
        $QueryBuilder->newUser($user);

        $QueryBuilder ->loadTasks();
    
        return $user;
    } else {
        echo 'This user is already existed!';
        require 'new-user.php';
    }
