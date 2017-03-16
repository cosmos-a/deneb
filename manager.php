<? session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="mdl-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="User Management System">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#3f51b5">
    <meta name="msapplication-navbutton-color" content="#3f51b5">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="google" content="notranslate">
    <title>Deneb Manager</title>
    <link rel="icon" type="image/png" href="assets/img_deneb.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
</head>

<body>
    <?php
        include_once 'library/User.php';
        include_once 'library/UserData.php';
        include_once 'library/UserUtils.php';

        $isAdmin = false;

        if (isset($_SESSION['user_code'])) {
            $code = $_SESSION['user_code'];
            if (UserUtils::isUsedByOthers('user_code', $code)) {
                if (User::isAdmin($code)) {
                    $isAdmin = true;
                } else {
                    echo '<script type="text/javascript">alert("관리자만 사용할 수 있습니다.");location.href="index.php";</script>';
                }
            } else {
                $reason = '접속 실패: 유효하지 않은 세션입니다.';
                session_destroy();
            }
        } else {
            echo '<script type="text/javascript">alert("로그인이 필요한 작업입니다.");location.href="login.php";</script>';
        }
    ?>
    <div class="mdl-color--grey-100 mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Deneb Manager</span>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Deneb Manager</span>
            <nav class="mdl-navigation">
                <?php
                    $navs = json_decode(file_get_contents('navs.json'), true);
                    foreach ($navs as $key => $value) {
                        echo '<a class="mdl-navigation__link" href="' . $value . '">' . $key . '</a>';
                    }
                ?>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div id="top"></div>
            <div class="mdl-grid">
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" id="content" style="padding: 0 24px 24px 24px">
                    <?php
                        include_once 'library/UserEditor.php';
                        include_once 'library/UserList.php';
                        include_once 'library/UserViewer.php';

                        switch ($_GET['type']) {
                            case 'edit':
                                if ($isAdmin && isset($_GET['id'])) {
                                    $code = $_SESSION['user_code'];
                                    $viewer = new UserEditor($_GET['id']);
                                    $viewer->render('Back', 'manager.php');
                                }
                                break;
                            case 'view':
                                if ($isAdmin && isset($_GET['id'])) {
                                    $viewer = new UserViewer($_GET['id']);
                                    $viewer->render('Editor', 'manager.php?type=edit&id={id}');
                                }
                                break;
                            default:
                                if ($isAdmin) {
                                    $list = new UserList();
                                    $list->render('Viewer', 'manager.php?type=view&id={id}');
                                }
                                break;
                        }
                    ?>
                </div>
            </div>
            <?php
                if (file_exists('footer.html')) {
                    echo file_get_contents('footer.html');
                }
            ?>
        </main>
    </div>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>

</html>