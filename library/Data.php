<?php
class Data {
    public $data;

    public function __construct($data) {
        $this->data = $data;
    }
    
    public function has($key) {
        return array_key_exists($key, $this->data);
    }
    public function get($key) {
        return $this->data[$key];
    }
    public function getAll() {
        return $this->data;
    }
    public function getAllKeys() {
        return array_keys($this->data);
    }
    public function set($key, $value) {
        $this->data[$key] = $value;
    }
    public function remove($key) {
        unset($this->data[$key]);
    }
}
?>