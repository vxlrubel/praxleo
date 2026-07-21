</main>
<footer class="bg-linear-to-r from-theme-50 to-rose-50">
    <div class="mx-auto max-w-350 px-5 py-10 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="lg:col-span-3 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <div>
                <div class="font-semibold text-2xl mb-3">
                    <a href="<?php echo home_url(); ?>" class="font-semiboldcursor-pointer text-gradient">
                        Praxleo
                    </a>
                </div>
                
                <div class="text-gray-500">
                    Praxleo is a leading provider of innovative solutions, dedicated to delivering exceptional services and products to our clients worldwide.  
                </div>
            </div>
            <div>
                <div class="font-semibold text-2xl text-gradient mb-3">
                    Our Services
                </div>
                <ul class="text-gray-500 space-y-1">
                    <li><a href="#" class="text-link">Web Development</a></li>
                    <li><a href="#" class="text-link">Mobile App Development</a></li>
                    <li><a href="#" class="text-link">UI/UX Design</a></li>
                    <li><a href="#" class="text-link">Digital Marketing</a></li>
                </ul>
            </div>
            <div>
                <div class="font-semibold text-2xl text-gradient mb-3">
                    Contact Us
                </div>
                <address class="text-gray-500">
                    House-15 Road-8 Sector 6<br>
                    Uttara, Dhaka-1230<br>
                    Phone: (+880) 1625-601 619<br>
                    Email: <a href="mailto:admin@praxleo.com" class="text-gradient hover:underline">admin@praxleo.com</a>
                </address>
            </div>
            <div class="lg:col-span-3">
                <div class="font-semibold text-2xl text-gradient mb-3">
                    Pages
                </div>

                <div class="flex flex-wrap gap-4">
                    <a href="#" class="footer-page-link">Home</a>
                    <a href="#" class="footer-page-link">About Us</a>
                    <a href="#" class="footer-page-link">Services</a>
                    <a href="#" class="footer-page-link">Contact</a>
                </div>

            </div>
        </div>
        <div>
            <form class="py-4 px-5 bg-linear-to-r from-purple-100 to-theme-100 rounded" action="javascript:void(0)" method="post">
                <div class="font-semibold text-2xl text-gradient mb-2">
                    Subscribe Us
                </div>
                <div class="text-sm mb-3 text-gray-500">Subscribe to our newsletter to stay updated with the latest news and offers.</div>
                <input 
                    type="email"
                    placeholder="Enter your email"
                    class="input-field mb-3 lowercase placeholder:capitalize bg-white"
                    required
                />
                <button class="button-primary">Subscribe</button>

                <div class="mt-3 py-2 px-3 bg-theme-50 border-l-4 border-theme-500 text-theme-500 text-sm">
                    We respect your privacy. Unsubscribe at any time.
                </div>

                <!-- error mmessage -->
                <div class="mt-3 py-2 px-3 bg-rose-50 border-l-4 border-rose-500 text-rose-500 text-sm">
                    Invalid email address. Please enter a valid email.
                </div>
            </form>
        </div>
    </div>

    <div class="py-4 px-5 text-center  text-white bg-linear-to-r from-theme-500 to-purple-500">
        Copyright © <script>document.write(new Date().getFullYear())</script> <span class="font-semibold capitalize"><?php echo get_bloginfo('name'); ?></span>. All rights reserved.
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>