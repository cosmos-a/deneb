<?php
include_once 'lib/User.php';
include_once 'lib/UserList.php';

$admin = $_GET['admin'];

if (User::isAdmin($admin)) {
    $list = new UserList();
    $list->render();
} else {
    echo 'Error: Forbidden';
}
?>