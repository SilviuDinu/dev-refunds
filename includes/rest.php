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
class Rest
{

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
    public function __construct()
    {
        $this->namespace = 'refunds/v1';

        add_action('rest_api_init', [$this, 'register_routes']);
    }

    /**
     * Register rest routes.
     *
     * @access public
     * @hooked `rest_api_init`
     * @return void
     */
    public function register_routes()
    {

        /**
         * Shop infinite scroll endpoint.
         */
        register_rest_route(
            $this->namespace,
            '/register_refunds',
            array(
                'methods' => \WP_REST_Server::CREATABLE,
                'callback' => array($this, 'register_refunds'),
                'args' => array(),
            )
        );
    }

    /**
     * TODO:Add comment
     */
    public function register_refunds()
    {
        $data = $_POST['date'];
        $produs = $_POST['products'];
        $type = $_POST['type_of_refund'];
        $ticket = $_POST['ticket'];
        $reason = $_POST['refund-reason'];
        $feedback = $_POST['feedback'];
        $github = $_POST['github'];

       // echo $data . '<br>' . $produs . '<br>' . $type . '<br>' . $ticket . '<br>' . $reason . '<br>' . $feedback . '<br>' . $github;

        if (isset($_POST['submit'])) {
            register_activation_hook ( __FILE__, 'on_activate' );

            function on_activate() {
                global $wpdb;
                $create_table_query = "
            CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}refund_records` (
              `id` bigint(20) unsigned NOT NULL default '0',
              `name` text NOT NULL,
              `address` text NOT NULL
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
    ";
                require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
                dbDelta( $create_table_query );
            }
        }


    }
}

