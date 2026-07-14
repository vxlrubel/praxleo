<?php 

namespace Praxleo;

class Assets {
    public static function enqueue() {
        wp_enqueue_style( 'praxleo-style', get_stylesheet_uri(), array(), PRAXLEO_VERSION );
        wp_enqueue_style( 'praxleo-custom', PRAXLEO_URI . '/assets/css/custom.css', array(), PRAXLEO_VERSION );
        wp_enqueue_script( 'praxleo-script', PRAXLEO_URI . '/assets/js/script.js', array(), PRAXLEO_VERSION, true );
    }
}