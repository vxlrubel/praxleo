<?php 

namespace Praxleo;

defined( 'ABSPATH' ) || exit('No direct script access allowed.');

class Setup {

    public static function init() {
        add_action( 'after_setup_theme', [ __CLASS__, 'theme_setup' ] );
    }

    public static function theme_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'woocommerce' );
    }
}