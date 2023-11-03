<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="build/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/27927b3bc2.js" crossorigin="anonymous"></script>

</head>

<body>

    <header id="menu_top">
        <div class="content-pages content_menu_top">

            <!-- item 1 - logo-->
            <div class="item_menu_top">
                <a class="logo" href="/">
                    <i class="fa-solid fa-book-open" style="color: #ffffff; font-size: 48px"></i>
                    <span class="title-main m-izq-10">GOLDEN PAGES</span>
                </a>
            </div>
            
            <!-- item 2 - opciones-->
            <?php 
            $current_url = $_SERVER['REQUEST_URI'];
            if($current_url === '/') {
                if(isset($_SESSION['login'])) {

                    ?>
                    <!-- <div class="btn-1 m-izq-10">
                        <a href="/logout">
                            Cerrar sesión
                        </a>
                    </div> -->
                    <?php

                    // debuguear($_SESSION['rol']);

                    if($_SESSION['rol'] === '1'){ ?>

                        <div class="item_menu_top">
                            <div class="btn-2">
                                <a href="/login">
                                    <?php echo 'Administrador'; ?>
                                </a>
                            </div>
                            <div class="btn-1 m-izq-10">
                                <a href="/logout">
                                    Cerrar sesión
                                </a>
                            </div>
                        </div>

                    <?php    
                    }

                    if($_SESSION['rol'] === '2'){ ?>

                        <div class="item_menu_top">
                            <div class="btn-2">
                                <a href="/login">
                                    <?php echo 'editor'; ?>
                                </a>
                            </div>
                            <div class="btn-1 m-izq-10">
                                <a href="/logout">
                                    Cerrar sesión
                                </a>
                            </div>
                        </div>
                    
                    <?php
                    }

                    if($_SESSION['rol'] === '3') { ?>

                        <div class="item_menu_top">
                            <div class="btn-2">
                                <a href="/login">
                                    <?php echo 'Cliente'; ?>
                                </a>
                            </div>
                            <div class="btn-1 m-izq-10">
                                <a href="/logout">
                                    Cerrar sesión
                                </a>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

                    


                <?php    
                } else { ?>
                    <div class="item_menu_top">
                        <div class="btn-2">
                            <a href="/login">
                                Iniciar sesión
                            </a>
                        </div>
                        <div class="btn-1 m-izq-10">
                            <a href="/registrarse">
                                Registrarse
                            </a>
                        </div>
                    </div>
                <?php
                }
            } ?>

            <!-- fin menu -->
        </div>
    </header>

    <div class="content-pages body">
        <div id="main-start">
                <?php echo $contenido; ?>        
        </div>
    </div>

   