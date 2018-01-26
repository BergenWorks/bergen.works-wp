<nav class="navbar navbar-expand-md fixed-top nav-main">
    <div class="container">
        <a href="<?php echo home_url(); ?>" class="navbar-brand">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/bergenworks-logo-white.png' ?>" alt="" class="navbar-logo">
        </a>

        <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#main-menu-content"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="main-menu-content">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'menu_id' => 'main-menu',
                    'container' => false,
                    'depth' => 2,
                    'menu_class' => 'navbar-nav ml-auto',
                    'walker' => new Bootstrap_NavWalker(),
                    'fallback_cb' => 'BootStrap_NavWalker::fallback'
                ));
            ?>
        </div>
    </div>
</nav>
