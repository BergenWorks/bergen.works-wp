<?php
// Template name: Members
?>

<?php get_header(); ?>

<?php if( have_posts() ) : the_post(); ?>
    <section class="content-section">
        <div class="container">

            <div class="row">
                <div class="col-12 col-sm-8 col-md-6">
                    <h2 class="section-title"><?php echo get_field('content_title') ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 offset-sm-2 offset-md-4">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php query_posts(['post_type' => 'members']); ?>
<?php if (have_posts()) : ?>

    <section class="members-content-section">
        <div class="container">
            <div class="row members-row">
                <?php
                    $post_count = wp_count_posts('members');
                    $counter = 1;
                ?>
                <?php while (have_posts()) : the_post(); ?>

                    <div class="col-12 col-sm-4 col-md-3">
                        <div class="member">
                            <a href="<?php echo get_field('member_url'); ?>" target="_blank" rel="noopener" class="member-link">
                                <p class="member-name"><?php the_title(); ?></p>
                                <p class="member-tagline"><?php echo get_field('member_tagline'); ?></p>
                            </a>
                        </div>
                    </div>

                    <?php
                        if($counter % 4 === 0 && $counter < $post_count->publish) {
                            echo '</div>';
                            echo '<div class="row members-row">';
                        }
                        $counter++;
                    ?>
                <?php endwhile;?>
            </div>
        </div>
    </section>

<?php endif;?>
<?php wp_reset_query(); ?>

<?php get_footer(); ?>
