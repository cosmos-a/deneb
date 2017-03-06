<?php
include_once 'DataFile.php';

class UserList {
    private $dataFile;

    public function __construct() {
        $this->dataFile = new DataFile('users.json');
    }

    public function render($name, $url) {
        $data = $this->dataFile->getAll();
        echo '<h4>Users</h4>';
        foreach ($data as $key => $value) {
            echo '<h5>' . $key . '</h5>';
            echo $value['available'] === 'true' ? 'Enable' : 'Disable';
            echo ' <a href=' . str_replace('{id}', $key, $url) . '>' . $name . '</a>';
        }
    }
}
?>