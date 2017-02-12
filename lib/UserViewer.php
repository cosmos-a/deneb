<?php
include_once 'UserData.php';

class UserViewer {
    private $id;
    private $userData;

    public function __construct($id) {
        $this->id = $id;
        $this->userData = new UserData($id);
    }

    public function render($name, $url) {
        $data = $this->userData->getAll();
        echo '<h2>' . $this->id . '</h2>';
        echo '<a href=' . str_replace('{id}', $this->id, $url) . '>' . $name . '</a>';
        foreach ($data as $key => $value) {
            echo '<h3>' . $key . ':</h3>' . $value;
        }
    }
}
?>