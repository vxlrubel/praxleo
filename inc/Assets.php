<?php 

namespace Praxleo;

class Assets {
    public static function enqueue() {
        wp_enqueue_style( 'praxleo-style', PRAXLEO_URI . '/assets/css/style.css', array(), PRAXLEO_VERSION );
        wp_enqueue_script( 'praxleo-script', PRAXLEO_URI . '/assets/js/script.js', array(), PRAXLEO_VERSION, true );
    }
}