<?php
include_once 'lib/User.php';

$type = $_GET['type'];
$id = $_GET['id'];
$pw = $_GET['password'];
$name = $_GET['name'];
$email = $_GET['email'];
$userCode = $_GET['user_code'];
$key = $_GET['key'];
$value = $_GET['value'];

switch ($type) {
case 'get':
    User::getData($userCode, $key);
    break;
case 'login':
    User::login($id, $pw);
    break;
case 'set':
    User::setData($userCode, $key, $value);
    break;
case 'sign_up':
    User::signUp($id, $pw, $name, $email);
    break;
case 'sort':
    if ($key !== '' && $key !== 'available' && $key !== 'name' && $key !== 'id' && $key !== 'password' && $key !== 'user_code' && $key !== 'ip') {
        $users = User::sortByData($key);
        $arr = array();
        foreach ($users as $id => $user) {
            array_push($arr, $user['name'] . '(' . $user['id'] . '):' . $user[$key]);
        }
        echo implode('###', $arr);
    }
    break;
}
?>