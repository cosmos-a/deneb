<?php
include_once 'Data.php';

class DataFile extends Data {
    public $filename;

    public function __construct($filename) {
        if (file_exists($filename)) {
            $this->data = json_decode(file_get_contents($filename), true);
        } else {
            $this->data = array();
            self::save();
        }
        $this->filename = $filename;
    }

    public function &getData($key) {
        if (!array_key_exists($key, $this->data)) {
            $this->data[$key] = array();
        }
        return $this->data[$key];
    }
    public function save() {
        fwrite(fopen($this->filename, 'w'), json_encode($this->data));
    }
}
?>