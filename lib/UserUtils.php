<?php
include_once 'DataFile.php';

class UserUtils {
    public static function findIdByCode($code) {
        $dataFile = new DataFile('users.json');
        $users = $dataFile->getAllKeys();
        foreach ($users as $id => $v) {
            if ($v->getUserCode() === $code) {
                return $id;
            }
        }
        return null;
    }
    public static function has($key) {
        $dataFile = new DataFile('users.json');
        return $dataFile->has($key);
    }
}
?>