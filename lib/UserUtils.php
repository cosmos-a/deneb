<?php
require 'DataFile.php';

class UserUtils {
    public static function has($key) {
        $dataFile = new DataFile('user.json');
        return $dataFile->has($key);
    }
}
?>