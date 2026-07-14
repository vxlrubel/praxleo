<?php 

namespace Praxleo;

defined( 'ABSPATH' ) || exit('No direct script access allowed.');

class Menus {

    public static function init() {
        add_action( 'after_setup_theme', [ __CLASS__, 'register_menus' ] );
    }

    public static function register_menus() {
        register_nav_menus(
            [
                'primary' => __( 'Primary Menu', 'praxleo' ),
                'footer'  => __( 'Footer Menu', 'praxleo' ),
            ]
        );
    }
}

