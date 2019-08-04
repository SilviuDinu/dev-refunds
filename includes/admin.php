<?php
/**
 * Admin part.
 *
 * @package REFUNDS
 */

namespace REFUNDS;

/**
 * Class Admin
 *
 * @package REFUNDS
 */
class Admin {
	/**
	 * Admin constructor.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );
	}

	/**
	 * Add admin menu page.
	 *
	 * @hooked `admin_menu`
	 * @access public
	 * @return void
	 */
	public function admin_menu() {
		add_menu_page( __( 'Refunds App', 'my-vue-dashboard' ), __( 'Refunds App', 'my-vue-dashboard' ), 'manage_options', 'refunds-app', [ $this, 'plugin_page' ], 'dashicons-heart' );
	}

	/**
	 * Admin page render callback.
	 *
	 * @access public
	 * @return void
	 */
	public function plugin_page() {
		echo '<div class="refunds-wrap"><div id="refunds-app"></div></div>';
	}
}
