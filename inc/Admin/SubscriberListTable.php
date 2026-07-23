<?php

namespace Praxleo\Admin;

use Praxleo\Subscriber;

if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class SubscriberListTable extends \WP_List_Table {

    public function __construct() {
        parent::__construct( [
            'singular' => 'subscriber',
            'plural'   => 'subscribers',
            'ajax'     => false,
        ] );
    }

    public function get_columns() {
        return [
            'cb'               => '<input type="checkbox" />',
            'email'            => 'Email',
            'subject'          => 'Subject',
            'status'           => 'Status',
            'created_at'       => 'Date Subscribed',
            'unsubscribe_url'  => 'Unsubscribe Link',
        ];
    }

    public function get_sortable_columns() {
        return [
            'email'      => [ 'email', false ],
            'subject'    => [ 'subject', false ],
            'status'     => [ 'status', false ],
            'created_at' => [ 'created_at', true ],
        ];
    }

    public function column_cb( $item ) {
        return sprintf( '<input type="checkbox" name="subscriber[]" value="%d" />', $item->ID );
    }

    public function column_email( $item ) {
        return esc_html( $item->email );
    }

    public function column_subject( $item ) {
        return esc_html( $item->subject );
    }

    public function column_status( $item ) {
        if ( $item->status === 'subscribed' ) {
            return '<span style="color:#16a34a;font-weight:600;">Subscribed</span>';
        }
        return '<span style="color:#dc2626;font-weight:600;">Unsubscribed</span>';
    }

    public function column_created_at( $item ) {
        return date_i18n( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), strtotime( $item->created_at ) );
    }

    public function column_unsubscribe_url( $item ) {
        $url = add_query_arg( 'token', $item->unsubscribe_token, home_url( '/unsubscribe/' ) );
        return '<input type="text" readonly value="' . esc_url( $url ) . '" style="width:100%;font-size:12px;" onclick="this.select();" />';
    }

    public function get_bulk_actions() {
        return [
            'delete' => 'Delete',
        ];
    }

    public function process_bulk_action() {
        if ( ! isset( $_REQUEST['subscriber'] ) || ! is_array( $_REQUEST['subscriber'] ) ) {
            return;
        }

        $ids = array_map( 'absint', $_REQUEST['subscriber'] );

        if ( 'delete' === $this->current_action() ) {
            foreach ( $ids as $id ) {
                Subscriber::delete( $id );
            }
        }
    }

    protected function extra_tablenav( $which ) {
        if ( 'top' !== $which ) {
            return;
        }

        $current_status = isset( $_REQUEST['filter_status'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['filter_status'] ) ) : '';
        ?>
        <div class="alignleft actions">
            <select name="filter_status">
                <option value="">All Status</option>
                <option value="subscribed" <?php selected( $current_status, 'subscribed' ); ?>>Subscribed</option>
                <option value="unsubscribed" <?php selected( $current_status, 'unsubscribed' ); ?>>Unsubscribed</option>
            </select>
            <?php submit_button( 'Filter', '', 'filter_action', false ); ?>
        </div>
        <?php
    }

    public function prepare_items() {
        $per_page = 20;
        $current_page = $this->get_pagenum();

        $args = [
            'number' => $per_page,
            'offset' => ( $current_page - 1 ) * $per_page,
        ];

        if ( isset( $_REQUEST['filter_status'] ) && '' !== $_REQUEST['filter_status'] ) {
            $args['status'] = sanitize_text_field( wp_unslash( $_REQUEST['filter_status'] ) );
        }

        if ( isset( $_REQUEST['orderby'] ) ) {
            $args['orderby'] = sanitize_text_field( wp_unslash( $_REQUEST['orderby'] ) );
        }

        if ( isset( $_REQUEST['order'] ) ) {
            $args['order'] = sanitize_text_field( wp_unslash( $_REQUEST['order'] ) );
        }

        $this->items = Subscriber::get_all( $args );

        $total_items = Subscriber::count( isset( $args['status'] ) ? $args['status'] : '' );

        $this->set_pagination_args( [
            'total_items' => $total_items,
            'per_page'    => $per_page,
            'total_pages' => ceil( $total_items / $per_page ),
        ] );

        $this->_column_headers = [
            $this->get_columns(),
            [],
            $this->get_sortable_columns(),
        ];

        $this->process_bulk_action();
    }
}
