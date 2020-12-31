<?php
/**
 * Register Example post type.
 *
 * @package hrithik-features
 */

namespace Hrithik\Features\Inc\Post_Types;

/**
 * Class Post_Type_Example
 */
class Post_Type_Example extends Base {

	/**
	 * Slug of post type.
	 *
	 * @var string
	 */
	const SLUG = 'post-type-slug';

	/**
	 * Post type label for internal uses.
	 *
	 * @var string
	 */
	const LABEL = 'Post Type Label';

	/**
	 * To get list of labels for post type.
	 *
	 * @return array
	 */
	public function get_labels() {

		return [
			'name'               => _x( 'Post_Type_Label', 'post type general name', 'hrithik-features' ),
			'singular_name'      => _x( 'Post_Type_Label', 'post type singular name', 'hrithik-features' ),
			'menu_name'          => _x( 'Post_Type_Label', 'admin menu', 'hrithik-features' ),
			'name_admin_bar'     => _x( 'Post_Type_Label', 'add new on admin bar', 'hrithik-features' ),
			'add_new'            => _x( 'Add New', 'post', 'hrithik-features' ),
			'add_new_item'       => __( 'Add New Post_Type_Label', 'hrithik-features' ),
			'new_item'           => __( 'New Post_Type_Label', 'hrithik-features' ),
			'edit_item'          => __( 'Edit Post_Type_Label', 'hrithik-features' ),
			'view_item'          => __( 'View Post_Type_Label', 'hrithik-features' ),
			'all_items'          => __( 'All Post_Type_Label', 'hrithik-features' ),
			'search_items'       => __( 'Search Post_Type_Label', 'hrithik-features' ),
			'parent_item_colon'  => __( 'Parent Post_Type_Label:', 'hrithik-features' ),
			'not_found'          => __( 'No Post_Type_Label found.', 'hrithik-features' ),
			'not_found_in_trash' => __( 'No Post_Type_Label found in Trash.', 'hrithik-features' ),
		];

	}

}
