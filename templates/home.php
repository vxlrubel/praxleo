<?php
/**
 * Template Name: Home Page
 * Template Post Type: page
 * Description: A custom home page template.
 *
 * @package Praxleo
 */
get_header();?>

<main>
    <section class="bg-linear-to-r from-purple-100 to-theme-100 min-h-75 md:min-h-85 lg:min-h-115 flex items-center justify-center pb-15 pt-35">
        <div class="w-full flex-1 flex items-center container g-5 flex-col md:flex-row lg:gap-10">
            <div class="flex-1 space-y-5 order-2 md:order-1">
                <h1 class="text-gradient text-[1.5rem] sm:text-[2rem] lg:text-[3rem] font-semibold text-balance leading-[2rem] sm:leading-[2.5rem] lg:leading-[4rem]">
                    Transforming Ideas into Digital Solutions
                </h1>
                <p>
                    At Praxleo, we specialize in providing top-notch web design, development, and other digital services to enhance your business growth and online presence.
                </p>

                <div class="flex gap-5 flex-wrap">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" aria-label="get started" class="button-primary">Get Started</a>
                    <a href="<?php echo esc_url(home_url('/services')); ?>" aria-label="our services" class="button-outline-primary">Our Services</a>
                </div>
            </div>
            <div class="flex-1 order-1 md:order-2">
                <img src="<?php echo get_image_source('home-hero-image.webp'); ?>" fetchpriority="high" height="auto" width="700" alt="Home" class="w-full max-w-[500px] block mx-auto mix-blend-multiply">
            </div>
        </div>
    </section>

    <section class="py-10 lg:py-15">
        <div class="container">
            <div class="text-center font-semibold mb-5 md:mb-10">
                <span class="text-gradient text-lg">Workflow Process</span>
                <h2 class="text-lg md:text-xl lg:text-2xl mt-4 text-balance">Our structured workflow ensures a smooth process from concept to completion, delivering projects on time and within budget.</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-7.5">
                <div class="bg-theme-500 p-5 lg:p-10 text-white rounded-xl transition-all duration-300 ease hover:-translate-y-2 hover:shadow-lg">
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white text-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="currentColor">
                            <path d="M495-155q-35-35-35-85t35-85q35-35 85-35t85 35q35 35 35 85t-35 85q-35 35-85 35t-85-35Zm113.5-56.5Q620-223 620-240t-11.5-28.5Q597-280 580-280t-28.5 11.5Q540-257 540-240t11.5 28.5Q563-200 580-200t28.5-11.5ZM504-464q-64-64-64-156t64-156q64-64 156-64t156 64q64 64 64 156t-64 156q-64 64-156 64t-156-64Zm255.5-56.5Q800-561 800-620t-40.5-99.5Q719-760 660-760t-99.5 40.5Q520-679 520-620t40.5 99.5Q601-480 660-480t99.5-40.5ZM280-240q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm56.5-103.5Q360-367 360-400t-23.5-56.5Q313-480 280-480t-56.5 23.5Q200-433 200-400t23.5 56.5Q247-320 280-320t56.5-23.5ZM580-240Zm80-380ZM280-400Z"/>
                        </svg>
                    </span>
                    <h3 class="font-semibold text-lg my-2">Discovery Phase</h3>
                    <p>We conduct thorough research and analysis to understand your unique requirements and objectives.</p>
                </div>
                <div class="bg-linear-to-r from-purple-100 to-theme-100 p-5 lg:p-10 rounded-xl transition-all duration-300 ease hover:-translate-y-2 hover:shadow-lg">
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-theme-500 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="currentColor" >
                            <path d="M600-120v-120H440v-400h-80v120H80v-320h280v120h240v-120h280v320H600v-120h-80v320h80v-120h280v320H600ZM160-760v160-160Zm520 400v160-160Zm0-400v160-160Zm0 160h120v-160H680v160Zm0 400h120v-160H680v160ZM160-600h120v-160H160v160Z"/>
                        </svg>
                    </span>
                    <h3 class="font-semibold text-lg my-2">Design Phase</h3>
                    <p>Our design team crafts stunning and intuitive interfaces that resonate with your audience.</p>
                </div>
                <div class="bg-linear-to-r from-purple-100 to-theme-100 p-5 lg:p-10 rounded-xl transition-all duration-300 ease hover:-translate-y-2 hover:shadow-lg">
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-theme-500 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="currentColor">
                            <path d="M240-280 40-480l200-200 56 56-143 144 143 144-56 56Zm178 132-76-24 200-640 76 24-200 640Zm302-132-56-56 143-144-143-144 56-56 200 200-200 200Z"/>
                        </svg>
                    </span>
                    <h3 class="font-semibold text-lg my-2">Development Phase</h3>
                    <p>Coding and implementation occur here, adhering to best practices and standards.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 lg:py-15">
        <div class="container">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 lg:gap-10 items-center">
                <div class="flex-1">
                    <h3>
                        <span class="font-bold text-2xl text-gradient"> Core Features</span>
                    </h3>
                    <p class="text-balance mt-3">
                        Our services come with a range of innovative features designed to maximize your business potential.
                    </p>

                    <div class="flex gap-4 items-start mt-10">
                        <div class="w-15 text-theme-500">
                            <div class="border-3 border-theme-500 rounded-full h-15 w-15 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="currentColor">
                                    <path d="M120-120v-520h200v-200h520v720H120Zm520-80h120v-560H400v120h240v440Zm-240 0h160v-360H400v360Zm-200 0h120v-360H200v360Zm440-440v80-80Zm-320 80Zm240 0Zm80-80Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-lg leading-none mb-2">Responsive Design</h3>
                            <p class="text-balance">
                                Our web solutions are fully responsive, ensuring an optimal user experience on all devices.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-start mt-6">
                        <div class="w-15 text-theme-500">
                            <div class="border-3 border-theme-500 rounded-full h-15 w-15 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="currentColor">
                                    <path d="M120-120v-520h200v-200h520v720H120Zm520-80h120v-560H400v120h240v440Zm-240 0h160v-360H400v360Zm-200 0h120v-360H200v360Zm440-440v80-80Zm-320 80Zm240 0Zm80-80Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-lg leading-none mb-2">Scalable Solutions</h3>
                            <p class="text-balance">
                                We build scalable solutions that <br> grow with your business requirements.
                            </p>
                        </div>
                    </div>

                    <a href="<?php echo esc_url(home_url('/services')); ?>" class="button-primary mt-10 hover:-translate-y-1 transition-transform duration-200 ease">
                        Learn More
                    </a>
                </div>
                <div class="flex-1">
                    <img src="<?php echo get_image_source('core-feature.webp'); ?>" height="auto" width="700" fetchpriority="high" alt="core-feature" loading="lazy" class="w-full block mx-auto">
                </div>
            </div>
            
            
        </div>
    </section>

    <section class="py-10 lg:py-15 bg-purple-50">
        <div class="container">
            <div class="text-center font-semibold mb-5 md:mb-10">
                <span class="text-gradient text-lg">Our Services</span>
                <h2 class="text-lg md:text-xl lg:text-2xl mt-4 mx-auto max-w-180 text-balance">Delivering creative web design, reliable development, and scalable mobile applications tailored to your business needs.</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-7.5">
                <div class="bg-theme-500 p-5 lg:p-10 text-white rounded-xl transition-all duration-300 ease hover:-translate-y-2 hover:shadow-lg">
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white text-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="currentColor">
                            <path d="M495-155q-35-35-35-85t35-85q35-35 85-35t85 35q35 35 35 85t-35 85q-35 35-85 35t-85-35Zm113.5-56.5Q620-223 620-240t-11.5-28.5Q597-280 580-280t-28.5 11.5Q540-257 540-240t11.5 28.5Q563-200 580-200t28.5-11.5ZM504-464q-64-64-64-156t64-156q64-64 156-64t156 64q64 64 64 156t-64 156q-64 64-156 64t-156-64Zm255.5-56.5Q800-561 800-620t-40.5-99.5Q719-760 660-760t-99.5 40.5Q520-679 520-620t40.5 99.5Q601-480 660-480t99.5-40.5ZM280-240q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm56.5-103.5Q360-367 360-400t-23.5-56.5Q313-480 280-480t-56.5 23.5Q200-433 200-400t23.5 56.5Q247-320 280-320t56.5-23.5ZM580-240Zm80-380ZM280-400Z"/>
                        </svg>
                    </span>
                    <h3 class="font-semibold text-lg my-2">Web Design</h3>
                    <p>Our web design services focus on creating visually appealing and user-friendly interfaces that engage visitors.</p>
                </div>
                <div class="bg-white p-5 lg:p-10 rounded-xl transition-all duration-300 ease hover:-translate-y-2 hover:shadow-lg">
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-theme-500 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="currentColor" >
                            <path d="M600-120v-120H440v-400h-80v120H80v-320h280v120h240v-120h280v320H600v-120h-80v320h80v-120h280v320H600ZM160-760v160-160Zm520 400v160-160Zm0-400v160-160Zm0 160h120v-160H680v160Zm0 400h120v-160H680v160ZM160-600h120v-160H160v160Z"/>
                        </svg>
                    </span>
                    <h3 class="font-semibold text-lg my-2">Web Development</h3>
                    <p>We offer robust web development solutions tailored to meet your unique business requirements, ensuring high performance and security.</p>
                </div>
                <div class="bg-white p-5 lg:p-10 rounded-xl transition-all duration-300 ease hover:-translate-y-2 hover:shadow-lg">
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-theme-500 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="currentColor">
                            <path d="M240-280 40-480l200-200 56 56-143 144 143 144-56 56Zm178 132-76-24 200-640 76 24-200 640Zm302-132-56-56 143-144-143-144 56-56 200 200-200 200Z"/>
                        </svg>
                    </span>
                    <h3 class="font-semibold text-lg my-2">Mobile App Development</h3>
                    <p>Our mobile app development services create intuitive and scalable applications for both iOS and Android platforms.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 lg:py-15 bg-[#91d8ff]">
        <div class="container">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 lg:gap-10 items-center">
                <div class="flex-1">
                    <img src="<?php echo get_image_source('happy-clients.webp'); ?>" height="auto" width="700" fetchpriority="high" alt="core-feature" loading="lazy" class="w-full block mx-auto">
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-2xl">
                        Our Happy Clients
                    </h3>
                    <p class="text-balance mt-3">
                       We measure success through proven results, trusted partnerships, and consistently delivering high-quality projects.
                    </p>

                    <div class="flex gap-4 mt-10 max-w-112.5">
                        <div class="flex-1 bg-[#aae1ff] p-3 rounded-lg">
                            <div class="font-bold text-2xl">7+</div>
                            <p>Years of <br> Experience</p>
                        </div>
                        <div class="flex-1 bg-[#aae1ff] p-3 rounded-lg">
                            <div class="font-bold text-2xl">250+</div>
                            <p>Satisfied Clients</p>
                        </div>
                        <div class="flex-1 bg-[#aae1ff] p-3 rounded-lg">
                            <div class="font-bold text-2xl">75+</div>
                            <p>Projects Completed</p>
                        </div>
                    </div>

                    <a href="<?php echo esc_url(home_url('/services')); ?>" class="button-primary mt-10 hover:-translate-y-1 transition-transform duration-200 ease">
                        Learn More
                    </a>
                </div>
            </div>
            
            
        </div>
    </section>

</main>

<?php get_footer();?>