<?php

include_once("models/Templates.php");
include_once("models/DB.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

$action = $_GET['action'] ?? null;

if(!empty($_GET['id_edit']) && $action != 'update') {
    $action = 'form-edit';
}
if(!empty($_GET['id_hapus'])) {
    $action = 'delete';
}

switch ($action) {
    case 'form':
        $members->form();
        break;
    case 'form-edit':
        $members->form($_GET['id_edit']);
        break;
    case 'add':
        $members->add($_POST);
        break;
    case 'delete':
        $id = $_GET['id_hapus'];
        $members->delete($id);
        break;
    case 'update':
        $id = $_GET['id_edit'];
        $members->edit($id, $_POST);
        break;
    default:
        $members->index();
        break;
}
