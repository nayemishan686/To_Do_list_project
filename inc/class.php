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
        $query = "SELECT * FROM `goal_list`";
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
}
