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

        $id = $_POST['id'];
        $pw = $_POST['pw'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        if (!empty($id) && !empty($pw) && !empty($name) && !empty($email)) {
            $userData = new UserData($id);
            $ip = $_SERVER['REMOTE_ADDR'];
            if ($userData->has('id')) {
                $reason = '가입 실패: 이미 사용 중인 ID입니다.';
            } else if (UserUtils::isUsedByOthers('email', $email)) {
                $reason = '가입 실패: 이미 사용 중인 E-mail입니다.';
            } else if (UserUtils::isUsedByOthers('ip', $ip)) {
                $reason = '가입 실패: 한 사람당 하나의 계정만 만들 수 있습니다.';
            } else {
                $userData->set('available', 'true');
                $userData->set('since', date('Y.m.d H:i:s'));
                $userData->set('name', $name);
                $userData->set('id', $id);
                $userData->set('password', $pw);
                $userData->set('email', $email);
                $userData->set('user_code', md5($id . mt_rand(0, 99) . $id));
                $userData->set('ip', $ip);
                $userData->set('friends', '[]');
                $userData->set('messages', '[]');
                $_SESSION['user_code'] = $userData->getUserCode();
                echo '<script type="text/javascript">location.href="index.php#user";</script>';
            }
        } else if (isset($_SESSION['user_code'])) {
            if (UserUtils::isUsedByOthers('user_code', $_SESSION['user_code'])) {
                echo '<script type="text/javascript">location.href="index.php#user";</script>';
            } else {
                $reason = '가입 실패: 유효하지 않은 세션입니다.';
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
                    <h4>Sign Up</h4>
                    <form action="sign_up.php" method="post">
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
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="name" name="name">
                            <label class="mdl-textfield__label" for="name">Name</label>
                        </div><br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="email" name="email">
                            <label class="mdl-textfield__label" for="email">E-mail</label>
                        </div><br>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="submit">Sign Up</button>
                    </form><br>
                    이미 계정이 있으신가요? <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="login.php">로그인</a>
                </div>
            </div>
            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo">Copyright 2016-2017&nbsp;<a class="mdl-color-text--grey-100" href="https://github.com/Astro36">Astro</a>. All rights reserved.</div>
                </div>
                <div class="mdl-mini-footer__right-section">
                    <ul class="mdl-mini-footer__link-list">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#top">Back to Top</a></li>
                    </ul>
                </div>
            </footer>
        </main>
    </div>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>

</html>