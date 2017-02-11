<?php
include_once 'DataFile.php';

class UserList {
    private $dataFile;

    public function __construct() {
        $this->dataFile = new DataFile('users.json');
    }

    public function render() {
        $data = $this->dataFile->getAll();
        echo '<h1>Users</h1>';
        foreach ($data as $key => $value) {
            echo '<h2>' . $key . '</h2>';
            echo $value['available'] === 'true' ? 'Enable' : 'Disable';
        }
    }
}
?>