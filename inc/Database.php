<?php

namespace Praxleo;

defined( 'ABSPATH' ) || exit;

class Database {

    private static $table_name = 'praxleo_subscribers';

    public static function init() {
        add_action( 'after_switch_theme', [ __CLASS__, 'create_table' ] );
        add_action( 'after_switch_theme', [ __CLASS__, 'create_unsubscribe_page' ] );

        if ( ! self::table_exists() ) {
            self::create_table();
        }
    }

    public static function get_table_name() {
        global $wpdb;
        return $wpdb->prefix . self::$table_name;
    }

    public static function table_exists() {
        global $wpdb;
        $table = self::get_table_name();
        return $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table ) ) === $table;
    }

    public static function create_table() {
        global $wpdb;
        $table = self::get_table_name();
        $charset = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE {$table} (
            ID bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            email varchar(100) NOT NULL,
            subject varchar(100) NOT NULL DEFAULT 'Subscribe',
            status varchar(20) NOT NULL DEFAULT 'subscribed',
            unsubscribe_token varchar(64) NOT NULL,
            created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (ID),
            UNIQUE KEY email (email),
            UNIQUE KEY unsubscribe_token (unsubscribe_token)
        ) {$charset};";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql );
    }

    public static function create_unsubscribe_page() {
        $page_id = get_option( 'praxleo_unsubscribe_page_id' );

        if ( $page_id && get_post_status( $page_id ) === 'publish' ) {
            return;
        }

        $page = [
            'post_title'   => 'Unsubscribe',
            'post_content' => '[praxleo_unsubscribe]',
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ];

        $page_id = wp_insert_post( $page );

        if ( $page_id && ! is_wp_error( $page_id ) ) {
            update_option( 'praxleo_unsubscribe_page_id', $page_id );
        }
    }
}
