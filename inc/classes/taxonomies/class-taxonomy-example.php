<?php
/**
 * To register custom taxonomy.
 *
 * @package hrithik-features
 */

namespace Hrithik\Features\Inc\Taxonomies;

/**
 * Class Taxonomy_Example
 */
class Taxonomy_Example extends Base {

	/**
	 * Slug of taxonomy.
	 *
	 * @var string
	 */
	const SLUG = 'taxonomy-slug';

	/**
	 * Labels for taxonomy.
	 *
	 * @return array
	 */
	public function get_labels() {

		return [
			'name'                       => _x( 'Taxonomy_Example', 'taxonomy general name', 'hrithik-features' ),
			'singular_name'              => _x( 'Taxonomy_Example', 'taxonomy singular name', 'hrithik-features' ),
			'search_items'               => __( 'Search Taxonomy_Example', 'hrithik-features' ),
			'popular_items'              => __( 'Popular Taxonomy_Example', 'hrithik-features' ),
			'all_items'                  => __( 'All Taxonomy_Example', 'hrithik-features' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Taxonomy_Example', 'hrithik-features' ),
			'update_item'                => __( 'Update Taxonomy_Example', 'hrithik-features' ),
			'add_new_item'               => __( 'Add New Taxonomy_Example', 'hrithik-features' ),
			'new_item_name'              => __( 'New Taxonomy_Example Name', 'hrithik-features' ),
			'separate_items_with_commas' => __( 'Separate Taxonomy_Example with commas', 'hrithik-features' ),
			'add_or_remove_items'        => __( 'Add or remove Taxonomy_Example', 'hrithik-features' ),
			'choose_from_most_used'      => __( 'Choose from the most used Taxonomy_Example', 'hrithik-features' ),
			'not_found'                  => __( 'No Taxonomy_Example found.', 'hrithik-features' ),
			'menu_name'                  => __( 'Taxonomy_Example', 'hrithik-features' ),
		];

	}

	/**
	 * List of post types for taxonomy.
	 *
	 * @return array
	 */
	public function get_post_types() {

		return [
			'post',
		];

	}

}
