<?php
include_once 'Data.php';
include_once 'DataFile.php';

class UserData extends Data {
    private $dataFile;

    public function __construct($id) {
        $dataFile = new DataFile('users.json');
        $this->data = &$dataFile->getData($id);
        $this->dataFile = $dataFile;
    }
    
    public function getEmail() {
        return parent::get('email');
    }
    public function getId() {
        return parent::get('id');
    }
    public function getIp() {
        return parent::get('ip');
    }
    public function getPassword() {
        return parent::get('password');
    }
    public function getSince() {
        return parent::get('since');
    }
    public function getUserCode() {
        return parent::get('user_code');
    }
    public function isAvailable() {
        return parent::get('available') === 'true';
    }
    public function set($key, $value) {
        $this->data[$key] = $value;
        self::save();
    }
    public function save() {
        $this->dataFile->save();
    }
    public function remove($key) {
        unset($this->data[$key]);
        self::save();
    }
}
?>