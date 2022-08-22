<?php

    $userType = $QueryBuilder->getUser();
    if ($userType['role'] == 'product owner') {
        $QueryBuilder->newTask('taskName', 'desciption', 'image', 'due_date', 'boardName', 'statusName');
        $QueryBuilder->history('new task is added', 'boardName', 'statusName', null, 'taskName');         
    }
    