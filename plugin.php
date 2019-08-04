<?php
/**
 * Plugin Name: Refunds
 * Description: A Vue.js WordPress plugin for keeping data related to ThemeIsle refunds
 * Version: 0.0.1
 * Author: Silviu Dinu
 * Author URI: https://themeisle.com
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: my-vue-dashboard
 * Domain Path: /languages
 *
 * @package REFUNDS
 */

namespace REFUNDS;

/**
 * Class Plugin
 *
 * @package REFUNDS
 */
final class Plugin {

	/**
	 * Plugin version.
	 *
	 * @access public
	 * @var string
	 */
	private $version = '0.0.1';

	/**
	 * Plugin entities array.
	 *
	 * Contains plugin components instances.
	 *
	 * @access private
	 * @var array
	 */
	private $entities = [];

	/**
	 * Get plugin instance
	 *
	 * @access public
	 * @return Plugin
	 */
	public static function get_instance() {
		static $instance = false;
		if ( ! $instance ) {
			$instance = new Plugin();
			$instance->define_constants();
			$instance->run();
		}

		return $instance;
	}

	/**
	 * Define the plugins constants.
	 *
	 * @access public
	 * @return void
	 */
	public function define_constants() {
		define( 'REFUNDS_VERSION', $this->version );
		define( 'REFUNDS_FILE', __FILE__ );
		define( 'REFUNDS_PATH', dirname( REFUNDS_FILE ) );
		define( 'REFUNDS_INCLUDES', REFUNDS_PATH . '/includes' );
		define( 'REFUNDS_URL', trailingslashit( plugins_url( '', REFUNDS_FILE ) ) );
	}

	/**
	 * Initialize the plugins main components.
	 *
	 * @access private
	 * @return void
	 */
	private function run() {
		require_once REFUNDS_INCLUDES . '/admin.php';
		require_once REFUNDS_INCLUDES . '/rest.php';
		require_once REFUNDS_INCLUDES . '/assets.php';

		$this->entities['admin']  = new Admin();
		$this->entities['server'] = new Rest();
		$this->entities['assets'] = new Assets();
	}

	/**
	 * Get plugin version.
	 *
	 * @access public
	 * @return string
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Get plugin components instances.
	 *
	 * @access public
	 * @return array
	 */
	public function get_components() {
		return $this->entities;
	}
}

Plugin::get_instance();
