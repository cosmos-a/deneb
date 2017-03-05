<?php
class Key {
    public static function isPublic($key) {
        return array_key_exists($key, Key::getData()['public']);
    }
    public static function isProtected($key) {
        return Key::isPublic($key) || array_key_exists($key, Key::getData()['protected']);
    }
    public static function isPrivate($key) {
        return Key::isPublic($key) || Key::isProtected($key) || array_key_exists($key, Key::getData()['private']);
    }
    public static function isWritable($key) {
        return array_key_exists($key, Key::getData()['writable']);
    }
    public static function getPublicKeys() {
        return json_encode(Key::getData()['public']);
    }
    public static function getProtectedKeys() {
        $data = Key::getData();
        return json_encode(array_merge($data['public'], $data['protected']));
    }
    public static function getPrivateKeys() {
        $data = Key::getData();
        return json_encode(array_merge($data['public'], $data['protected'], $data['private']));
    }
    public static function getWritableKeys() {
        return json_encode(Key::getData()['writable']);
    }

    private static function getData() {
        $data = null;
        if (file_exists('keys.json')) {
            $data = json_decode(file_get_contents('keys.json'), true);
        } else {
            $data = array(
                'available' => 'private|writable',
                'since' => 'public',
                'name' => 'public|writable',
                'id' => 'public',
                'password' => 'private|writable',
                'email' => 'public|writable',
                'user_code' => 'private',
                'ip' => 'protected',
                'friends' => 'protected|writable',
                'messages' => 'private|writable'
            );
            fwrite(fopen('keys.json', 'w'), json_encode($data));
        }
        return array(
            'public' => array_filter($data, function ($var) {
                    return in_array('public', explode('|', $var));
                }),
            'protected' => array_filter($data, function ($var) {
                    return in_array('protected', explode('|', $var));
                }),
            'private' => array_filter($data, function ($var) {
                    return in_array('private', explode('|', $var));
                }),
            'writable' => array_filter($data, function ($var) {
                    return in_array('writable', explode('|', $var));
                })
        );
    }
}
?>