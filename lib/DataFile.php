<?php
include_once 'Data.php';

class DataFile extends Data {
    private $filename;

    public function __constructor($filename) {
        if (file_exists($filename)) {
            $this->data = json_decode(file_get_contents($filename), true);
        } else {
            $this->data = array();
            $this->save();
        }
    }

    public function &get($key) {
        if (!$this->data->has($key)) {
            $this->data[$key] = array();
        }
        return $this->data[$key];
    }
    public function save() {
        fwrite(fopen($this->filename, 'w'), json_encode($this->data));
    }
}
?>