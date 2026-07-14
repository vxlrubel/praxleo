<?php
/**
 * Template Name: About Page
 * Template Post Type: page
 * Description: A custom about page template.
 *
 * @package Praxleo
 */
get_header();?>

<section>
    <h1>About Us</h1>
    <div>
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer();?>