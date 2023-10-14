<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../../build/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/27927b3bc2.js" crossorigin="anonymous"></script>

</head>

<body>

    <header id="menu_top">
        <div class="content_menu_top content-pages">
            <a class="logo" href="/index.php">
                <i class="fa-solid fa-book-open" style="color: #ffffff; font-size: 48px"></i>
                <span class="title-main">GOLDEN PAGES</span>
            </a>
            
            <?php 
            $current_url = $_SERVER['REQUEST_URI'];
            if(strpos($current_url, 'index.php')) {
            ?>
            
            <div class="buttons">
                <div class="btn-2">
                    <a href="/views/login.php">Iniciar Sesión</a>
                </div>
                <div class="btn-1">
                    <a href="/views/sign_up.php">Registrarse</a>
                </div>
            </div>

            <?php } ?>

        </div>
    </header>