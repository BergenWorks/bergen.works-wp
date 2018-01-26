<?php get_header('frontpage'); ?>

    <section id="frontpage-intro">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6">
                    <h2><?php echo get_field('frontpage_intro_title') ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 offset-sm-2 offset-md-4">
                    <?php echo get_field('frontpage_intro_content') ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
