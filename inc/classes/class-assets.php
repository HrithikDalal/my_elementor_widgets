<?php
/**
 * Assets class.
 *
 * @package hrithik-features
 */

namespace Hrithik\Features\Inc;

use Hrithik\Features\Inc\Traits\Singleton;

/**
 * Class Assets
 */
class Assets {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * To setup action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		/**
		 * Action
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );

		add_action( 'elementor/frontend/before_enqueue_scripts', [ $this, 'enqueue_elementor_custom_scripts' ] );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_elementor_editor_scripts' ] );

	}

	/**
	 * Enqueue Elementor Common Scripts.
	 */
	public function enqueue_elementor_custom_scripts() {

		$this->register_script( 'hrithik-elementor-common-js', 'build/js/elementor-widgets-common.js', [ 'elementor-frontend' ], HRITHIK_FEATURES_VERSION, true );
		wp_enqueue_script( 'hrithik-elementor-common-js' );

	}

	/**
	 * Enqueue Elementor Editor Scripts.
	 */
	public function enqueue_elementor_editor_scripts() {

		/**
		 * $this->register_script( 'hrithik-elementor-editor-js', 'build/js/hrithik-elementor-editor.js', [ 'elementor-editor' ], '1.0.0', true );
		 * wp_enqueue_script( 'hrithik-elementor-editor-js' );
		 */

	}

	/**
	 * To enqueue scripts and styles.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {

		$this->register_style( 'hrithik-elementor-common-styles', 'build/css/elementor-widgets-common.css' );
		wp_enqueue_style( 'hrithik-elementor-common-styles' );

	}

	/**
	 * To enqueue scripts and styles. in admin.
	 *
	 * @param string $hook_suffix Admin page name.
	 *
	 * @return void
	 */
	public function admin_enqueue_scripts( $hook_suffix ) {}

	/**
	 * Register a new script.
	 *
	 * @param string           $handle    Name of the script. Should be unique.
	 * @param string|bool      $file       script file, path of the script relative to the assets/build/ directory.
	 * @param array            $deps      Optional. An array of registered script handles this script depends on. Default empty array.
	 * @param string|bool|null $ver       Optional. String specifying script version number, if not set, filetime will be used as version number.
	 * @param bool             $in_footer Optional. Whether to enqueue the script before </body> instead of in the <head>.
	 *                                    Default 'false'.
	 * @return bool Whether the script has been registered. True on success, false on failure.
	 */
	public function register_script( $handle, $file, $deps = [], $ver = false, $in_footer = true ) {
		$src     = sprintf( HRITHIK_FEATURES_URL . '/assets/%s', $file );
		$version = $this->get_file_version( $file, $ver );

		return wp_register_script( $handle, $src, $deps, $version, $in_footer );
	}

	/**
	 * Register a CSS stylesheet.
	 *
	 * @param string           $handle Name of the stylesheet. Should be unique.
	 * @param string|bool      $file    style file, path of the script relative to the assets/build/ directory.
	 * @param array            $deps   Optional. An array of registered stylesheet handles this stylesheet depends on. Default empty array.
	 * @param string|bool|null $ver    Optional. String specifying script version number, if not set, filetime will be used as version number.
	 * @param string           $media  Optional. The media for which this stylesheet has been defined.
	 *                                 Default 'all'. Accepts media types like 'all', 'print' and 'screen', or media queries like
	 *                                 '(orientation: portrait)' and '(max-width: 640px)'.
	 *
	 * @return bool Whether the style has been registered. True on success, false on failure.
	 */
	public function register_style( $handle, $file, $deps = [], $ver = false, $media = 'all' ) {
		$src     = sprintf( HRITHIK_FEATURES_URL . '/assets/%s', $file );
		$version = $this->get_file_version( $file, $ver );

		return wp_register_style( $handle, $src, $deps, $version, $media );
	}

	/**
	 * Get file version.
	 *
	 * @param string             $file File path.
	 * @param int|string|boolean $ver  File version.
	 *
	 * @return bool|false|int
	 */
	public function get_file_version( $file, $ver = false ) {

		if ( ! empty( $ver ) ) {
			return $ver;
		}

		$file_path = sprintf( '%s/%s', HRITHIK_FEATURES_ASSETS_DIR, $file );

		return file_exists( $file_path ) ? filemtime( $file_path ) : false;

	}

}
