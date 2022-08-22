<?php
namespace Database;

use PDO;
use PDOException;

class QueryBuilder
{
    protected $pdo;
    protected $username;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function log_In($username, $password)
    {
        $this->username = $username;
        $statement = $this->pdo->prepare(
            "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'"
        );

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        return $statement->fetch();
    }

    public function newUser($user)
    {
        $this->username = $user['username'];

        $statement = $this->pdo->prepare(
            "INSERT INTO users (username, password, role) 
            VALUES ('{$user['username']}', '{$user['password']}', '{$user['role']}')");

        $statement->execute(); 
    }


    public function newBoard($board_Name)
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO board (username, boardName) 
            VALUES ('{$this->username}', '{$board_Name}')");

        $statement->execute();
    }

    public function newStatus( $boardName, $statusName)
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO status (boardName, statusName, username) 
            VALUES ('{$boardName}', '{$statusName}', '{$this->username}')");

        $statement->execute();
    }

    public function newTask($taskName, $desciption, $image, $due_date, $boardName, $statusName)
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO task (taskName, desciption, image, due_date, username, boardName, statusName) 
            VALUES ('{$taskName}', '{$desciption}', '{$image}', '{$due_date}', '{$this->username}', '{$boardName}', '{$statusName}')");

        $statement->execute();
    }

    public function newLabel($labelType, $color, $boardName, $statusName, $taskName)
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO label (labelType, color, username, boardName, statusName, taskName) 
            VALUES ('{$labelType}', '{$color}', '{$this->username}', '{$boardName}', '{$statusName}', '{$taskName}')");

        $statement->execute();
    }

    public function history(STRING $action, ?STRING $boardName, ?STRING $statusName, ?STRING $labelType, ?STRING $taskName)
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO history (action, username, boardName, statusName, labelType, taskName) 
            VALUES ('{$action}', '{$this->username}', '{$boardName}', '{$statusName}', '{$labelType}, '{$taskName}')");

        $statement->execute();
    }

    public function getUser()
    {
        return $this->username;
    }

    public function load_Users()
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM users WHERE"
        );

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        return $statement->fetch();
    }


    public function loadTasks()
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM task WHERE username = '{$this->username}'"
        );

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        return $statement->fetch();
    }

    public function sort_by_label()
    {
        $statement = $this->pdo->prepare(
            "SELECT taskName, boardName, statusName, labelType FROM order ORDER BY boardName DESC, statusName DESC, labelType DESC"
        );

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        return $statement->fetch();
    }

    public function sort_name_asc()
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM task ORDER BY taskName"
        );

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        return $statement->fetch();
    }

    public function sort_name_desc()
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM task ORDER BY taskName DESC"
        );

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        return $statement->fetch();
    }

    
    public function task_history($selectedTask)
    {
        $statement = $this->pdo->prepare(
            "SELECT taskName, action, username FROM history WHERE taskName = '{$selectedTask}'"
        );

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        return $statement->fetch();
    }


    public function update_task(ARRAY $oldTask, ARRAY $newTask)
        {
            $statement = $this->pdo->prepare(
                "UPDATE task
                 SET taskName = '{$newTask['taskName']}',
                    desciption = '{$newTask['desciption']}',
                    image = '{$newTask['image']}',
                    due_date = '{$newTask['due_date']}',
                    boardName = '{$newTask['boardName']}',
                    statusName = '{$newTask['statusName']}',
                 WHERE taskName = '{$oldTask['taskName']}',
                    desciption = '{$oldTask['desciption']}',
                    image = '{$oldTask['image']}',
                    due_date = '{$oldTask['due_date']}',
                    boardName = '{$oldTask['boardName']}',
                    statusName = '{$oldTask['statusName']}',
            ");
    
            $statement->execute();
        }
}