<?php
include_once("models/Templates.php");

class MemberView {
  public function render($data) {
    $dataMembers = "";
    foreach ($data as $val) {
      $dataMembers .= "<tr>
            <td>{$val['id']}</td>
            <td>{$val['name']}</td>
            <td>{$val['email']}</td>
            <td>{$val['phone']}</td>
            <td>{$val['join_date']}</td>
            <td>
              <a href='index.php?id_edit={$val['id']}' class='btn btn-warning'>Edit</a>
              <a href='index.php?id_hapus={$val['id']}' class='btn btn-danger'>Delete</a>
            </td>
            </tr>";
    }

    $tpl = new Template("templates/table.html");
    $tpl->replace("DATA_HEADER", '
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>PHONE</th>
          <th>JOIN DATE</th>
          <th>ACTIONS</th>
        </tr>
    ');
    $tpl->replace("DATA_TABLE", $dataMembers);
    $tpl->replace("DATA_BUTTON_TAMBAH", '<a type="button" class="btn btn-primary nav-link active" href="index.php?action=form">Tambah Members</a>');
    $tpl->write();
  }
}
?>
