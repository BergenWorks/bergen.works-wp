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
        if($header_img = get_the_post_thumbnail('full')) {
            $bg_img = 'background:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(' . $header_img['url'] . ') no-repeat center center fixed';
        } else {
            $header_img = get_stylesheet_directory_uri() . '/assets/images/bergenworks-header-default.png';
            $bg_img = 'background:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(' . $header_img . ') no-repeat center center fixed';
        }
    ?>

    <div class="jumbotron jumbotron-fluid header" style="<?php echo $bg_img; ?>; background-size: cover">
        <div class="container header-container">
            <h1 class="header-title"><?php the_title(); ?></h1>
        </div>
    </div>
