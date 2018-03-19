<?php
// Template name: General
?>

<?php get_header(); ?>

<?php if( have_posts() ) : the_post(); ?>
    <section class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 offset-sm-2 offset-md-4">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>

<?php get_footer(); ?>
