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
    <div class="bg-linear-to-r from-theme-100 to-purple-100 min-h-75 md:min-h-85 lg:min-h-115 flex items-center justify-center px-5 pb-5">
        <h1 class="text-gradient text-[2rem] lg:text-[3rem] font-semibold pt-20">Services</h1>
    </div>
    <div>
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer();?>