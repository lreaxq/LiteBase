
<!DOCTYPE html>
<html lang="tr" class="f-verdana bg-deep color-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiteBase Test</title>
    <link rel="stylesheet" href="https://litestyle.glitch.me/source/LiteStyle-1.0.css">
</head>
<body>
    <?php 
    if (isset($_GET['alert'])) {
        echo '<p class="alert">'.$_GET['alert'].'</p>';
    };
    ?>
    <div class="container-md">
    <div class="text=center">
    <form action="script/signup.php" method="post">
        <input type="text" name="username" placeholder="Kullanıcı adı">
        <input type="email" name="email" placeholder="Email adresi">
        <input type="password" name="password" placeholder="Sifre">
        <input type="submit" value="Gönder" class="btn-success">
    </form>
    </div>
    </div>
</body>
</html>