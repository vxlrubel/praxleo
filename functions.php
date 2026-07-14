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

defined( 'ABSPATH' ) || exit;

define( 'PRAXLEO_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'PRAXLEO_DIR', get_template_directory() );
define( 'PRAXLEO_URI', get_template_directory_uri() );



final class Praxleo {

    /**
     * The single instance of the class.
     *
     * @var Praxleo
     */
    private static $instance;

    /**
     * Main Praxleo Instance.
     *
     * Ensures only one instance of Praxleo is loaded or can be loaded.
     *
     * @return Praxleo - Main instance.
     */
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
            self::$instance->setup_constants();
            self::$instance->includes();
            self::$instance->init_hooks();
        }
        return self::$instance;
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