<?php
/**
 * Template Name: Contact Page
 * Template Post Type: page
 * Description: A custom contact page template.
 *
 * @package Praxleo
 */

get_header();?>

<section>
    <h1>Contact Us</h1>
    <div>
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer();?>