<?php
include_once 'UserData.php';

class UserEditor {
    private $id;
    private $userData;

    public function __construct($id) {
        $this->id = $id;
        $this->userData = new UserData($id);
    }

    public function render($name, $url) {
        $data = $this->userData->getAll();
        $userCode = $data['user_code'];
        echo '<h2>' . $this->id . '</h2>';
        echo ' <a href=' . str_replace('{id}', $this->id, $url) . '>' . $name . '</a>';
        foreach ($data as $key => $value) {
            if ($key !== 'since' && $key !== 'id' && $key !== 'user_code' && $key !== 'ip') {
                echo '<form method=post action=server.php>';
                echo '<input name=type value=set style=display:none>';
                echo '<input name=user_code value=' . $userCode . ' style=display:none>';
                echo '<input name=key value=' . $key . ' style=display:none>';
                if ($value === 'true' || $value === 'false') {
                    echo '<h3>' . $key . ':</h3><input type=radio name=value value=true ' . ($value === 'true' ? 'checked=checked' : '') . '>true';
                    echo '<input type=radio name=value value=false ' . ($value === 'false' ? 'checked=checked' : '') . '>false';
                } else {
                    echo '<h3>' . $key . ':</h3><input type=text name=value value=' . $value . '>';
                }
                echo '&nbsp;<input type="submit" value="save">';
                echo '</form>';
            } else {
                echo '<h3>' . $key . ':</h3>' . $value . '<br>';
            }
        }
    }
}
?>