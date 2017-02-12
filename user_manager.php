<?php
include_once 'lib/User.php';
include_once 'lib/UserEditor.php';
include_once 'lib/UserList.php';
include_once 'lib/UserViewer.php';

$admin = $_GET['admin'];
$type = $_GET['type'];
$id = $_GET['id'];

switch ($type) {
case 'edit':
    if (User::isAdmin($admin) && !empty($id)) {
        $viewer = new UserEditor($id);
        $viewer->render();
    } else {
        echo 'Error: Forbidden';
    }
    break;
case 'list':
    if (User::isAdmin($admin)) {
        $list = new UserList();
        $list->render();
    } else {
        echo 'Error: Forbidden';
    }
    break;
case 'view':
    if (User::isAdmin($admin) && !empty($id)) {
        $viewer = new UserViewer($id);
        $viewer->render();
    } else {
        echo 'Error: Forbidden';
    }
    break;
}
?>