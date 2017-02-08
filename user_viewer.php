<?php
include_once 'lib/User.php';
include_once 'lib/UserViewer.php';

$admin = $_GET['admin'];
$id = $_GET['id'];

if (User::isAdmin($admin) && !empty($id)) {
    $viewer = new UserViewer($id);
    $viewer->render();
} else {
    echo 'Error: Forbidden';
}
?>