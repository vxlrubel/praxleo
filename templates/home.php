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
    <div class="bg-linear-to-r from-purple-100 to-theme-100 min-h-75 md:min-h-85 lg:min-h-115 flex items-center justify-center pb-15 pt-35">
        <div class="w-full flex-1 flex items-center container g-5 flex-col md:flex-row lg:gap-10">
            <div class="flex-1 space-y-5 order-2 md:order-1">
                <h1 class="text-gradient text-[1.5rem] sm:text-[2rem] lg:text-[3rem] font-semibold text-balance leading-[2rem] sm:leading-[2.5rem] lg:leading-[4rem]">
                    Transforming Ideas into Digital Solutions
                </h1>
                <p>
                    At Praxleo, we specialize in providing top-notch web design, development, and other digital services to enhance your business growth and online presence.
                </p>

                <div class="flex gap-5 flex-wrap">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="button-primary">Get Started</a>
                    <a href="<?php echo esc_url(home_url('/services')); ?>" class="button-outline-primary">Our Services</a>
                </div>
            </div>
            <div class="flex-1 order-1 md:order-2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home-hero-image.webp" fetchpriority="high" alt="Home" class="w-full max-w-[500px] block mx-auto mix-blend-multiply">
            </div>
            

        </div>
        
    </div>
    
    <div>
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer();?>