    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <p><?php echo get_field('company_tagline', 'option'); ?></p>
                    <p class="footer-copyright">&copy; 2017 - <?php echo date('Y') ?> Bergen.Works</p>
                </div>

                <address class="col-12 col-sm-4 col-md-3 offset-md-1">
                    <?php
                        if($contact = get_field('contact_details', 'option')) {
                            if($email = $contact['email_address']) {
                                echo '<p class="footer-email"><a href="mailto:' . $email . '"><i class="fas fa-envelope fa-fw"></i>' . $email . '</a></p>';
                            }

                            if($phone = $contact['phone_number']) {
                                echo '<p class="footer-phone"><i class="fas fa-phone fa-fw"></i>' . $phone . '</p>';
                            }
                        }

                        if($address = get_field('address', 'option')) {
                            echo '<p class="footer-address">' . $address['street'] . ', <br>' . $address['postal_code'] . ' ' . $address['city'] . '</p>';
                        }
                    ?>
                </address>

                <div class="col-12 col-sm-4 col-md-3">
                    <?php if( $social_links = get_field('social_links', 'option') ) : ?>

                        <p class="footer-social-title">Follow us on:</p>
                        <div class="footer-social-container">

                        <?php
                        if($facebook = $social_links['facebook']) {
                            echo '<a class="footer-social-link" href="' . $facebook . '"><i class="fab fa-facebook-f fa-fw" title="Bergen.Works Facebook"></i></a>';
                        }

                        if($instagram = $social_links['instagram']) {
                            echo '<a class="footer-social-link" href="' . $instagram . '"><i class="fab fa-instagram fa-fw" title="Bergen.Works Instagram"></i></a>';
                        }

                        if($twitter = $social_links['twitter']) {
                            echo '<a class="footer-social-link" href="' . $twitter . '"><i class="fab fa-twitter fa-fw" title="Bergen.Works Twitter"></i></a>';
                        }

                        if($linkedin = $social_links['linkedin']) {
                            echo '<a class="footer-social-link" href="' . $linkedin . '"><i class="fab fa-linkedin-in fa-fw" title="Bergen.Works LinkedIn"></i></a>';
                        }
                    ?>
                    </div>
                    <?php endif; ?>

                </div>
            </div>

            <?php if( have_rows('sponsors', 'option') ): ?>
            <div class="row">
                <div class="col-12 footer-sponsors">
                    <h3 class="footer-sponsors-title">Our sponsors</h3>
                    <?php while( have_rows('sponsors', 'option') ): the_row();
                        if(get_sub_field('show_in_footer')) :
                            $name = get_sub_field('name');
                            $logo = get_sub_field('logo');
                            $link = get_sub_field('link');
                            ?>

                            <div class="footer-sponsor-container">
                                <a href="<?php echo $link ?>" title="<?php echo $name; ?>" target="_blank" rel="noopener">
                                    <img class="img-fluid" src="<?php echo $logo['url'] ?>" alt="<?php echo $name ?>, sponsor of Bergen.Works">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </footer>
    <?php wp_footer() ?>
</body>
</html>
