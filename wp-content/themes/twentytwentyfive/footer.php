<?php
/**
 * The template for displaying the footer
 */
?>
</div><!-- #main -->

<!-- Footer -->
<footer class="footer py-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <a href="<?php echo home_url('/'); ?>" class="footer-brand">
                    <span class="text-primary">Spanish</span>Talking
                </a>
                <p class="mt-3 mb-0 text-muted">Empowering your Spanish journey with interactive courses, native tutors, and a vibrant community.</p>
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-3">Quick Links</h6>
                <ul class="list-unstyled footer-links">
                    <li><a href="<?php echo home_url('/#courses'); ?>">Courses</a></li>
                    <li><a href="<?php echo home_url('/#method'); ?>">Method</a></li>
                    <li><a href="<?php echo home_url('/#testimonials'); ?>">Reviews</a></li>
                    <li><a href="<?php echo home_url('/#pricing'); ?>">Pricing</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3">Contact</h6>
                <ul class="list-unstyled footer-contact">
                    <li><i class="fas fa-envelope me-2"></i> info@spanishtalking.com</li>
                    <li><i class="fas fa-phone me-2"></i> +62 812-3456-7890</li>
                    <li><i class="fas fa-map-marker-alt me-2"></i> Jakarta, Indonesia</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3">Follow Us</h6>
                <div class="footer-social">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col text-center">
                <p class="mb-0 text-muted small">&copy; <?php echo date('Y'); ?> SpanishTalking. All rights reserved.</p>
            </div>
        </div>
    </div>

    <style>
        .footer {
            background-color: #111827;
            position: relative;
            overflow: hidden;
        }
        
        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, 
                rgba(255,255,255,0) 0%,
                rgba(255,255,255,0.1) 50%,
                rgba(255,255,255,0) 100%
            );
        }
        
        .footer-brand {
            font-size: 24px;
            font-weight: 700;
            text-decoration: none;
            color: #fff;
            position: relative;
            display: inline-block;
        }
        
        .footer-brand::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }
        
        .footer-brand:hover::after {
            width: 100%;
        }
        
        .footer h6 {
            color: #fff;
            position: relative;
            display: inline-block;
        }
        
        .footer h6::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 24px;
            height: 2px;
            background: var(--primary);
        }
        
        .footer-links a {
            color: #9ca3af;
            text-decoration: none;
            transition: all 0.3s;
            display: block;
            margin-bottom: 0.75rem;
            position: relative;
            padding-left: 0;
        }
        
        .footer-links a:hover {
            color: #fff;
            padding-left: 10px;
        }
        
        .footer-contact li {
            color: #9ca3af;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        
        .footer-contact li:hover {
            color: #fff;
            transform: translateX(5px);
        }
        
        .footer-contact li i {
            color: var(--primary);
        }
        
        .footer-social {
            display: flex;
            gap: 1rem;
        }
        
        .social-link {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.1);
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary);
            transform: translateY(100%);
            transition: transform 0.3s ease;
            z-index: 0;
        }
        
        .social-link:hover::before {
            transform: translateY(0);
        }
        
        .social-link i {
            position: relative;
            z-index: 1;
        }
        
        .social-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(var(--primary-rgb), 0.3);
        }
        
        hr {
            background-color: rgba(255,255,255,0.1);
            opacity: 1;
        }
        
        .text-muted {
            color: #9ca3af !important;
        }
        
        @media (max-width: 767px) {
            .footer [class^="col-"] {
                text-align: center;
            }
            
            .footer-social {
                justify-content: center;
            }
            
            .footer h6::after {
                left: 50%;
                transform: translateX(-50%);
            }
        }
    </style>
</footer>

<?php wp_footer(); ?>

</body>
</html>
