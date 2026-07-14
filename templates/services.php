<?php
/**
 * Template Name: Services Page
 * Template Post Type: page
 * Description: A custom services page template.
 *
 * @package Praxleo
 */

get_header();?>

<section>
    <h1>Services</h1>
    <div>
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer();?>