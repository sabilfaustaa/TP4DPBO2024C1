<?php
include_once("models/Templates.php");

class CreateMemberView {
    public function render($data = null) {
        $action = @$data['id'] ? 'update&id_edit=' . $data['id'] : 'add';
        $dataMembers = '
            <form method="post" action="index.php?action='.$action.'">
                <br><br><div class="card">
                    <div class="card-header bg-primary">
                        <h1 class="text-white text-center">'.(@$data['id'] ? 'Update ' : 'Add').' Member</h1>
                    </div><br>
                    <div class="card-body">
                        <label>NAME:</label>
                        <input type="text" value="'. @$data['name'] .'" name="name" class="form-control"> <br>
                        <label>EMAIL:</label>
                        <input type="text" value="'. @$data['email'] .'" name="email" class="form-control"> <br>
                        <label>PHONE:</label>
                        <input type="text" value="'. @$data['phone'] .'" name="phone" class="form-control"> <br>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button class="btn btn-success me-2"  type="submit" name="submit">Submit</button>
                        <a class="btn btn-danger" href="index.php">Cancel</a>
                    </div>
                </div>
            </form>
        ';

        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_FORM", $dataMembers);
        $tpl->write();
    }
}