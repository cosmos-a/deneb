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
    <title>Deneb</title>
    <link rel="icon" type="image/png" href="assets/img_deneb.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
</head>

<body>
    <?php
        include_once 'library/UserData.php';
        include_once 'library/UserUtils.php';
        include_once 'library/Log.php';

        $id = $_POST['id'];
        $pw = $_POST['pw'];

        if (!empty($id) && !empty($pw)) {
            $userData = new UserData($id);
            if (UserUtils::has($id)) {
                if ($userData->isAvailable()) {
                    if ($userData->getPassword() === $pw) {
                        $userData->set('ip', $_SERVER['REMOTE_ADDR']);
                        $_SESSION['user_code'] = $userData->getUserCode();
                        echo '<script type="text/javascript">location.href="index.php#user";</script>';
                    } else {
                        $reason = '로그인 실패: 비밀번호가 올바르지 않습니다.';
                    }
                } else {
                    $reason = '로그인 실패: 비활성화된 ID입니다.';
                }
            } else {
                $reason = '로그인 실패: ID를 찾을 수 없습니다.';
            }
            Log::add('login', '{' . $id . '} tried to login.');
        } else if (isset($_SESSION['user_code'])) {
            if (UserUtils::isUsedByOthers('user_code', $_SESSION['user_code'])) {
                echo '<script type="text/javascript">location.href="index.php#user";</script>';
            } else {
                $reason = '로그인 실패: 유효하지 않은 세션입니다.';
                session_destroy();
            }
        }
    ?>
    <div class="mdl-color--grey-100 mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Deneb</span>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Deneb</span>
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
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-offset-desktop mdl-cell--2-offset-tablet" id="content" style="padding: 0 24px 24px 24px">
                    <h4>Login</h4>
                    <form action="login.php" method="post">
                        <?php
                            if (isset($reason)) {
                                echo $reason . '<br>';
                            }
                        ?>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="id" name="id">
                            <label class="mdl-textfield__label" for="id">ID</label>
                        </div><br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="pw" name="pw">
                            <label class="mdl-textfield__label" for="pw">Password</label>
                        </div><br>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="submit">Login</button>
                    </form><br>
                    <span class="mdl-text-color--primary">Deneb</span>가 처음인가요? <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="sign_up.php">가입하기</a>
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