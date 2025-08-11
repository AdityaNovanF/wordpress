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
            <div class="col-lg-4">
                <a href="<?php echo home_url('/'); ?>" class="footer-brand">
                    <span style="color: #FF0000;">Spanish</span><span style="color: #FFB200;">Talking</span><span class="text-white">.com</span>
                </a>
                <p class="mt-3 mb-0 text-muted">Learn Spanish the simple and natural way.</p>
            </div>
            
            <div class="col-lg-2">
                <h6 class="fw-bold mb-3 text-white">Quick Links</h6>
                <ul class="list-unstyled footer-links">
                    <li><a href="#home" class="text-muted text-decoration-none">Home</a></li>
                    <li><a href="#blog" class="text-muted text-decoration-none">Blog</a></li>
                    <li><a href="#youtube" class="text-muted text-decoration-none">YouTube</a></li>
                    <li><a href="#contact" class="text-muted text-decoration-none">Contact</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3">
                <h6 class="fw-bold mb-3 text-white">Follow Us</h6>
                <div class="d-flex gap-3">
                    <a href="https://youtube.com" target="_blank" class="social-link">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://facebook.com" target="_blank" class="social-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3">
                <h6 class="fw-bold mb-3 text-white">Newsletter</h6>
                <p class="text-muted mb-3">Subscribe for weekly Spanish tips!</p>
                <form class="newsletter-form">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your email" aria-label="Your email address">
                        <button class="btn btn-warning text-dark" type="submit">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
        
        <hr class="my-5 border-secondary">
        
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="text-muted mb-0">© <?php echo date('Y'); ?> SpanishTalking.com | All Rights Reserved</p>
            </div>
            <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                <p class="text-muted mb-0">Designed with <i class="fas fa-heart" style="color: #FFB200;"></i> for Spanish learners</p>
            </div>
        </div>
    </div>

    <style>
        .footer {
            background-color: #DE0000;
            position: relative;
            overflow: hidden;
            color: #fff;
            border-top: 5px solid #FFB200;
            background-image: linear-gradient(135deg, rgba(255, 196, 0, 0.05) 25%, transparent 25%),
                            linear-gradient(225deg, rgba(255, 196, 0, 0.05) 25%, transparent 25%),
                            linear-gradient(45deg, rgba(255, 196, 0, 0.05) 25%, transparent 25%),
                            linear-gradient(315deg, rgba(255, 196, 0, 0.05) 25%, transparent 25%);
            background-position: 10px 0, 10px 0, 0 0, 0 0;
            background-size: 20px 20px;
            background-repeat: repeat;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        }

        .footer-brand {
            font-size: 28px;
            font-weight: 700;
            text-decoration: none;
            color: #fff;
            display: inline-block;
            position: relative;
            padding-bottom: 5px;
        }
        
        .footer-brand::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50%;
            height: 2px;
            background: #FFB200;
            transition: width 0.3s ease;
        }
        
        .footer-brand:hover {
            text-decoration: none;
            color: #fff;
        }

        .footer-brand:hover::after {
            width: 100%;
        }

        .text-muted {
            color: rgba(255, 255, 255, 0.8) !important;
            font-size: 1rem;
            line-height: 1.6;
            transition: color 0.3s ease;
        }
        
        .social-link {
            width: 42px;
            height: 42px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }

        .social-link:hover {
            transform: translateY(-3px) rotate(8deg);
            background-color: #FFB200;
            color: #DE0000;
            border-color: #FFB200;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .newsletter-form .form-control {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border: 2px solid rgba(255,255,255,0.2);
            background-color: rgba(255,255,255,0.1);
            color: #fff;
            font-size: 1rem;
            padding: 0.75rem 1.25rem;
            height: auto;
        }

        .newsletter-form .form-control::placeholder {
            color: rgba(255,255,255,0.6);
        }

        .newsletter-form .form-control:focus {
            background-color: rgba(255,255,255,0.15);
            border-color: #FFB200;
            box-shadow: 0 0 0 0.2rem rgba(255, 178, 0, 0.25);
        }

        .newsletter-form .btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
            background-color: #FFB200;
            border-color: #FFB200;
            color: #000;
            transition: all 0.3s ease;
        }

        .newsletter-form .btn:hover {
            background-color: #e6a100;
            border-color: #e6a100;
            color: #000;
            transform: translateX(3px);
        }

        .footer h6 {
            color: #fff;
            font-size: 1.1rem;
            margin-bottom: 1.25rem;
            font-weight: 600;
        }

        .footer-links {
            margin: 0;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 1rem;
        }

        .footer-links a {
            transition: all 0.3s ease;
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.7) !important;
            text-decoration: none;
        }

        .footer-links a:hover {
            color: #fff !important;
            text-decoration: none;
            padding-left: 5px;
        }

        hr.border-secondary {
            opacity: 0.1;
            border-color: #fff;
        }

        @media (max-width: 767px) {
            .footer [class^="col-"] {
                text-align: center;
                margin-bottom: 2rem;
            }
            
            .d-flex.gap-3 {
                justify-content: center;
            }

            .footer-brand {
                font-size: 24px;
            }

            .text-muted {
                font-size: 0.95rem;
            }
        }
    </style>
</footer>

<?php wp_footer(); ?>

</body>
</html>
