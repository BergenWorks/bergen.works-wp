<?php
// Template name: Media page
?>

<?php get_header(); ?>

<?php if( have_posts() ) : the_post(); ?>

    <?php if( $images = get_field('img_gallery') ): ?>
    <section class="content-section container">
            <div class="grid">
                <div class="grid-sizer"></div>

                <?php foreach( $images as $image ): ?>
                    <div class="grid-item">
                        <img style="" src="<?php echo $image['sizes']['medium_large']; ?>" class="img-fluid">
                    </div>
                <?php endforeach; ?>
            </div>
    </section>
    <?php endif; ?>

    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script>
        var grid = document.querySelector('.grid');

        var msnry = new Masonry(grid, {
            "itemSelector": ".grid-item",
            "gutter": 10
        });

        imagesLoaded(grid).on( 'progress', function() {
            msnry.layout();
        });
    </script>

    <style>
        /**
        * Max-width is container width (1140) divided by 2 minus gutter (20)
        * Setting a < 100 percentage, or adding it to the img breaks responsiveness
        **/
        .grid-item {
            margin-bottom: 10px;
            max-width: 550px;
        }
    </style>

<?php endif;?>

<?php get_footer(); ?>
