<?php

include_once("models/Templates.php");
include_once("models/DB.php");
include_once("controllers/Tasks.controller.php");

$tasks = new TasksController();

$action = $_GET['action'] ?? null;

if(!empty($_GET['id_edit']) && $action != 'update') {
    $action = 'form-edit';
}
if(!empty($_GET['id_hapus'])) {
    $action = 'delete';
}

switch ($action) {
    case 'form':
        $tasks->form();
        break;
    case 'form-edit':
        $tasks->form($_GET['id_edit']);
        break;
    case 'add':
        $tasks->add($_POST);
        break;
    case 'delete':
        $id = $_GET['id_hapus'];
        $tasks->delete($id);
        break;
    case 'update':
        $id = $_GET['id_edit'];
        $tasks->edit($id, $_POST);
        break;
    default:
        $tasks->index();
        break;
}
