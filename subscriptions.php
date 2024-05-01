<?php

include_once("models/Templates.php");
include_once("models/DB.php");
include_once("controllers/Subscriptions.controller.php");

$subscriptions = new SubscriptionsController();

$action = $_GET['action'] ?? null;

if(!empty($_GET['id_edit']) && $action != 'update') {
    $action = 'form-edit';
}
if(!empty($_GET['id_hapus'])) {
    $action = 'delete';
}

switch ($action) {
    case 'form':
        $subscriptions->form();
        break;
    case 'form-edit':
        $subscriptions->form($_GET['id_edit']);
        break;
    case 'add':
        $subscriptions->add($_POST);
        break;
    case 'delete':
        $id = $_GET['id_hapus'];
        $subscriptions->delete($id);
        break;
    case 'update':
        $id = $_GET['id_edit'];
        $subscriptions->edit($id, $_POST);
        break;
    default:
        $subscriptions->index();
        break;
}
