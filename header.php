<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body class="<?php body_class();?>">
<?php wp_body_open(); ?>
    
<header class="bg-rose-500">
    <div class="mx-auto max-w-350 px-5 py-4 flex">
        <a href="<?php echo home_url(); ?>" class="text-white font-bold text-xl">Praxleo</a>
        <ul class="ml-auto flex space-x-4">
            <li><a href="#" class="text-white hover:text-gray-200">Home</a></li>
            <li><a href="#" class="text-white hover:text-gray-200">About</a></li>
            <li><a href="#" class="text-white hover:text-gray-200">Services</a></li>
            <li><a href="#" class="text-white hover:text-gray-200">Portfolio</a></li>
            <li><a href="#" class="text-white hover:text-gray-200">Blog</a></li>
            <li><a href="#" class="text-white hover:text-gray-200">Contact</a></li>
        </ul>
    </div>
</header>

<main class="min-h-100">