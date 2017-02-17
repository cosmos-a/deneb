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