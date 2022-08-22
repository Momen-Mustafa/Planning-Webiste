<?php

    $oldTask = array(
        "taskName"=>"taskName",
        "desciption"=>"desciption",
        "image"=>"image",
        "due_date"=>"due_date",
        "boardName"=>"boardName",
        "statusName"=>"statusName"
    );

    $newTask = array(
        "taskName"=>"taskName",
        "desciption"=>"desciption",
        "image"=>"image",
        "due_date"=>"due_date",
        "boardName"=>"boardName",
        "statusName"=>"statusName"
    );

    
    $QueryBuilder->update_task($oldTask, $newTask);