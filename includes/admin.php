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
class Admin
{
    /**
     * Admin constructor.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        add_action('admin_menu', [$this, 'admin_menu']);
        add_action( 'admin_enqueue_scripts', [$this, 'load_refund_scripts'] );
    }

    /**
     * TODO: Add comment
     */
    public function load_refund_scripts(){
        $screen = get_current_screen();
        if( !isset( $screen->id ) ){
            return false;
        }
        if( $screen->id !== 'toplevel_page_refunds-app'){
            return false;
        }


        wp_enqueue_style( 'landing-style', plugin_dir_url(__DIR__) . 'style.css', false, '1.0.0' );
        wp_enqueue_script( 'show-table', plugin_dir_url(__DIR__) . 'assets/js/build.js', false, '1.0.0', false );

    }

    /**
     * Add admin menu page.
     *
     * @hooked `admin_menu`
     * @access public
     * @return void
     */
    public function admin_menu()
    {
        add_menu_page(__('Refunds App', 'my-vue-dashboard'), __('Refunds Manager', 'my-vue-dashboard'), 'manage_options', 'refunds-app', [$this, 'plugin_page'], '
dashicons-businessman');
//        add_submenu_page( 'refunds-app', 'Refund Records', 'Refund Records','manage_options', 'refund-records', [$this, 'plugin_subpage']);
    }

    /**
     * Admin page render callback.
     *
     * @access public
     * @return void
     */
    public function plugin_page()
    {
        echo '<div id="data-table"></div>';
    }

//    public function plugin_subpage()
//    {
//        echo '<div id="data-table"></div>';
//    }
}
