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

    <div class="jumbotron jumbotron-fluid frontpage-header">
        <div class="container header-container">
            <?php if($header_title = get_field('frontpage_header_title')) : ?>
                <h1 class="header-title"><?php echo $header_title ?></h1>
            <?php else : ?>
                <h1 class="header-title">Coworking space in the heart of the city</h1>
            <?php endif; ?>
        </div>
    </div>
