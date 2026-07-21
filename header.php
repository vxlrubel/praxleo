<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body class="<?php body_class();?>">
<?php wp_body_open(); ?>
    
<header class="fixed top-8 left-0 right-0 z-50 px-5">
    <div class="mx-auto max-w-350 px-5 py-4 flex items-center bg-linear-to-r from-purple-100 to-theme-100 rounded-[100px] shadow-lg">
        <a href="<?php echo home_url(); ?>" class="text-gradient font-bold text-xl">Praxleo</a>

        <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav class="ml-auto hidden lg:flex space-x-4">
                <?php
                wp_nav_menu( [
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex space-x-4',
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
    <div id="offcanvas-overlay" class="fixed inset-0 bg-black/50 z-40 hidden"></div>
    <aside id="offcanvas-menu" class="fixed top-0 left-0 h-full w-72 bg-linear-to-r from-purple-100 to-theme-100 z-50 transform -translate-x-full transition-transform duration-300 shadow-xl">
        <div class="flex items-center justify-between px-5 py-4 border-b">
            <span class="font-bold text-lg">Menu</span>
            <button id="menu-close" class="text-gray-600 hover:text-black focus:outline-none" aria-label="Close menu">
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
