<? session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="mdl-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="User Management System">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#101029">
    <meta name="msapplication-navbutton-color" content="#101029">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="google" content="notranslate">
    <title>Deneb</title>
    <link rel="icon" type="image/png" href="assets/img_deneb.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <style type="text/css">
        .mdl-layout__drawer-button {
            color: #eee;
        }
    </style>
</head>

<body>
    <div class="mdl-layout mdl-js-layout" style="background: url('assets/img_milkyway.jpg') center / cover;">
        <header class="mdl-layout__header mdl-layout__header--transparent">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Deneb</span>
                <div class="mdl-layout-spacer"></div>
                <nav class="mdl-navigation">
                    <?php
                        $navs = json_decode(file_get_contents('navs.json'), true);
                        foreach ($navs as $key => $value) {
                            echo '<a class="mdl-navigation__link" href="' . $value . '">' . $key . '</a>';
                        }
                    ?>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Deneb</span>
            <nav class="mdl-navigation">
                <?php
                    foreach ($navs as $key => $value) {
                        echo '<a class="mdl-navigation__link" href="' . $value . '">' . $key . '</a>';
                    }
                ?>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div id="top"></div>
            <div style="padding-top: 168px; padding-bottom: 168px;">
                <h1 class="mdl-color-text--white" style="text-align: center; text-shadow: 0 2px 2px #888">Deneb</h1>
                <h4 class="mdl-color-text--white" style="text-align: center; text-shadow: 0 2px 2px #888">User Management System</h4>
                <div style="background: url('assets/ic_keyboard_arrow_down_white.png') center / cover; cursor: pointer; margin: 0 auto; margin-top: 54px; width: 54px; height: 54px;" onclick="scrollTo('#logo');">
                </div>
            </div>
            <div class="mdl-grid">
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" id="logo" style="padding: 24px 24px 24px 24px">
                    <div style="background: url('assets/img_deneb.png') center / cover; border-radius: 8px; margin: 0 auto; width: 256px; height: 256px;">
                    </div>
                </div>
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" style="padding: 0 24px 24px 24px">
                    <h4>Deneb</h4>
                    데네브(Deneb)는 여름철 별자리중 하나인 백조자리의 꼬리부분에 위치한 알파별로, 거문고자리의직녀성, 독수리자리의 견우성과 함께 여름의 대삼각형을 이룬다. 이 항성은 청색 초거성에 속하며, 겉보기 등급은 1.25로 밤하늘에서 20번째로 밝은 별이다. 데네브는 지금까지 알려진 항성들 중 가장 밝은 부류에 속한다. 그러나 데네브까지의 정확한 거리와 밝기를 계산하기가 쉽지 않아 예상하는 밝기 범위는 태양의 54,000배에서 196,000배까지 다양하다.<br><br>
                    중국에서는 天津四(천상의 여울에서 네 번째 별)라고 불렀다. 중국의 칠석 이야기에서 늦여름 견우(다비흐)와 직녀(베가)가 일 년에 한 번 만날 수 있는 특별한 날 두 사람을 만나게 해 주는 오작교를 상징한다.<br><br>
                    출처: <a href="https://ko.m.wikipedia.org/wiki/데네브">위키백과</a>
                </div>
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" style="padding: 0 24px 24px 24px">
                    <h4>Getting Started</h4>
                    사용자 관리 시스템, Deneb입니다. Deneb를 이용하여 쉽고 간단하게 시스템을 구축할 수 있습니다.
                    <h5>BlockLauncher</h5>
                    Deneb를 이용하기 위해서는 <a href="https://github.com/Astro36/AstroLibrary/releases">AstroLibrary</a>를 다운로드하고 스크립트와 함께 적용하세요. 아래와 같은 방식으로 Deneb를 이용할 수 있습니다.<br><br>
                    <div class="colorscripter-code" style="color:#010101; font-family:Consolas, monospace !important; position:relative !important; overflow:auto">
                        <table class="colorscripter-code-table" style="margin:0; padding:0; border:none; border-radius:4px;" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding:6px; border-right:2px solid #e5e5e5">
                                    <div style="margin:0; padding:0; word-break:normal; text-align:right; color:#666; font-family:Consolas, monospace !important; line-height:130%">
                                        <div style="line-height:130%">1</div>
                                        <div style="line-height:130%">2</div>
                                        <div style="line-height:130%">3</div>
                                        <div style="line-height:130%">4</div>
                                        <div style="line-height:130%">5</div>
                                        <div style="line-height:130%">6</div>
                                        <div style="line-height:130%">7</div>
                                        <div style="line-height:130%">8</div>
                                        <div style="line-height:130%">9</div>
                                        <div style="line-height:130%">10</div>
                                        <div style="line-height:130%">11</div>
                                        <div style="line-height:130%">12</div>
                                        <div style="line-height:130%">13</div>
                                        <div style="line-height:130%">14</div>
                                        <div style="line-height:130%">15</div>
                                        <div style="line-height:130%">16</div>
                                        <div style="line-height:130%">17</div>
                                        <div style="line-height:130%">18</div>
                                        <div style="line-height:130%">19</div>
                                        <div style="line-height:130%">20</div>
                                        <div style="line-height:130%">21</div>
                                        <div style="line-height:130%">22</div>
                                        <div style="line-height:130%">23</div>
                                    </div>
                                </td>
                                <td style="padding:6px 0">
                                    <div style="margin:0; padding:0; color:#010101; font-family:Consolas, monospace !important; line-height:130%">
                                        <div style="padding:0 6px; white-space:pre; line-height:130%"><span style="color:#0099cc">let</span>&nbsp;user&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">=</span>&nbsp;me.astro.getUser();</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%"><span style="color:#ff3399">if</span>&nbsp;(user&nbsp;<span style="color:#ff3399">instanceof</span>&nbsp;me.astro.security.Account&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">&amp;</span><span style="color:#039C43"></span><span style="color:#ff3399">&amp;</span>&nbsp;user.isAvailable())&nbsp;{</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999999">//&nbsp;값&nbsp;불러오기</span></div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;user.getDataFromServer(<span style="color:#4caf50">"your_script_name___score"</span>,&nbsp;(code,&nbsp;value)&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">=</span><span style="color:#039C43"></span><span style="color:#ff3399">&gt;</span>&nbsp;{</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#ff3399">if</span>&nbsp;(code&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">=</span><span style="color:#039C43"></span><span style="color:#ff3399">=</span><span style="color:#039C43"></span><span style="color:#ff3399">=</span>&nbsp;me.astro.security.Account.GET_SUCCESS)&nbsp;{</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;clientMessage(value&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">+</span>&nbsp;<span style="color:#4caf50">"점"</span>);</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;});</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999999">//&nbsp;값&nbsp;수정하기</span></div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;user.modifyData(<span style="color:#4caf50">"your_script_name___score"</span>,&nbsp;<span style="color:#308ce5">123</span>);</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999999">//&nbsp;순위&nbsp;불러오기</span></div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;user.getRank(<span style="color:#4caf50">"your_script_name___score"</span>,&nbsp;(code,&nbsp;rank)&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">=</span><span style="color:#039C43"></span><span style="color:#ff3399">&gt;</span>&nbsp;{</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#ff3399">if</span>&nbsp;(code&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">=</span><span style="color:#039C43"></span><span style="color:#ff3399">=</span><span style="color:#039C43"></span><span style="color:#ff3399">=</span>&nbsp;me.astro.security.Account.GET_SUCCESS)&nbsp;{</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#ff3399">for</span>&nbsp;(<span style="color:#0099cc">let</span>&nbsp;i&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">=</span>&nbsp;<span style="color:#308ce5">0</span>,&nbsp;len&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">=</span>&nbsp;rank.<span style="color:#0086b3">length</span>;&nbsp;i&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">&lt;</span>&nbsp;len;&nbsp;i<span style="color:#039C43"></span><span style="color:#ff3399">+</span><span style="color:#039C43"></span><span style="color:#ff3399">+</span>)&nbsp;{</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;clientMessage(rank[i][<span style="color:#308ce5">0</span>]&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">+</span>&nbsp;<span style="color:#4caf50">":&nbsp;"</span>&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">+</span>&nbsp;rank[i][<span style="color:#308ce5">1</span>]&nbsp;<span style="color:#039C43"></span><span style="color:#ff3399">+</span>&nbsp;<span style="color:#4caf50">"점"</span>);</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;<span style="color:#ff3399">else</span>&nbsp;{</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;clientMessage(<span style="color:#4caf50">"Error:&nbsp;Failed&nbsp;to&nbsp;get&nbsp;data"</span>);</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;});</div>
                                        <div style="padding:0 6px; white-space:pre; line-height:130%">}</div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div><br>
                    Deneb에는 다음과 같은 장점이 있습니다.
                    <ul class="mdl-list">
                        <li class="mdl-list__item mdl-list__item--two-line">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-avatar">done</i>
                                <span>간단합니다</span>
                                <span class="mdl-list__item-sub-title">코드 몇 줄만으로 랭킹 시스템을 추가할 수 있습니다.</span>
                            </span>
                        </li>
                        <li class="mdl-list__item mdl-list__item--two-line">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-avatar">security</i>
                                <span>안전합니다</span>
                                <span class="mdl-list__item-sub-title">사용자의 정보에는 관리자만 접근할 수 있습니다.</span>
                            </span>
                        </li>
                        <li class="mdl-list__item mdl-list__item--two-line">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-avatar">money_off</i>
                                <span>무료입니다.</span>
                                <span class="mdl-list__item-sub-title">누구나 자유롭게 Deneb를 사용할 수 있습니다.</span>
                            </span>
                        </li>
                    </ul>
                    더 자세한 내용은 AstroLibrary 문서를 참고해주세요.<br><br>
                    <div style="text-align: right;">
                        <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" href="https://github.com/Astro36/AstroLibrary/blob/master/README.md">문서 바로가기</a>
                    </div>
                </div>
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--2-offset-desktop" id="user" style="padding: 0 24px 24px 24px;">
                    <h4>User</h4>
                    <div class="mdl-list__item mdl-list__item--two-line">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-avatar">person</i>
                            <?php
                                include_once 'library/User.php';
                                include_once 'library/UserData.php';
                                include_once 'library/UserUtils.php';

                                function getData($code, $key) {
                                    $id = UserUtils::findIdByCode($code);
                                    if ($id !== null) {
                                        $userData = new UserData($id);
                                        return $userData->get($key);
                                    }
                                    return null;
                                }

                                function setData($code, $key, $value) {
                                    $id = UserUtils::findIdByCode($code);
                                    if ($id !== null) {
                                        $userData = new UserData($id);
                                        $userData->set($key, $value);
                                    }
                                }

                                if (isset($_SESSION['user_code'])) {
                                    if (UserUtils::isUsedByOthers('user_code', $_SESSION['user_code'])) {
                                        $userCode = $_SESSION['user_code'];
                                        echo '<span>' . getData($userCode, 'name') . '(' . getData($userCode, 'id') . ')</span>';
                                        echo '<span class="mdl-list__item-sub-title">' . getData($userCode, 'email') . '</span>';
                                        $isLogin = true;
                                    } else {
                                        echo '<span>Error</span>';
                                        echo '<span class="mdl-list__item-sub-title">유효하지 않은 세션입니다.</span>';
                                        session_destroy();
                                        $isLogin = false;
                                    }
                                } else {
                                    echo '<span>로그인이 필요합니다.</span>';
                                    echo '<span class="mdl-list__item-sub-title">Deneb에 로그인 해주세요.</span>';
                                    $isLogin = false;
                                }
                            ?>
                        </span>
                    </div>
                    <div style="text-align: right;">
                    <?php
                        if ($isLogin) {
                            if (User::isAdmin($_SESSION['user_code'])) {
                                echo '<a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary" href="manager.php">Manager</a>';
                            }
                            echo '<a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary" href="logout.php">Logout</a><br>';
                        } else {
                            echo '<a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary" href="login.php">Login</a>';
                            echo '<a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary" href="sign_up.php">Sign Up</a><br>';
                        }
                    ?>
                    </div>
                </div>
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--4-col " style="padding: 0 24px 24px 24px">
                    <h4>Message Box</h4>
                    <ul class="demo-list-item mdl-list">
                        <?php
                            if ($isLogin) {
                                $messages = getData($userCode, 'messages');
                                if ($messages) {
                                    $messages = json_decode(getData($userCode, 'messages'), true);
                                } else {
                                    $messages = [];
                                    setData($userCode, 'messages', json_encode($messages));
                                }
                                foreach ($messages as $key => $value) {
                                    $message = json_decode($value, true);
                                    echo '<li class="mdl-list__item">';
                                    echo '<span class="mdl-list__item-primary-content">';
                                    echo '<h5>' . $message['from_name'] . '</h5>';
                                    echo '<span class="mdl-color-text--grey-700">' . $message['since'] . '</span><br>';
                                    echo $message['message'];
                                    echo '</span>';
                                    echo '</li>';
                                }
                                if (count($messages) === 0) {
                                    echo '<li class="mdl-list__item">';
                                    echo '<span class="mdl-list__item-primary-content">';
                                    echo '메세지가 없습니다.';
                                    echo '</span>';
                                    echo '</li>';
                                }
                            } else {
                                echo '<li class="mdl-list__item">';
                                echo '<span class="mdl-list__item-primary-content">';
                                echo '로그인이 필요한 작업입니다.';
                                echo '</span>';
                                echo '</li>';
                            }
                        ?>
                    </ul>
                </div>
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" style="padding: 0 24px 24px 24px">
                    <h4>Contact</h4>
                    기타 문의사항은 아래로 연락하십시오.<br><br>
                    <span class="mdl-chip mdl-chip--contact">
                        <span class="mdl-chip__contact mdl-color--primary mdl-color-text--white">A</span>
                        <a class="mdl-chip__text mdl-color-text--grey-800" href="https://t.me/psj1026" style="text-decoration: none;">Astro | Telegram</a>
                    </span>
                    <span class="mdl-chip mdl-chip--contact">
                        <span class="mdl-chip__contact mdl-color--primary-dark mdl-color-text--white">A</span>
                        <a class="mdl-chip__text mdl-color-text--grey-800" href="mailto:astr36@naver.com" style="text-decoration: none;">Astro | E-mail</a>
                    </span>
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
    <script defer src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        function scrollTo(id){
            $('html, body, div, main').stop().animate({scrollTop: $(id).offset().top}, 1000);
        }
    </script>
</body>

</html>