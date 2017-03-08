<?php
class Log {
    public static function add($type, $desc) {
        $logs = null;
        if (file_exists('logs.json')) {
            $logs = json_decode(file_get_contents('logs.json'), true);
        } else {
            $logs = array();
        }

        array_push($logs, array(
            'date' => date('Y.m.d H:i:s'),
            'type' => $type,
            'description' => $desc
        ));
        fwrite(fopen('logs.json', 'w'), json_encode($logs));
    }
    public static function getAll() {
        if (file_exists('logs.json')) {
            return json_decode(file_get_contents('logs.json'), true);
        } else {
            $logs = array();
            fwrite(fopen('logs.json', 'w'), json_encode($logs));
            return $logs;
        }
    }
}
?>