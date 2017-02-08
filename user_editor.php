<?php
include_once 'lib/User.php';
include_once 'lib/UserEditor.php';

$admin = $_GET['admin'];
$id = $_GET['id'];

if (User::isAdmin($admin) && !empty($id)) {
    $viewer = new UserEditor($id);
    $viewer->render();
} else {
    echo 'Error: Forbidden';
}
?>