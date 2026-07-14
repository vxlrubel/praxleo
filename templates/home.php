<?php
/**
 * Template Name: Home Page
 * Template Post Type: page
 * Description: A custom home page template.
 *
 * @package Praxleo
 */
get_header();?>

<section>
    <h1>Home</h1>
    <div>
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer();?>