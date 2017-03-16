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
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" id="content" style="padding: 0 24px 0px 24px">
                    <h4>Log</h4>
                    <ul class="mdl-list">
                        <?php
                            include_once 'library/Log.php';

                            $logs = array_reverse(Log::getAll());

                            foreach ($logs as $key => $value) {
                                echo '<li class="mdl-list__item mdl-list__item--two-line">';
                                echo '<span class="mdl-list__item-primary-content">';
                                echo $value['date'] . ' (' . $value['type'] . ')';
                                echo '<span class="mdl-list__item-sub-title">' . $value['description'] . '</span>';
                                echo '</span>';
                                echo '</li>';
                            }

                            if (count($logs) === 0) {
                                echo '<li class="mdl-list__item mdl-list__item--two-line">';
                                echo '<span class="mdl-list__item-primary-content">';
                                echo '기록이 존재하지 않습니다.';
                                echo '</span>';
                                echo '</li>';
                            }
                        ?>
                    </ul>
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