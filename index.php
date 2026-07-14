<?php

get_header();



?>



<?php if(have_posts()) : ?>

<section class="bg-[#f0f0f0] py-15">
    <div class="max-w-350 mx-auto px-5 py-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <?php while(have_posts()) : the_post(); ?>
            <a class="flex flex-col bg-white pb-4 rounded-2xl overflow-hidden" href="<?php the_permalink(); ?>">
               <span class="aspect-4/3 bg-amber-50 overflow-hidden">
                 <img src="<?php the_post_thumbnail_url( 'medium' ); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover">
               </span>
               <span class="text-lg font-semibold px-4 py-1 line-clamp-1"><?php the_title(); ?></span>
               <span class="text-gray-600 line-clamp-2 px-4 pt-1"><?php the_excerpt(); ?></span>
            </a>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        </div>
        <div class="mt-4">
            <?php the_posts_pagination( [
                'mid_size'  => 2,
                'prev_text' => '&laquo; Previous',
                'next_text' => 'Next &raquo;',
            ] ); ?>
        </div>

    </div>
</section>

<?php else : ?>
<section class="bg-[#f0f0f0] py-15">
    <div class="max-w-350 mx-auto px-5 py-4">
    <p>No posts found.</p>
    </div>
</section>
<?php endif;

get_footer();
