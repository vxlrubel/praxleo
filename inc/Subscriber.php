<?php

namespace Praxleo;

defined( 'ABSPATH' ) || exit;

class Subscriber {

    public static function get_by_id( $id ) {
        global $wpdb;
        $table = Database::get_table_name();
        return $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table} WHERE ID = %d", $id ) );
    }

    public static function get_by_email( $email ) {
        global $wpdb;
        $table = Database::get_table_name();
        return $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table} WHERE email = %s", $email ) );
    }

    public static function get_by_token( $token ) {
        global $wpdb;
        $table = Database::get_table_name();
        return $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table} WHERE unsubscribe_token = %s", $token ) );
    }

    public static function get_all( $args = [] ) {
        global $wpdb;
        $table = Database::get_table_name();

        $defaults = [
            'status'  => '',
            'orderby' => 'created_at',
            'order'   => 'DESC',
            'offset'  => 0,
            'number'  => 20,
        ];

        $args = wp_parse_args( $args, $defaults );

        $where = '1=1';
        $values = [];

        if ( ! empty( $args['status'] ) ) {
            $where .= ' AND status = %s';
            $values[] = $args['status'];
        }

        $orderby = sanitize_sql_orderby( $args['orderby'] . ' ' . $args['order'] );

        if ( ! empty( $values ) ) {
            $query = $wpdb->prepare( "SELECT * FROM {$table} WHERE {$where} ORDER BY {$orderby} LIMIT %d OFFSET %d", array_merge( $values, [ $args['number'], $args['offset'] ] ) );
        } else {
            $query = $wpdb->prepare( "SELECT * FROM {$table} WHERE {$where} ORDER BY {$orderby} LIMIT %d OFFSET %d", $args['number'], $args['offset'] );
        }

        return $wpdb->get_results( $query );
    }

    public static function count( $status = '' ) {
        global $wpdb;
        $table = Database::get_table_name();

        if ( ! empty( $status ) ) {
            return (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$table} WHERE status = %s", $status ) );
        }

        return (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table}" );
    }

    public static function subscribe( $email, $subject = 'Subscribe' ) {
        global $wpdb;
        $table = Database::get_table_name();

        $existing = self::get_by_email( $email );

        if ( $existing ) {
            if ( $existing->status === 'subscribed' ) {
                return [
                    'success' => false,
                    'message' => 'This email is already subscribed.',
                ];
            }

            $wpdb->update(
                $table,
                [
                    'status'   => 'subscribed',
                    'subject'  => $subject,
                    'updated_at' => current_time( 'mysql' ),
                ],
                [ 'ID' => $existing->ID ],
                [ '%s', '%s', '%s' ],
                [ '%d' ]
            );

            return [
                'success' => true,
                'message' => 'Your subscription has been reactivated.',
            ];
        }

        $token = wp_generate_password( 64, false );

        $wpdb->insert(
            $table,
            [
                'email'              => $email,
                'subject'            => $subject,
                'status'             => 'subscribed',
                'unsubscribe_token'  => $token,
                'created_at'         => current_time( 'mysql' ),
                'updated_at'         => current_time( 'mysql' ),
            ],
            [ '%s', '%s', '%s', '%s', '%s', '%s' ]
        );

        return [
            'success' => true,
            'message' => 'You have been subscribed successfully.',
        ];
    }

    public static function unsubscribe( $token ) {
        global $wpdb;
        $table = Database::get_table_name();

        $subscriber = self::get_by_token( $token );

        if ( ! $subscriber ) {
            return [
                'success' => false,
                'message' => 'Invalid unsubscribe link.',
            ];
        }

        if ( $subscriber->status === 'unsubscribed' ) {
            return [
                'success' => true,
                'message' => 'You are already unsubscribed.',
            ];
        }

        $wpdb->update(
            $table,
            [
                'status'     => 'unsubscribed',
                'updated_at' => current_time( 'mysql' ),
            ],
            [ 'ID' => $subscriber->ID ],
            [ '%s', '%s' ],
            [ '%d' ]
        );

        return [
            'success' => true,
            'message' => 'You have been unsubscribed successfully.',
        ];
    }

    public static function delete( $id ) {
        global $wpdb;
        $table = Database::get_table_name();
        return $wpdb->delete( $table, [ 'ID' => $id ], [ '%d' ] );
    }
}
