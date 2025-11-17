    </main>

    <footer class="site-footer" id="colophon">
        <div class="footer-container">
            <!-- Logo -->
            <div class="footer-logo">
                <span class="logo-news">NEWS</span><span class="logo-island">ISLAND</span>
            </div>

            <div class="footer-content">
                <!-- Quick Links -->
                <div class="footer-section">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="<?php echo home_url('/about-us'); ?>">About Us</a></li>
                        <li><a href="<?php echo home_url('/privacy-policy'); ?>">Privacy Policy</a></li>
                        <li><a href="<?php echo home_url('/cookies-policy'); ?>">Cookies Policy</a></li>
                        <li><a href="<?php echo home_url('/sitemap'); ?>">Sitemap</a></li>
                        <li><a href="<?php echo home_url('/rss'); ?>">RSS</a></li>
                        <li><a href="<?php echo home_url('/contact-us'); ?>">Contact Us</a></li>
                        <li><a href="<?php echo home_url('/Terms-and-Conditions'); ?>">Terms & Conditions</a></li>
                    </ul>
                </div>

                <!-- Trending News -->
                <div class="footer-section">
                    <h3 class="footer-title">Trending News</h3>
                    <ul class="footer-links">
                        <?php
                        $trending_cats = array('world', 'politics', 'technology', 'health', 'sports');
                        foreach ($trending_cats as $cat) :
                            $trending_post = new WP_Query(array(
                                'category_name' => $cat,
                                'posts_per_page' => 2,
                            ));
                            
                            if ($trending_post->have_posts()) :
                                while ($trending_post->have_posts()) : $trending_post->the_post();
                        ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>

            <!-- Separator -->
            <div class="footer-separator"></div>

            <!-- Copyright -->
            <div class="footer-bottom">
                <p class="copyright-text">© 2025 newsisland.in. All rights reserved. Designed by <a href="https://www.instagram.com/tahseenashrafi29/" target="_blank"><i class="tahseen"> Tahseen Ashrafi </i> </a> </p>
                
                <!-- Social Media Icons -->
                <div class="social-icons">
                    <a href="https://www.facebook.com/checkpoint/1501092823525282/?next=https%3A%2F%2Fwww.facebook.com%2Fpeople%2FNews-Island%2F61575614409704%2F#" target="_blank" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    
                    <a href="https://www.instagram.com/news.island/" target="_blank" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    
                    
                    <a href="https://x.com/theblackmike0?t=beEQmJxNUQC-qlSCT2Euqw&s=09" target="_blank" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    
                    
                    <a href="newsisland7@gmail.com" target="_blank" aria-label="Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                    
                    
                    <a href="https://www.youtube.com/@newsisland9360" target="_blank" aria-label="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                    
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="back-to-top" aria-label="Back to Top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <?php wp_footer(); ?>

    <script>
        // Dark Mode Toggle
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const body = document.body;
        const darkModeIcon = darkModeToggle.querySelector('i');

        // Check for saved dark mode preference
        if (localStorage.getItem('darkMode') === 'enabled') {
            body.classList.add('dark-mode');
            darkModeIcon.classList.remove('fa-sun');
            darkModeIcon.classList.add('fa-moon');
        }

        darkModeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            
            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
                darkModeIcon.classList.remove('fa-sun');
                darkModeIcon.classList.add('fa-moon');
            } else {
                localStorage.setItem('darkMode', 'disabled');
                darkModeIcon.classList.remove('fa-moon');
                darkModeIcon.classList.add('fa-sun');
            }
        });

        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mainNavigation = document.getElementById('site-navigation');

        mobileMenuToggle.addEventListener('click', () => {
            mainNavigation.classList.toggle('active');
        });

        // Back to Top Button
        const backToTop = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Hide menu on scroll
        let lastScrollTop = 0;
        const header = document.getElementById('masthead');

        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                header.classList.add('hide-menu');
            } else {
                header.classList.remove('hide-menu');
            }
            
            lastScrollTop = scrollTop;
        });
    </script>
</body>
</html>
