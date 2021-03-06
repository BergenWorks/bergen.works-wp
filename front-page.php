<?php get_header('frontpage'); ?>

    <section id="frontpage-intro" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6">
                    <h2 class="section-title"><?php echo get_field('frontpage_intro_title') ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 offset-sm-2 offset-md-4">
                    <?php
                        if( have_posts() ) {
                            the_post();
                            the_content();
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php if($divider_img = get_field('divider_image')) : ?>
    <section class="content-section">
        <div class="container">
            <?php $divider_srcset = wp_get_attachment_image_srcset($divider_img['id'], 'full'); ?>
            <img srcset="<?php echo $divider_srcset; ?>" alt="<?php echo $divider_img['alt']; ?>" class="img-fluid">

            <span class="caption"><?php echo get_field('divider_image_caption'); ?></span>
        </div>
    </section>
    <?php endif; ?>

    <section id="memberships" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title"><?php echo get_field('memberships_title') ?></h2>
                </div>
            </div>

            <div class="row memberships-row">
                <div class="col-12 col-sm-10 col-md-8 offset-sm-2 offset-md-4">
                    <?php echo get_field('memberships_content') ?>
                </div>
            </div>

            <?php query_posts(['post_type' => 'memberships']); ?>
            <?php if (have_posts()) : ?>
                <div class="row memberships-row">

                <?php while (have_posts()) : the_post();?>

                    <?php if(get_field('visible')) : ?>
                        <div class="membership">
                            <h3 class="membership-title"><?php the_title() ?></h3>
                            <span class="membership-price"><?php echo get_field('price'); ?></span>
                            <div class="membership-content">
                                <?php the_content() ?>
                            </div>

                            <?php $thumb_srcset = wp_get_attachment_image_srcset(get_post_thumbnail_id(), 'large'); ?>
                            <img class="img-fluid membership-img" srcset="<?php echo $thumb_srcset; ?>" alt="">
                        </div>
                    <?php endif; ?>

                <?php endwhile;?>

                </div>
            <?php endif;?>
            <?php wp_reset_query(); ?>

            <div class="row">
                <div class="col-12 memberships-cta">
                    <?php if($memberships_form = get_field('memberships_form')) : ?>

                        <h2 class="memberships-cta-text"><?php echo get_field('memberships_cta') ?></h2>
                        <div class="memberships-cta-form">
                            <?php echo do_shortcode($memberships_form); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
