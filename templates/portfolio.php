<?php
/**
 * Template Name: Portfolio Page
 * Template Post Type: page
 * Description: A custom portfolio page template.
 *
 * @package Praxleo
 */
get_header();?>

<section>
    <h1>Portfolio</h1>
    <div>
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer();?>