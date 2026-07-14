<?php
/**
 * Praxleo functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Praxleo
 * @since Praxleo 1.0
 */

namespace Praxleo;

use Praxleo\Assets;
use Praxleo\Menus;
use Praxleo\Setup;
use Praxleo\Admin;

defined( 'ABSPATH' ) || exit;

define( 'PRAXLEO_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'PRAXLEO_DIR', get_template_directory() );
define( 'PRAXLEO_URI', get_template_directory_uri() );



require_once PRAXLEO_DIR . '/vendor/autoload.php';

final class Praxleo {

    private static $instance;

    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
            self::$instance->includes();
            self::$instance->init_hooks();
        }
        return self::$instance;
    }

    private function includes() {
        /**
         * Include the Menus class and initialize it
         * to register the menus when the theme is set up.
         */
        Menus::init();

        /**
         * theme setup
         */
        Setup::init();

        /**
         * Admin customizations
         */
        if ( is_admin() ) {
            Admin::init();
        }
    }

    private function init_hooks() {
        add_action( 'wp_enqueue_scripts', [ Assets::class, 'enqueue' ] );
    }
}


if ( ! function_exists( 'praxleo' ) ) {
    /**
     * Returns the main instance of Praxleo to prevent the need to use globals.
     *
     * @return Praxleo
     */
    function praxleo() {
        return Praxleo::instance();
    }
}

praxleo();