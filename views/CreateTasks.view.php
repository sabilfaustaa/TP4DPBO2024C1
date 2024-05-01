<?php
include_once("conf.php");
include_once("models/Templates.php");
include_once("models/Members.php");

class CreateTaskView {
    public function render($data = null) {
        $action = @$data['task_id'] ? 'update&id_edit=' . $data['task_id'] : 'add';
        $memberOptions = $this->getMemberOptions(@$data['member_id']);

        $dataTasks = '
            <form method="post" action="tasks.php?action='.$action.'">
                <br><br><div class="card">
                    <div class="card-header bg-primary">
                        <h1 class="text-white text-center">'.(@$data['task_id'] ? 'Update ' : 'Add').' Task</h1>
                    </div><br>
                    <div class="card-body">
                        <label>Task Description:</label>
                        <input type="text" value="'. @$data['task_description'] .'" name="task_description" class="form-control"> <br>
                        <label>Due Date:</label>
                        <input type="date" value="'. @$data['due_date'] .'" name="due_date" class="form-control"> <br>
                        <label>Status:</label>
                        <select name="status" class="form-control">
                            <option value="pending" '.($data['status'] == "pending" ? "selected" : "").'>Pending</option>
                            <option value="completed" '.($data['status'] == "completed" ? "selected" : "").'>Completed</option>
                            <option value="cancelled" '.($data['status'] == "cancelled" ? "selected" : "").'>Cancelled</option>
                        </select><br>
                        <label>Member:</label>
                        <select name="member_id" class="form-control">
                            '.$memberOptions.'
                        </select><br>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button class="btn btn-success me-2" type="submit" name="submit">Submit</button>
                        <a class="btn btn-danger" href="tasks.php">Cancel</a>
                    </div>
                </div>
            </form>
        ';

        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_FORM", $dataTasks);
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
