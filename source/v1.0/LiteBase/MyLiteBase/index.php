<?php
include('../LiteBase-1.0.php');
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'tr';
}

if ($_SESSION['lang'] == 'tr') {
    include('../lang/tr.php');
}
if ($_SESSION['lang'] == 'en') {
    include('../lang/en.php');
}
if ($_SESSION['lang'] == 'nl') {
    include('../lang/nl.php');
}
if ($_SESSION['lang'] == 'ru') {
    include('../lang/ru.php');
}

?>

<!DOCTYPE html>
<html lang="tr" class="f-verdana bg-deep color-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLiteBase</title>
    <link rel="stylesheet" href="https://litestyle.glitch.me/source/LiteStyle-1.0.css">
    <script src="https://kit.fontawesome.com/c833e0a5b1.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['mylitebase_auth'])) {
        if (!isset($_POST['pass'])) {
            echo '<div class="m-auto width-50">
            <form action="" method="post">';
            if (isset($_GET["alert"])) {
                echo "<p>" . $_GET["alert"] . "</p>";
            }
            echo '
            <input type="password" name="pass" placeholder="' . $text1 . '">
            <input type="submit" value="' . $text2 . '" class="btn-success">
        </form>
    </div>';
            include('assets/setlang.php')
    ?>

    <?php

            die();
        } else {
            $sonuc = litebase_get('litebase_main', 'password', 0);
            $mylitebase_password = explode(' ', $sonuc)[1];
            if ($_POST['pass'] != $mylitebase_password) {
                header('location: index.php?alert=' . $err002);
                die();
            } else {
                // Post verilerini temizle
                unset($_POST);
                // Oturum başlat
                $_SESSION['mylitebase_auth'] = true;
            }
        }
    }
    if (!isset($_SESSION['mylitebase_auth'])) {
        unset($_POST['pass']);
    }

    if (isset($_GET['table'])) {
        $table = $_GET['table'];
    }


    ?>












    <div class="navbar bg-dark height-1">
        <div class="group-left mt-auto">
            <a href="index.php" class="color-white pl-2"><?php echo $text3; ?></a>
            <a href="script/signout.php" class="color-white pl-2"><?php echo $text4; ?></a>
        </div>
    </div>

    <div class="container-max text-center">
        <div class="group-center">
            <div class='p-2 center width-50'>
                <form action="" method="get">
                    <p class="title-md"><?php echo $text5; ?></p>
                    <div class="code-dark">
                        <?php
                        $sonuc = litebase_dump_bases();
                        $tables = $sonuc;
                        foreach ($sonuc as $base) {

                            if (strlen($base) > 3) {
                                $base_name = substr($base, 0, -3);
                                echo '<a class="m-2 color-white" href="?table=' . $base_name . '">' . $base_name . '</a>';
                            }
                        }
                        ?>
                    </div>
                </form>
            </div>
            <div class='p-2 width-50'>
                <form action="script/dump.php" method="get">
                    <p class="title-md"><?php echo $text6; ?></p>
                    <input type="text" name="table" placeholder="<?php echo $text9; ?>" value="<?php echo $table; ?>">
                    <div class="code-dark">
                        <?php
                        if (isset($table)) {
                            $dump = litebase_dump($table);
                            foreach ($dump as $value) {
                                echo $value . '<br>';
                            }
                        }

                        if (isset($_GET['dump'])) {
                            $dump = $_GET['dump'];
                            foreach ($dump as $value) {
                                echo $value . '<br>';
                            }
                        }
                        ?>
                    </div>
                    <input type="submit" value="<?php echo $text8; ?>">
                </form>
            </div>
            <div class='p-2 width-50'>
                <form action="script/insert.php" method="get">
                    <p class="title-md"><?php echo $text7; ?></p>
                    <input type="text" name="table" placeholder="<?php echo $text9; ?>" value="<?php echo $table; ?>">
                    <input type="text" name="data" placeholder="<?php echo $text15; ?>">
                    <input type="submit" value="<?php echo $text8; ?>">
                </form>
            </div>
            <div class='p-2 width-50'>
                <form action="script/get.php" method="get">
                    <p class="title-md"><?php echo $text16; ?></p>
                    <input type="text" id="table" name="table" placeholder="<?php echo $text9; ?>" value="<?php echo $table; ?>">
                    <input type="text" name="word" id="word" placeholder="<?php echo $text10; ?>">
                    <input type="text" name="col" id="col" placeholder="<?php echo $text11; ?>">

                    <div class="code-dark">
                        <?php
                        if (isset($_GET['get'])) {
                            $dump = $_GET['get'];
                            echo $dump;
                        }
                        ?>
                    </div>
                    <input type="submit" name="find" value="<?php echo $text13; ?>">
                    <input type="submit" name="delete" value="<?php echo $text14; ?>">
                </form>
            </div>

        </div>
    </div>
    </div>
    <?php
    include('assets/setlang.php')
    ?>
</body>

</html>