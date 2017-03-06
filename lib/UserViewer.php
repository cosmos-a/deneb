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
        echo '<h4>' . $this->id . '</h4>';
        echo '<a href=' . str_replace('{id}', $this->id, $url) . '>' . $name . '</a>';
        foreach ($data as $key => $value) {
            echo '<h5>' . $key . ':</h5>' . $value;
        }
    }
}
?>