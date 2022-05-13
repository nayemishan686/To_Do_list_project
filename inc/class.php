<?php
class Admin
{

    private $conn;
    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "goal_list";

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (!$this->conn) {
            echo "Failed to connect";
            die();
        }
    }

    function addTask($data)
    {
        $taskName = $data['taskName'];
        $taskDate = $data['taskDate'];

        $query = "INSERT INTO `goal_list`(`task_name`, `task_date`) VALUES ('$taskName','$taskDate')";

        if (mysqli_query($this->conn, $query)) {
            $taskMsg = "Task added Successfully";
            return $taskMsg;
        } else {
            $taskMsg = "Task can't added";
            return $taskMsg;
        }
    }

    function displayTask(){
        $query = "SELECT * FROM `goal_list` WHERE complete = 0";
        if(mysqli_query($this->conn, $query)){
            $returnTask = mysqli_query($this->conn, $query);
            return $returnTask;
        }
    }

    function deleteTask($id){
        $query = "DELETE FROM `goal_list` WHERE `id` = $id";
        if(mysqli_query($this->conn,$query)){
            $returnTask = "Task Deleted Successfully";
            return $returnTask;
        }
    }

    function displayCompleteTask(){
        $query = "SELECT * FROM `goal_list` WHERE complete = 1";
        if(mysqli_query($this->conn, $query)){
            $returnTask = mysqli_query($this->conn, $query);
            return $returnTask;
        }
    }

    function completeTask($id){
        $query = "UPDATE `goal_list` SET `complete`= 1 WHERE `id`= $id";
        if(mysqli_query($this->conn, $query)){
            $returnTask = "Task Completed Successfully";
            return $returnTask;
        }
    }

    function inCompleteTask($id){
        $query = "UPDATE `goal_list` SET `complete`= 0 WHERE `id`= $id";
        if(mysqli_query($this->conn, $query)){
            $returnTask = "Task Incompleted Successfully";
            return $returnTask;
        }
    }
}
