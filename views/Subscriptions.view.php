<?php
include_once("models/Templates.php");

class SubscriptionView {
  public function render($data) {
    $dataSubscriptions = "";
    foreach ($data as $val) {
      $dataSubscriptions .= "<tr>
            <td>{$val['subscription_id']}</td>
            <td>{$val['member_id']}</td>
            <td>{$val['subscription_type']}</td>
            <td>{$val['start_date']}</td>
            <td>{$val['end_date']}</td>
            <td>{$val['status']}</td>
            <td>
              <a href='subscriptions.php?action=edit&id_edit={$val['subscription_id']}' class='btn btn-warning'>Edit</a>
              <a href='subscriptions.php?action=delete&id_hapus={$val['subscription_id']}' class='btn btn-danger'>Delete</a>
            </td>
            </tr>";
    }

    $tpl = new Template("templates/table.html");
    $tpl->replace("DATA_HEADER", '
        <tr>
          <th>ID</th>
          <th>MEMBER ID</th>
          <th>TYPE</th>
          <th>START DATE</th>
          <th>END DATE</th>
          <th>STATUS</th>
          <th>ACTIONS</th>
        </tr>
    ');
    $tpl->replace("DATA_TABLE", $dataSubscriptions);
    $tpl->replace("DATA_BUTTON_TAMBAH", '<a type="button" class="btn btn-primary nav-link active" href="subscriptions.php?action=form">Tambah Subscription</a>');
    $tpl->write();
  }
}
?>
