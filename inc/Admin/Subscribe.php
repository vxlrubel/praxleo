<?php

namespace Praxleo\Admin;

use Praxleo\Subscriber;

class Subscribe {

    public static function init() {
        add_action( 'admin_menu', [ __CLASS__, 'add_admin_menu' ] );
        add_action( 'admin_init', [ __CLASS__, 'handle_bulk_actions' ] );
    }

    public static function add_admin_menu() {
        add_menu_page(
            'Praxleo',
            'Praxleo',
            'manage_options',
            'praxleo',
            '',
            PRAXLEO_URI . '/assets/img/dashbord-logo-icon.webp',
            30
        );

        add_submenu_page(
            'praxleo',
            'Subscribers',
            'Subscribers',
            'manage_options',
            'praxleo-subscribers',
            [ __CLASS__, 'render_subscribers_page' ]
        );
    }

    public static function render_subscribers_page() {
        $list_table = new SubscriberListTable();
        $list_table->prepare_items();

        ?>
        <div class="wrap">
            <h1 class="wp-heading-inline">Subscribers</h1>
            <form method="post">
                <?php
                $list_table->search_box( 'Search Subscribers', 'subscriber' );
                $list_table->display();
                ?>
            </form>
        </div>
        <?php
    }

    public static function handle_bulk_actions() {
        if ( ! isset( $_REQUEST['page'] ) || 'praxleo-subscribers' !== $_REQUEST['page'] ) {
            return;
        }
    }
}
