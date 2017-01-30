<?php
require 'Data.php';
require 'DataFile.php';

class UserData extends Data {
    private $data;
    private $dataFile;

    public function __constructor($id) {
        $dataFile = new DataFile('user.json');
        $this->data = &$dataFile->get($id);
        $this->dataFile = $dataFile;
    }
    
    public function getEmail() {
        return $this->get('email');
    }
    public function getId() {
        return $this->get('id');
    }
    public function getIp() {
        return $this->get('ip');
    }
    public function getPassword() {
        return $this->get('password');
    }
    public function getSince() {
        return $this->get('since');
    }
    public function getUserCode() {
        return $this->get('user_code');
    }
    public function isAvailable() {
        return $this->get('available');
    }
    public function set($key, $value) {
        $this->data[$key] = $value;
        $this->save();
    }
    public function save() {
        $this->dataFile->save();
    }
    public function remove($key) {
        unset($this->data[$key]);
        $this->save();
    }
}
?>