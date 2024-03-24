<?php
include($_SERVER['DOCUMENT_ROOT'] . "/LiteBase/LiteBase-1.0.php");

session_start();

?>


<!DOCTYPE html>
<html lang="tr" class="f-verdana bg-deep color-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiteBase Test</title>
    <link rel="stylesheet" href="https://litestyle.glitch.me/source/LiteStyle-1.0.css">
</head>

<body>
    <div class="group-down center">
        <div class="title-md">Hoşgeldin, <?php if (isset($_SESSION['username'])) {
                                                echo ucfirst($_SESSION['username']);
                                            } else {
                                                echo 'Misafir';
                                            } ?></div>

        <?php
        if (isset($_SESSION['username'])) {
            echo '
        <a href="script/logout.php"><button class="btn-danger center">Çıkış Yap</button></a>
        ';
        };
        if (!isset($_SESSION['username'])) {
            echo '
        <a href="signin.php"><button class="btn-success center">Giriş Yap</button></a>
        <a href="signup.php"><button class="btn-primary center">Kayıt Ol</button></a>
        ';
        };
        ?>

    </div>
    <?php
    if (isset($_GET['alert'])) {
        echo '<p class="alert">' . $_GET['alert'] . '</p>';
    };
    ?>
</body>

</html>
<?php

?>