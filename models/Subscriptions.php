<?php
include_once("models/DB.php");

class Subscription extends DB
{
    function getAllSubscriptions()
    {
        $query = "SELECT subscription_id, member_id, subscription_type, start_date, end_date, status FROM subscriptions";
        return $this->execute($query);
    }

    function getSubscriptionById($id)
    {
        $query = "SELECT subscription_id, member_id, subscription_type, start_date, end_date, status FROM subscriptions WHERE subscription_id = " . $id;
        $result = $this->execute($query);
        return $result->fetch_assoc();
    }

    function addSubscription($data)
    {
        $member_id = $data['member_id'];
        $subscription_type = $data['subscription_type'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $status = $data['status'];

        $query = "INSERT INTO subscriptions (member_id, subscription_type, start_date, end_date, status) VALUES ('$member_id', '$subscription_type', '$start_date', '$end_date', '$status')";
        return $this->execute($query);
    }

    function deleteSubscription($id)
    {
        $query = "DELETE FROM subscriptions WHERE subscription_id = '$id'";
        return $this->execute($query);
    }

    function updateSubscription($id, $data)
    {
        $member_id = $data['member_id'];
        $subscription_type = $data['subscription_type'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $status = $data['status'];

        $query = "UPDATE subscriptions SET 
                  member_id = '$member_id', 
                  subscription_type = '$subscription_type', 
                  start_date = '$start_date', 
                  end_date = '$end_date', 
                  status = '$status'
                  WHERE subscription_id = '$id'";
                  
        return $this->execute($query);
    }
}
?>
