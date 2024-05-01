<?php
include_once("models/DB.php");

class Member extends DB
{
    function getAllMembers()
    {
        $query = "SELECT id, name, email, phone, join_date FROM members";
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT id, name, email, phone, join_date FROM members WHERE id = " . $id;
        $result = $this->execute($query);
        return $result->fetch_assoc();
    }

    function addMember($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = date('Y-m-d');

        $query = "INSERT INTO members (name, email, phone, join_date) VALUES ('$name', '$email', '$phone', '$join_date')";
        return $this->execute($query);
    }

    function deleteMember($id)
    {
        $query = "DELETE FROM members WHERE id = '$id'";
        return $this->execute($query);
    }


    function updateMember($id, $data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = date('Y-m-d');

        $query = "UPDATE members SET name = ?, email = ?, phone = ?, join_date = ? WHERE id = ?";

        $query = "UPDATE members SET 
                  name = '$name', 
                  email = '$email', 
                  phone = '$phone', 
                  join_date = '$join_date' 
                  WHERE id = '$id'";
                  
        return $this->execute($query);
    }
}
?>
