<?php
include_once 'lib/User.php';
include_once 'lib/Key.php';

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
case 'friend_check':
    User::isRightFriend($userCode, $friendId);
    break;
case 'friend_get':
    User::getFriendData($userCode, $friendId, $key);
    break;
case 'get':
    User::getData($userCode, $key);
    break;
case 'login':
    User::login($id, $pw);
    break;
case 'send_message':
    User::sendMessage($userCode, $friendId, $value);
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
    if (Key::isPublic($key)) {
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