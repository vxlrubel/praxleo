<?php 

namespace Praxleo;

class Assets {
    public static function init() {
        add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue' ] );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );

        if ( ! is_user_logged_in() ) {
            add_action( 'wp_enqueue_scripts', [ __CLASS__, 'remove_admin_styles' ] );
            remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
            remove_action( 'wp_body_open', 'wp_enqueue_global_styles' );
            remove_action( 'wp_enqueue_scripts', 'wp_enqueue_stored_global_styles' );
            remove_action( 'wp_head', 'wp_enqueue_classic_theme_styles' );
            remove_action( 'wp_head', 'wp_enqueue_global_styles', 1 );
            add_action( 'init', [ __CLASS__, 'start_output_buffering' ] );
        }
    }

    public static function enqueue() {
        wp_enqueue_style( 'praxleo-style', get_stylesheet_uri(), array(), PRAXLEO_VERSION );
        wp_enqueue_style( 'praxleo-custom', PRAXLEO_URI . '/assets/css/custom.css', array( 'praxleo-style' ), PRAXLEO_VERSION );

        // custom script
        wp_enqueue_script( 'praxleo-script', PRAXLEO_URI . '/assets/js/script.js', array(), PRAXLEO_VERSION, true );

        // subscribe script
        wp_enqueue_script( 'praxleo-subscribe', PRAXLEO_URI . '/assets/js/subscribe.js', array(), PRAXLEO_VERSION, true );
        wp_localize_script( 'praxleo-subscribe', 'praxleoSubscribe', [
            'restUrl' => rest_url( 'praxleo/v1/subscribe' ),
            'nonce'   => wp_create_nonce( 'wp_rest' ),
        ] );
    }

    public static function remove_admin_styles() {
        wp_dequeue_style( 'admin-bar' );
        wp_dequeue_style( 'dashicons' );
        wp_dequeue_style( 'wp-components' );
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-theme' );
        wp_dequeue_style( 'global-styles' );
        wp_dequeue_style( 'classic-theme-styles' );
    }

    public static function start_output_buffering() {
        ob_start( [ __CLASS__, 'strip_global_styles' ] );
    }

    public static function strip_global_styles( $html ) {
        $html = preg_replace( '/<style id="global-styles-inline-css">.*?<\/style>/s', '', $html );
        $html = preg_replace( '/<style id="classic-theme-styles-inline-css">.*?<\/style>/s', '', $html );
        return $html;
    }
}