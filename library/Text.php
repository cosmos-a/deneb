<?php
class Text {
    public static function verifyEmail($str) {
        return preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $str) === 1;
    }
    public static function verifyId($str) {
        return preg_match("/^\w{4,12}$/i", $str) === 1;
    }
    public static function verifyName($str) {
        return preg_match("/^\w{1,20}$/i", $str) === 1;
    }
    public static function verifyNumber($str) {
        return preg_match("/^\d+$/", $str) === 1;
    }
    public static function verifyPassword($str) {
        return preg_match("/^\w{4,12}$/i", $str) === 1;
    }
}
?>