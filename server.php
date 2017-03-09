<?php
include_once 'library/User.php';
include_once 'library/UserUtils.php';
include_once 'library/Key.php';
include_once 'library/Log.php';

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
    Log::add($type, '{' . UserUtils::findIdByCode($userCode) . '} checked {' . $friendId . '} is a friend.');
    break;
case 'friend_get':
    User::getFriendData($userCode, $friendId, $key);
    Log::add($type, '{' . UserUtils::findIdByCode($userCode) . '} got {' . $key . '} value of {' . $friendId . '}.');
    break;
case 'get':
    User::getData($userCode, $key);
    Log::add($type, '{' . UserUtils::findIdByCode($userCode) . '} got {' . $key . '} value.');
    break;
case 'login':
    User::login($id, $pw);
    Log::add($type, '{' . $id . '} tried to login.');
    break;
case 'send_message':
    User::sendMessage($userCode, $friendId, $value);
    Log::add($type, '{' . UserUtils::findIdByCode($userCode) . '} sent the message to {' . $friendId . '}.');
    break;
case 'set':
    $keys = explode('|', $key);
    $values = explode('|', $value);
    for ($i = 0; $i < count($keys); $i++) {
        User::setData($userCode, $keys[$i], $values[$i]);
    }
    Log::add($type, '{' . UserUtils::findIdByCode($userCode) . '} set {' . implode(', ', $keys) . '} value' . (count($keys) <= 1 ? '.' : 's.'));
    break;
case 'sign_up':
    User::signUp($id, $pw, $name, $email);
    Log::add($type, '{' . $id . '} tried to sign up.');
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