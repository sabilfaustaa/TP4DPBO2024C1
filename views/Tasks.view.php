<?php
include_once("models/Templates.php");

class TaskView {
  public function render($data) {
    $dataTasks = "";
    foreach ($data as $val) {
      $dataTasks .= "<tr>
            <td>{$val['task_id']}</td>
            <td>{$val['member_id']}</td>
            <td>{$val['task_description']}</td>
            <td>{$val['due_date']}</td>
            <td>{$val['status']}</td>
            <td>
              <a href='tasks.php?action=edit&id_edit={$val['task_id']}' class='btn btn-warning'>Edit</a>
              <a href='tasks.php?action=delete&id_hapus={$val['task_id']}' class='btn btn-danger'>Delete</a>
            </td>
            </tr>";
    }

    $tpl = new Template("templates/table.html");
    $tpl->replace("DATA_HEADER", '
        <tr>
          <th>TASK ID</th>
          <th>MEMBER ID</th>
          <th>DESCRIPTION</th>
          <th>DUE DATE</th>
          <th>STATUS</th>
          <th>ACTIONS</th>
        </tr>
    ');
    $tpl->replace("DATA_TABLE", $dataTasks);
    $tpl->replace("DATA_BUTTON_TAMBAH", '<a type="button" class="btn btn-primary nav-link active" href="tasks.php?action=form">Tambah Task</a>');
    $tpl->write();
  }
}
?>
