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
    public static function isSortable($key) {
        return array_key_exists($key, Key::getData()['sortable']);
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
    public static function getSortableKeys() {
        return json_encode(Key::getData()['sortable']);
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
                'global' => array(
                    'available' => 'private|writable',
                    'since' => 'public|sortable',
                    'name' => 'public|writable',
                    'id' => 'public',
                    'password' => 'private|writable',
                    'email' => 'public|writable',
                    'user_code' => 'private',
                    'ip' => 'protected',
                    'friends' => 'protected|writable',
                    'messages' => 'private|writable'
                )
            );
            fwrite(fopen('keys.json', 'w'), json_encode($data));
        }
        $arr = array();
        foreach ($data as $key0 => $value0) {
            foreach ($value0 as $key1 => $value1) {
                $properties = explode('|', $value1);
                if (in_array('public', $properties)) {
                    if ($key0 === 'global') {
                        $arr['public'][$key1] = $value1;
                    } else {
                        $arr['public'][$key0 . '___' . $key1] = $value1;
                    }
                } else if (in_array('protected', $properties)) {
                    if ($key0 === 'global') {
                        $arr['protected'][$key1] = $value1;
                    } else {
                        $arr['protected'][$key0 . '___' . $key1] = $value1;
                    }
                } else if (in_array('private', $properties)) {
                    if ($key0 === 'global') {
                        $arr['private'][$key1] = $value1;
                    } else {
                        $arr['private'][$key0 . '___' . $key1] = $value1;
                    }
                }

                if (in_array('sortable', $properties)) {
                    if ($key0 === 'global') {
                        $arr['sortable'][$key1] = $value1;
                    } else {
                        $arr['sortable'][$key0 . '___' . $key1] = $value1;
                    }
                }

                if (in_array('writable', $properties)) {
                    if ($key0 === 'global') {
                        $arr['writable'][$key1] = $value1;
                    } else {
                        $arr['writable'][$key0 . '___' . $key1] = $value1;
                    }
                }
            }
        }
        return $arr;
    }
}
?>