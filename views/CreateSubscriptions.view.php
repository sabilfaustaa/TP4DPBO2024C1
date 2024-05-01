<?php
include_once("conf.php");
include_once("models/Templates.php");
include_once("models/Members.php");

class CreateSubscriptionView {
    public function render($data = null) {
        $action = @$data['subscription_id'] ? 'update&id_edit=' . $data['subscription_id'] : 'add';
        $memberOptions = $this->getMemberOptions(@$data['member_id']);

        $dataSubscriptions = '
            <form method="post" action="subscriptions.php?action='.$action.'">
                <br><br><div class="card">
                    <div class="card-header bg-primary">
                        <h1 class="text-white text-center">'.(@$data['subscription_id'] ? 'Update ' : 'Add').' Subscription</h1>
                    </div><br>
                    <div class="card-body">
                        <label>Member:</label>
                        <select name="member_id" class="form-control">
                            '.$memberOptions.'
                        </select><br>
                        <label>Subscription Type:</label>
                        <input type="text" value="'. @$data['subscription_type'] .'" name="subscription_type" class="form-control"> <br>
                        <label>Start Date:</label>
                        <input type="date" value="'. @$data['start_date'] .'" name="start_date" class="form-control"> <br>
                        <label>End Date:</label>
                        <input type="date" value="'. @$data['end_date'] .'" name="end_date" class="form-control"> <br>
                        <label>Status:</label>
                        <select name="status" class="form-control">
                            <option value="active" '.($data['status'] == "active" ? "selected" : "").'>Active</option>
                            <option value="expired" '.($data['status'] == "expired" ? "selected" : "").'>Expired</option>
                            <option value="cancelled" '.($data['status'] == "cancelled" ? "selected" : "").'>Cancelled</option>
                        </select><br>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button class="btn btn-success me-2" type="submit" name="submit">Submit</button>
                        <a class="btn btn-danger" href="subscriptions.php">Cancel</a>
                    </div>
                </div>
            </form>
        ';

        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_FORM", $dataSubscriptions);
        $tpl->write();
    }

    private function getMemberOptions($selectedId = null) {
        $conn = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $conn->open();
        $members = $conn->getAllMembers();
        $data = array();
        while($row = $members->fetch_assoc()){
            array_push($data, $row);
        }
        $conn->close();

        $options = "";
        foreach ($data as $member) {
            $selected = $member['id'] == $selectedId ? "selected" : "";
            $options .= "<option value='{$member['id']}' $selected>{$member['name']}</option>";
        }
        return $options;
    }
}
?>
