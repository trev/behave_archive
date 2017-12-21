<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.a07.com.au
 * @since      1.0.0
 *
 * @package    Behave_Archive
 * @subpackage Behave_Archive/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Behave_Archive
 * @subpackage Behave_Archive/admin
 * @author     Trevor Wistaff <trev@a07.com.au>
 */
class Behave_Archive_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Exclude pages with status 'Archived' from the default admin listing
	 *
	 * @since    1.0.0
	 */
    public function exclude_archived_pages_from_listing( $query ) {

        global $post_type;

        if ( is_admin() && $post_type == 'page' && $query->is_main_query() && $query->get('post_status') == null) {

            $stati = get_post_stati();
            unset( $stati['archived'] );
            $query->set( 'post_status', array_keys( $stati ) );

        }

    }

}
