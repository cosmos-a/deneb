<?php
include_once 'UserData.php';

class UserViewer {
    private $id;
    private $userData;

    public function __construct($id) {
        $this->id = $id;
        $this->userData = new UserData($id);
    }

    public function render() {
        $data = $this->userData->getAll();
        echo '<h3>' . $this->id . '</h3>';
        foreach ($data as $key => $value) {
            echo $key . ': ' . $value . '<br>';
        }
    }
}
?>