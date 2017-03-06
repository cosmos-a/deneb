<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
    <?php
        include_once '../lib/UserUtils.php';

        session_start();

        if (isset($_SESSION['user_code'])) {
            if (UserUtils::isUsedByOthers('user_code', $_SESSION['user_code'])) {
                session_destroy();
            }
        }

        echo '<script type="text/javascript">location.href="index.php";</script>';
    ?>
</body>

</html>