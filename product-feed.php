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
        'show_in_rest'  => true,

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
    wp_nonce_field(basename(__FILE__), 'feed_category_nonce');
    include('meta_box.php');
}

add_action('save_post', function($post_id) {
    if(!isset($_POST["feed_category_nonce"])|| !wp_verify_nonce($_POST["feed_category_nonce"], basename(__FILE__)))
        return $post_id;

    $new_meta_value = (isset($_POST['feed_category']) ? sanitize_html_class($_POST['feed_category']) : '');
    $meta_key = "feed_category";
    $meta_value = get_post_meta($post_id, $meta_key, true);

    if($new_meta_value && $meta_value == '')
        add_post_meta($post_id, $meta_key, $new_meta_value);

    elseif($new_meta_value && $new_meta_value != $meta_value)
        update_post_meta($post_id, $meta_key, $new_meta_value);
});
