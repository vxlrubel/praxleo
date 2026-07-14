<?php

namespace Praxleo;

class Admin {

    public static function init() {
        add_filter( 'manage_posts_columns', [ __CLASS__, 'add_featured_image_column' ] );
        add_action( 'manage_posts_custom_column', [ __CLASS__, 'display_featured_image_column' ], 10, 2 );
        add_action( 'admin_head', [ __CLASS__, 'add_column_styles' ], 100 );
    }

    public static function add_featured_image_column( $columns ) {
        $new_columns = [];
        foreach ( $columns as $key => $value ) {
            if ( $key === 'title' ) {
                $new_columns['featured_image'] = 'Image';
            }
            $new_columns[ $key ] = $value;
        }
        return $new_columns;
    }

    public static function display_featured_image_column( $column, $post_id ) {
        if ( 'featured_image' !== $column ) {
            return;
        }

        $thumbnail = get_the_post_thumbnail( $post_id, [ 50, 50 ] );
        if ( $thumbnail ) {
            echo $thumbnail;
        } else {
            echo '<span style="background-color:#dfdfdf; display:block; height:50px; width:50px; border-radius:10px;"></span>';
        }
    }

    public static function add_column_styles() {
        $screen = get_current_screen();
        if ( 'post' !== $screen->id ) {
            return;
        } ?>

        <style>
            .manage-column.column-featured_image {
                width: 60px;
            }
        </style>
        <?php
    }
}
