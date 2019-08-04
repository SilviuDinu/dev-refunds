<?php
/**
 * Handles the rest API routes.
 *
 * @package REFUNDS
 */

namespace REFUNDS;

/**
 * Class Rest
 *
 * @package REFUNDS
 */
class Rest {

	/**
	 * Rest api namespace.
	 *
	 * @access private
	 * @var string Namespace.
	 */
	private $namespace;

	/**
	 * Rest constructor.
	 */
	public function __construct() {
		$this->namespace = 'refunds/v1';
		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
	}

	/**
	 * Register rest routes.
	 *
	 * @access public
	 * @hooked `rest_api_init`
	 * @return void
	 */
	public function register_routes() {}
}
