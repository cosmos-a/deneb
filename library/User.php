<?php
include_once 'UserData.php';
include_once 'UserUtils.php';
include_once 'Key.php';
include_once 'Text.php';

class User {
    public static function getData($code, $key) {
        $id = UserUtils::findIdByCode($code);
        if ($id !== null) {
            $userData = new UserData($id);
            echo $userData->get($key);
        }
    }
    public static function getFriendData($myCode, $friendId, $key) {
        if (UserUtils::isRightFriend($myCode, $friendId)) {
            if (Key::isProtected($key)) {
                $userData = new UserData($friendId);
                echo $userData->get($key);
            } else {
                echo 'Error: This value can\'t be accessed.';
            }
        } else {
            echo 'Error: ' . $friendId . ' is not your right friend.';
        }
    }
    public static function isAdmin($code) {
        if (file_exists('admins.json')) {
            return in_array($code, json_decode(file_get_contents('admins.json'), true));
        } else {
            fwrite(fopen('admins.json', 'w'), json_encode(array()));
        }
        return false;
    }
    public static function isRightFriend($myCode, $friendId) {
        $myId = UserUtils::findIdByCode($myCode);
        if ($myId !== null) {
            $userDataA = new UserData($myId);
            $userDataB = new UserData($friendId);
            if ($userDataA->isAvailable() && $userDataB->isAvailable()) {
                if (in_array($userDataA->get('id'), json_decode($userDataA->get('friends'), true)) && in_array($userDataB->get('id'), json_decode($userDataB->get('friends'), true))) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else {
                echo 'Error: This ID is disabled.';
            }
        } else {
            echo 'Error: Can\'t find the user.';
        }
    }
    public static function login($id, $pw) {
        $userData = new UserData($id);
        if (UserUtils::has($id)) {
            if ($userData->isAvailable()) {
                if ($userData->getPassword() === $pw) {
                    $userData->set('ip', $_SERVER['REMOTE_ADDR']);
                    echo 'Login successful!#' . $userData->getUserCode();
                } else {
                    echo 'Error: The password is incorrect.';
                }
            } else {
                echo 'Error: This ID is disabled.';
            }
        } else {
            echo 'Error: This ID is not signed up the server.';
        }
    }
    public static function sendMessage($myCode, $friendId, $message) {
        $myData = new UserData(UserUtils::findIdByCode($myCode));
        $userData = new UserData($friendId);
        if ($myData !== null && $userData !== null) {
            if ($myData->isAvailable() && $userData->isAvailable()) {
                $messages = json_decode($userData->get('messages'), true);
                array_push($messages, json_encode(array(
                    'from_name' => $myData->getName(),
                    'from_ip' => $myData->getIp(),
                    'since' => date('Y.m.d H:i:s'),
                    'message' => $message)));
                $userData->set('messages', json_encode($messages));
                echo 'Send successful!';
            } else {
                echo 'Error: This ID is disabled.';
            }
        } else {
            echo 'Error: This ID is not signed up the server.';
        }
    }
    public static function setData($code, $key, $value) {
        $id = UserUtils::findIdByCode($code);
        if ($id !== null) {
            $userData = new UserData($id);
            if ($userData->isAvailable()) {
                if (Key::isWritable($key) || empty($userData->get($key))) {
                    $userData->set($key, $value);
                    echo 'Modify successful!';
                } else {
                    echo 'Error: This value can\'t be modified.';
                }
            } else {
                echo 'Error: This ID is disabled.';
            }
        } else {
            echo 'Error: Can\'t find the user.';
        }
    }
    public static function signUp($id, $pw, $name, $email) {
        $userData = new UserData($id);
        $ip = $_SERVER['REMOTE_ADDR'];
        if (!Text::verifyId($id)) {
            echo 'Error: The ID is invalid.';
        } else if (!Text::verifyPassword($id)) {
            echo 'Error: The password is invalid.';
        } else if (!Text::verifyName($id)) {
            echo 'Error: The name is invalid.';
        } else if (!Text::verifyEmail($id)) {
            echo 'Error: The email is invalid.';
        } else if ($userData->has('id')) {
            echo 'Error: This ID is already used.';
        } else if (UserUtils::isUsedByOthers('email', $email)) {
            echo 'Error: This email is already used.';
        } else if (UserUtils::isUsedByOthers('ip', $ip)) {
            echo 'Error: Only one ID can be created per person.';
        } else {
            $userData->set('available', 'true');
            $userData->set('since', date('Y.m.d H:i:s'));
            $userData->set('name', $name);
            $userData->set('id', $id);
            $userData->set('password', $pw);
            $userData->set('email', $email);
            $userData->set('user_code', md5($id . mt_rand(0, 99) . $id));
            $userData->set('ip', $ip);
            $userData->set('friends', '[]');
            $userData->set('messages', '[]');
            echo 'Success! You can use this ID after the permission of the admin.';
        }
    }
    public static function sortByData($key) {
        $dataFile = new DataFile('users.json');
        $users = $dataFile->data;
        $arr = array();
        foreach ($users as $k => $v) {
            if ($v['available'] === 'true') {
                if (empty($v[$key])) {
                    $v[$key] = '0';
                }
                array_push($arr, $v);
            }
        }
        $pattern = '/^[+-]?\d+(\.\d+)?$/';
        usort($arr, function ($a, $b) use ($key, $pattern) {
            $valueA = $a[$key];
            $valueB = $b[$key];
            if (preg_match($pattern, $valueA) && preg_match($pattern, $valueB)) {
                $tmp = (int) $valueB - (int) $valueA;
                if ($tmp === 0) {
                    return strnatcmp($a['since'], $b['since']);
                } else {
                    return $tmp;
                }
            } else {
                $tmp = strnatcmp($valueA, $valueB);
                if ($tmp === 0) {
                    return strnatcmp($a['since'], $b['since']);
                } else {
                    return $tmp;
                }
            }
        });
        return $arr;
    }
}
?>