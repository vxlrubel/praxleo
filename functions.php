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

