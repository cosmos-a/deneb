<?php
include_once 'DataFile.php';

class UserUtils {
    public static function findIdByCode($code) {
        $dataFile = new DataFile('users.json');
        $users = $dataFile->data;
        foreach ($users as $id => $user) {
            if ($user['user_code'] === $code) {
                return $id;
            }
        }
        return null;
    }
    public static function has($key) {
        $dataFile = new DataFile('users.json');
        return $dataFile->has($key);
    }
    public static function isRightFriend($myCode, $friendId) {
        $myId = UserUtils::findIdByCode($myCode);
        if ($myId !== null) {
            $userDataA = new UserData($myId);
            $userDataB = new UserData($friendId);
            if ($userDataA->isAvailable() && $userDataB->isAvailable()) {
                return (in_array($userDataA->get('id'), json_decode($userDataA->get('friends'), true)) && in_array($userDataB->get('id'), json_decode($userDataB->get('friends'), true)));
            }
        }
        return false;
    }
    public static function isUsedByOthers($key, $value) {
        $dataFile = new DataFile('users.json');
        $users = $dataFile->data;
        foreach ($users as $id => $user) {
            if ($user[$key] === $value) {
                return true;
            }
        }
        return false;
    }
}
?>