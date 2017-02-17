<?php
include_once 'lib/User.php';

$type = $_POST['type'];
$id = $_POST['id'];
$pw = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$userCode = $_POST['user_code'];
$key = $_POST['key'];
$value = $_POST['value'];
$friendId = $_POST['friend_id'];

if (!isset($_POST['password'])) {
    $pw = $_POST['pw'];
}

switch ($type) {
case 'get':
    User::getData($userCode, $key);
    break;
case 'is_right_friend':
    User::isRightFriend($userCode, $friendId);
    break;
case 'login':
    User::login($id, $pw);
    break;
case 'set':
    $keys = explode('|', $key);
    $values = explode('|', $value);
    for ($i = 0; $i < count($keys); $i++) {
        User::setData($userCode, $keys[$i], $values[$i]);
    }
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