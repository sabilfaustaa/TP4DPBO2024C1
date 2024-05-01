<?php
include_once("models/DB.php");

class Task extends DB
{
    function getAllTasks()
    {
        $query = "SELECT task_id, member_id, task_description, due_date, status FROM tasks";
        return $this->execute($query);
    }

    function getTaskById($id)
    {
        $query = "SELECT task_id, member_id, task_description, due_date, status FROM tasks WHERE task_id = " . $id;
        $result = $this->execute($query);
        return $result->fetch_assoc();
    }

    function addTask($data)
    {
        $member_id = $data['member_id'];
        $task_description = $data['task_description'];
        $due_date = $data['due_date'];
        $status = $data['status'];

        $query = "INSERT INTO tasks (member_id, task_description, due_date, status) VALUES ('$member_id', '$task_description', '$due_date', '$status')";
        return $this->execute($query);
    }

    function deleteTask($id)
    {
        $query = "DELETE FROM tasks WHERE task_id = '$id'";
        return $this->execute($query);
    }

    function updateTask($id, $data)
    {
        $member_id = $data['member_id'];
        $task_description = $data['task_description'];
        $due_date = $data['due_date'];
        $status = $data['status'];

        $query = "UPDATE tasks SET 
                  member_id = '$member_id', 
                  task_description = '$task_description', 
                  due_date = '$due_date', 
                  status = '$status' 
                  WHERE task_id = '$id'";
                  
        return $this->execute($query);
    }
}
?>
