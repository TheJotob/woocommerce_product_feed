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
        'public'    => true,
        'label'     => "Feeds"
    ];
    register_post_type('feed', $args);
});
