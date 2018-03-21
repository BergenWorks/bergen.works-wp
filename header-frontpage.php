<!DOCTYPE html>
<html lang="en">
<head>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5XGQ55C');</script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head() ?>
</head>
<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5XGQ55C"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <?php get_template_part( 'parts/nav', 'main' ); ?>

    <?php
        if($header_img = get_field('frontpage_header_image')) {
            $bg_img = 'background:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(' . $header_img['url'] . ') no-repeat center center fixed';
        } else {
            $header_img = get_stylesheet_directory_uri() . '/assets/images/bergenworks-header-default.png';
            $bg_img = 'background:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(' . $header_img . ') no-repeat center center fixed';
        }
    ?>

    <div class="jumbotron jumbotron-fluid header frontpage-header" style="<?php echo $bg_img; ?>; background-size: cover">
        <div class="container header-container">
            <?php if($header_title = get_field('frontpage_header_title')) : ?>
                <h1 class="header-title"><?php echo $header_title ?></h1>
            <?php else : ?>
                <h1 class="header-title">Coworking space in the heart of the city</h1>
            <?php endif; ?>
        </div>
    </div>
