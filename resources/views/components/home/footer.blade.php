<div>
     <!-- Footer -->
    <footer class="bg-white border-t-2 border-black py-8">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                </div>
                <p class="text-center">&copy; 2025 Toko Thrift. All rights reserved.</p>
            </div>
        </div>
    
    <script>
        // Smooth scrolling untuk navigasi
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Animation observer
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationDelay = '0s';
                    entry.target.classList.add('animate');
                }
            });
        }, observerOptions);

        // Observe semua elemen dengan class animasi
        document.querySelectorAll('.fade-in-up, .slide-in-left, .slide-in-right').forEach(el => {
            observer.observe(el);
        });

        // Parallax effect untuk hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('#home');
            const speed = scrolled * 0.5;
            
            if (parallax) {
                parallax.style.transform = `translateY(${speed}px)`;
            }
        });

        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('#mobile-menu-btn');
        const mobileMenu = document.querySelector('#mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                
                // Toggle hamburger icon
                const svg = mobileMenuButton.querySelector('svg');
                const currentPath = svg.querySelector('path').getAttribute('d');
                
                if (mobileMenu.classList.contains('hidden')) {
                    // Show hamburger
                    svg.querySelector('path').setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                } else {
                    // Show close (X)
                    svg.querySelector('path').setAttribute('d', 'M6 18L18 6M6 6l12 12');
                }
            });
            
            // Close mobile menu when clicking on links
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    const svg = mobileMenuButton.querySelector('svg');
                    svg.querySelector('path').setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                });
            });
        }
    </script>
</body>
</html>
</div>