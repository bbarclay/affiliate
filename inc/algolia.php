<?php

/**
 * @param bool    $should_index
 * @param WP_Post $post
 *
 * @return bool
 */

function exclude_post_types( $should_index, WP_Post $post )
{
    // Add all post types you don't want to make searchable.
    $excluded_post_types = array( 'mybb_todo' );
    if ( false === $should_index ) {
        return false;
    }

    return ! in_array( $post->post_type, $excluded_post_types, true );
}

add_filter( 'algolia_should_index_searchable_post', 'exclude_post_types', 10, 2 );


/**
 * Dequeue default Algolia styles.
 */
function cascade_dequeue_algolia_styles() {
	wp_enqueue_script( 'cascade-search', get_template_directory_uri() . '/js/search.js', array( 'algolia-instantsearch', 'jquery' ), false, true );
	wp_dequeue_style( 'algolia-instantsearch' );
}
add_action( 'wp_enqueue_scripts', 'cascade_dequeue_algolia_styles', 99 );
