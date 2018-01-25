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

    <div class="jumbotron jumbotron-fluid header">
        <div class="container header-container">
            <h1 class="header-title"><?php the_title(); ?></h1>
        </div>
    </div>
