<?php

/*
Plugin Name: Product Feeds
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: Laitenberger Eckerlin
Author URI: http://laitenberger-eckerlin.de
License: A "Slug" license name e.g. GPL2
*/

// Register Feed Post Type
add_action('init', function() {
    $args = [
        'public'        => true,
        'label'         => "Feeds",
        'supports'      => [],
        'show_in_rest'  => true
    ];
    register_post_type('feed', $args);
});

add_action('add_meta_boxes', function() {
    add_meta_box('merchant_feed_settings', "Feed Settings", 'feeds_display_meta_box');
});

function feeds_display_meta_box($post) {
    $categories = get_terms([
        'taxonomy'      => 'product_cat',
        'hide_empty'    => true
    ]);
    include('meta_box.php');
}

add_action('save_post', function($post_id) {
    error_log("TEST");
});
