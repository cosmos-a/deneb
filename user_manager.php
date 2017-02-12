<!DOCTYPE html>

<head>
    <meta charset=utf-8>
    <meta content="text/html;charset=utf-8" http-equiv=Content-Type>
    <meta content="width=device-width,initial-scale=1" name=viewport>
    <title>Deneb Manager</title>
</head>

<body>

<?php
include_once 'lib/User.php';
include_once 'lib/UserEditor.php';
include_once 'lib/UserList.php';
include_once 'lib/UserViewer.php';

$admin = $_GET['admin'];
$type = $_GET['type'];
$id = $_GET['id'];

function main() {
    echo '<h1>User Manager</h1>';
    echo '<form method=get action=user_manager.php>';
    echo '<input name=type value=list style=display:none>';
    echo 'Admin: <input type=text name=admin>';
    echo '&nbsp;<input type="submit" value="Login">';
    echo '</form>';
}

switch ($type) {
case 'edit':
    if (User::isAdmin($admin) && !empty($id)) {
        $viewer = new UserEditor($id);
        $viewer->render('Back', 'user_manager.php?type=list&admin=' . $admin);
    } else {
        main();
    }
    break;
case 'list':
    if (User::isAdmin($admin)) {
        $list = new UserList();
        $list->render('Viewer', 'user_manager.php?type=view&admin=' . $admin . '&id={id}');
    } else {
        main();
    }
    break;
case 'view':
    if (User::isAdmin($admin) && !empty($id)) {
        $viewer = new UserViewer($id);
        $viewer->render('Editor', 'user_manager.php?type=edit&admin=' . $admin . '&id={id}');
    } else {
        main();
    }
    break;
default:
    main();
}
?>

</body>

</html>