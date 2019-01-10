<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.min.css">

    <?php wp_head();
    ?>
</head>

<body data-spy="scroll" data-target=".mynavbar" data-offset="60" <?php body_class(); ?>>

<nav class="mynavbar navbar sticky-top navbar-expand-lg">
    <img src="" alt="main logo">
    <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <div class="container" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="d-flex navbar-nav ml-auto">
            <?php

            if(is_front_page() || is_home()){

                wp_nav_menu(array('theme_location' => 'header-menu',     'container'       => false,
                    'echo'            => false,
                    'items_wrap'      => '%3$s',
                    'depth'           => 0));

            }else{

                wp_nav_menu(array('theme_location' => 'portfolio-menu',     'container'       => false,
                    'echo'            => false,
                    'items_wrap'      => '%3$s',
                    'depth'           => 0));

            }

            $menuParameters = array(
                'container'       => false,
                'echo'            => false,
                'items_wrap'      => '%3$s',
                'depth'           => 0,
                'walker'  => new Walker_Quickstart_Menu()
            );

            echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' ); ?>
        </div>
    </div>
</nav>


