<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head() ?>
</head>
<body>
    <?php get_template_part( 'parts/nav', 'main' ); ?>

    <?php
        if($header_img = get_field('frontpage_header_image')) {
            $bg_img = 'background:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(' . $header_img['url'] . ') no-repeat center center fixed';
        } else {
            $header_img = get_stylesheet_directory_uri() . '/assets/images/bergenworks-header-default.png';
            $bg_img = 'background:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(' . $header_img . ') no-repeat center center fixed';
        }
    ?>

    <div class="jumbotron jumbotron-fluid frontpage-header" style="<?php echo $bg_img; ?>; background-size: cover">
        <div class="container header-container">
            <?php if($header_title = get_field('frontpage_header_title')) : ?>
                <h1 class="frontpage-header-title"><?php echo $header_title ?></h1>
            <?php else : ?>
                <h1 class="frontpage-header-title">Coworking space in the heart of the city</h1>
            <?php endif; ?>
        </div>
    </div>
