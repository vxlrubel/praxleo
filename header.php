<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body class="<?php body_class();?>">
<?php wp_body_open(); ?>
    
<header class="fixed top-8 left-0 right-0 z-30 px-5">
    <div class="mx-auto max-w-350 px-5 py-4 flex items-center bg-white/50 backdrop-blur-[10px] rounded-[100px] main-header">
        <a href="<?php echo home_url(); ?>" class="text-gradient font-bold text-xl">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="praxleo logo" class="w-30 inline-block mr-2">
        </a>

        <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav class="ml-auto hidden lg:flex space-x-4 menu-wrapper">
                <div class="menu-indicator"></div>
                <?php
                wp_nav_menu( [
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex space-x-3',
                    'fallback_cb'    => false,
                ] );
                ?>
            </nav>
        <?php endif; ?>

        <?php if ( has_nav_menu( 'secondary' ) ) : ?>
            <button id="menu-toggle" class="ml-auto lg:hidden text-purple-500 focus:outline-none" aria-label="Open menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        <?php endif; ?>
    </div>
</header>

<?php if ( has_nav_menu( 'secondary' ) ) : ?>
    <div id="offcanvas-overlay" class="fixed inset-0 bg-black/5 z-40 hidden"></div>
    <aside id="offcanvas-menu" class="fixed top-0 left-0 h-full w-72 bg-white/20  backdrop-blur-[5px] z-50 transform -translate-x-full transition-transform duration-300 shadow-xl">
        <div class="flex items-center justify-between px-5 py-4 border-b border-purple-300">
            <a href="<?php echo home_url(); ?>" class="font-bold text-lg">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="praxleo logo" class="w-30 inline-block mr-2">
            </a>
            <button id="menu-close" class="text-purple-500 hover:text-black focus:outline-none" aria-label="Close menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <nav class="px-5 py-4">
            <?php
            wp_nav_menu( [
                'theme_location' => 'secondary',
                'container'      => false,
                'menu_class'     => 'space-y-3',
                'fallback_cb'    => false,
                'depth'          => 2,
            ] );
            ?>
        </nav>
    </aside>
<?php endif; ?>

<main class="min-h-100">
