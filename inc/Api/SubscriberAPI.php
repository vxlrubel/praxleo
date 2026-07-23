<?php

namespace Praxleo\Api;

use Praxleo\Subscriber;

class SubscriberAPI {

    public static function init() {
        add_action( 'rest_api_init', [ __CLASS__, 'register_routes' ] );
    }

    public static function register_routes() {
        register_rest_route( 'praxleo/v1', '/subscribe', [
            [
                'methods'             => \WP_REST_Server::CREATABLE,
                'callback'            => [ __CLASS__, 'handle_subscribe' ],
                'permission_callback' => '__return_true',
                'args'                => [
                    'email' => [
                        'required'          => true,
                        'type'              => 'string',
                        'format'            => 'email',
                        'sanitize_callback' => 'sanitize_email',
                        'validate_callback' => function ( $value ) {
                            return is_email( $value );
                        },
                    ],
                    'subject' => [
                        'required'          => false,
                        'type'              => 'string',
                        'default'           => 'Subscribe',
                        'sanitize_callback' => 'sanitize_text_field',
                    ],
                ],
            ],
        ] );

        register_rest_route( 'praxleo/v1', '/unsubscribe', [
            [
                'methods'             => \WP_REST_Server::READABLE,
                'callback'            => [ __CLASS__, 'handle_unsubscribe' ],
                'permission_callback' => '__return_true',
                'args'                => [
                    'token' => [
                        'required'          => true,
                        'type'              => 'string',
                        'sanitize_callback' => 'sanitize_text_field',
                    ],
                ],
            ],
        ] );
    }

    public static function handle_subscribe( $request ) {
        $email   = $request->get_param( 'email' );
        $subject = $request->get_param( 'subject' );

        $result = Subscriber::subscribe( $email, $subject );

        $status = $result['success'] ? 200 : 409;

        return new \WP_REST_Response( [
            'success' => $result['success'],
            'message' => $result['message'],
        ], $status );
    }

    public static function handle_unsubscribe( $request ) {
        $token = $request->get_param( 'token' );

        $result = Subscriber::unsubscribe( $token );

        $status = $result['success'] ? 200 : 404;

        $page_id = get_option( 'praxleo_unsubscribe_page_id' );
        $redirect_url = $page_id ? get_permalink( $page_id ) : home_url();

        if ( $result['success'] ) {
            return redirect( $redirect_url . '?status=success' );
        }

        return redirect( $redirect_url . '?status=error' );
    }
}
