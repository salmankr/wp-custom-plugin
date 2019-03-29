<?php
/**
 * @package customPlugin
 */

namespace Inc\components\CPT\Review;

class review{

	/**
	 * CPT function
	 * @return ...
	 */
    public function post(){
    	$labels = array(
    		'name'               => __( 'Reviews', 'text-domain' ),
    		'singular_name'      => __( 'Review', 'text-domain' ),
    		'add_new'            => _x( 'Add Review', 'text-domain', 'text-domain' ),
    		'add_new_item'       => __( 'Add New Review', 'text-domain' ),
    		'edit_item'          => __( 'Edit Review', 'text-domain' ),
    		'new_item'           => __( 'New Review', 'text-domain' ),
    		'view_item'          => __( 'View Review', 'text-domain' ),
    		'search_items'       => __( 'Search Reviews', 'text-domain' ),
    		'not_found'          => __( 'No Reviews Found', 'text-domain' ),
    		'not_found_in_trash' => __( 'No Reviews found in Trash', 'text-domain' ),
    		'parent_item_colon'  => __( 'Parent Review:', 'text-domain' ),
    		'menu_name'          => __( 'Reviews', 'text-domain' ),
    	);

    	$args = array(
			'labels'              => $labels,
			'hierarchical'        => false,
			'description'         => 'description',
			'taxonomies'          => array('category'),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => null,
			'menu_icon'           => null,
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'supports'            => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				// 'excerpt',
				// 'custom-fields',
				// 'trackbacks',
				// 'comments',
				'revisions',
				'page-attributes',
				'post-formats',
			),
		);
        register_post_type( 'review-post',  $args );
    }

    /**
     * register CPT
     * @return ...
     */
    public function register(){
    	add_action('init', array($this, 'post'));
    }
}