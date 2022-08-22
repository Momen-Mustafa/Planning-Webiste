<?php
    require 'vendor/autoload.php';

    use Database\{QueryBuilder, Connection};

    require './database/connection.php';
    require './database/QueryBuilder.php';

    $QueryBuilder = new QueryBuilder(Connection::make(require './database/config.php'));

    //insert new user:
    $user = require 'new-user.php';

    //log-in to user account 

    $user = require 'log-in.php';

    //new board
    $board = require 'new-board.php';

    //new status
    $status = require 'new-status.php';     

    //new task
    $task = require 'new-task.php';

    //new label
    $label = require 'new-label.php';

    //filter the tasks in a status based on labels associated
    $QueryBuilder->sort_by_label();

    // sort the tasks according to task name in ascending and descending order
    $QueryBuilder->sort_name_asc();
    $QueryBuilder->sort_name_desc();

    //allow user to see history for a specific task 
    $taskHistory = $QueryBuilder->task_history('selected Task');

    //update a task
    require 'update-task.php';

