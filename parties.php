<?php
/*
Plugin Name: Parties Manager
Plugin URI: http://untitled-inc.com
Description: Declares a plugin that will create a custom post type displaying parties.
Version: 1.0
Author: Aleksey Ilyuchenko
Author URI: https://www.upwork.com/fl/ilyuchenkoalexey
License: MIT
*/

add_action( 'init', 'create_parties' );

function create_parties() {
    register_post_type( 'parties',
        array(
            'labels' => array(
                'name' => 'Parties',
                'singular_name' => 'Party',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Party',
                'edit' => 'Edit',
                'edit_item' => 'Edit Party',
                'new_item' => 'New Party',
                'view' => 'View',
                'view_item' => 'View Party',
                'search_items' => 'Search Parties',
                'not_found' => 'No Parties found',
                'not_found_in_trash' => 'No Parties found in Trash',
                'parent' => 'Parent Parties'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'parties.png', __FILE__ ),
            'has_archive' => true
        )
    );
}

function custom_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Title',
        'date' => 'Date',
        'featured_image' => 'Image',            
     );
    return $columns;
}
add_filter('manage_parties_posts_columns' , 'custom_columns');

function custom_columns_data( $column, $post_id ) {
    switch ( $column ) {
    case 'featured_image':
        the_post_thumbnail( [100,100] );
        break;
    }
}
add_action( 'manage_parties_posts_custom_column' , 'custom_columns_data', 10, 2 ); 




