<?php

    register_nav_menus( array(
        'main_menu' => 'Main navigation menu'
    ));
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );

    function clean_wp_head() {
        remove_action( 'wp_head', 'feed_links_extra', 3 );
        remove_action( 'wp_head', 'feed_links', 2 );
        remove_action( 'wp_head', 'rsd_link' );
        remove_action( 'wp_head', 'wlwmanifest_link' );
        remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
        remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
        remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
        remove_action( 'wp_head', 'wp_generator' );
        remove_action( 'wp_head', 'wp_shortlink_wp_head');
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
    }
    add_action('init', 'clean_wp_head');
    remove_action('wp_head', 'wp_generator');

    function enqueue_scripts() {
        $assets = get_template_directory_uri() . '/assets/';

        wp_register_style( 'typekit', 'https://use.typekit.net/pln1gys.css', '', '', '' );
        //wp_register_style( 'font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', '', '', '' );
        wp_register_style( 'bootstrap_css', $assets . 'css/vendor/bootstrap.min.css', '', '', ''  );
        wp_register_style( 'main', $assets . 'css/main.min.css', '', '', '' );

        wp_enqueue_style( 'typekit' );
        //wp_enqueue_style( 'font_awesome' );
        wp_enqueue_style( 'bootstrap_css' );
        wp_enqueue_style( 'main' );

        // Move jQuery to the footer
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
        wp_enqueue_script( 'jquery' );

        wp_register_script( 'fontAwesome', 'https://use.fontawesome.com/releases/v5.0.6/js/all.js', '', true );
        wp_register_script( 'bootstrap_js', $assets . 'js/vendor/bootstrap.bundle.min.js', array('jquery'), '', true );
        wp_register_script( 'core', $assets . 'js/core.min.js', array('jquery'), '', true );

        wp_enqueue_script( 'fontAwesome' );
        wp_enqueue_script( 'bootstrap_js' );
        wp_enqueue_script( 'core' );
    }
    add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

    require( get_template_directory() . '/parts/bootstrap-navwalker.php' );

    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title'    => 'General website options',
            'menu_title'    => 'General Options',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position'      => 59.9,
            'icon_url'      => 'dashicons-edit'
        ));
    }

    /**
     * The media page is for a gallery, we do not need the WP editor there
     */
    function hide_editor() {
        $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
        if(!isset($post_id)) { return; }

        $template_file = get_post_meta($post_id, '_wp_page_template', true);
        if($template_file == 'page-media.php'){ // the filename of the page template
            remove_post_type_support('page', 'editor');
        }
    }
    add_action( 'admin_init', 'hide_editor' );

    // Move Yoast to bottom
    function yoasttobottom() {
        return 'low';
    }
    add_filter( 'wpseo_metabox_prio', 'yoasttobottom');