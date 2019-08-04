<?php
/**
 * Assets handler.
 *
 * @package REFUNDS
 */

namespace REFUNDS;

/**
 * Class Assets
 *
 * @package REFUNDS
 */
class Assets {
	/**
	 * Assets handle.
	 *
	 * @var string
	 */
	private $handle = 'refunds-admin';

	/**
	 * Assets constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @hooked `admin_enqueue_scripts`
	 * @access public
	 * @return void
	 */
	public function enqueue_scripts() {
		$screen = get_current_screen();

		if ( ! isset( $screen->base ) || $screen->base !== 'toplevel_page_refunds-app' ) {
			return;
		}

		wp_register_style( $this->handle, REFUNDS_URL . 'assets/css/style.css', [], REFUNDS_VERSION );
		wp_enqueue_style( $this->handle );

		wp_register_script( $this->handle, REFUNDS_URL . 'assets/js/build.js', [], REFUNDS_VERSION, true );
		wp_localize_script( $this->handle, 'REFUNDS', $this->app_localization() );
		wp_enqueue_script( $this->handle );
	}

	/**
	 * Localize main application script.
	 *
	 * @access private
	 * @return array
	 */
	private function app_localization() {
		return [
			'strings' => [
				'title'       => 'Hello from VUE.JS',
				'description' => 'This text is passed through the REFUNDS localized object.',
			],
		];
	}
}
