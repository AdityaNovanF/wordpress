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
                <a href="<?php echo get_permalink(get_page_by_path('landingpage')); ?>" class="footer-brand">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spanishtalking_logo.png" alt="SpanishTalking.com" class="footer-logo">
                </a>
                <p class="mt-3 mb-0 text-muted">Learn Spanish the simple and natural way.</p>
            </div>
            
            <div class="col-lg-2">
                <h6 class="fw-bold mb-3 text-white">Quick Links</h6>
                <ul class="list-unstyled footer-links">
                    <li><a href="<?php echo get_permalink(get_page_by_path('landingpage')); ?>#home" class="text-muted text-decoration-none">Home</a></li>
                    <li><a href="<?php echo get_permalink(get_page_by_path('landingpage')); ?>#blog" class="text-muted text-decoration-none">Blog</a></li>
                    <li><a href="<?php echo get_permalink(get_page_by_path('landingpage')); ?>#youtube" class="text-muted text-decoration-none">YouTube</a></li>
                    <li><a href="<?php echo get_permalink(get_page_by_path('landingpage')); ?>#contact" class="text-muted text-decoration-none">Contact</a></li>
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
                <form class="newsletter-form" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">
                    <div class="input-group">
                        <input type="email" name="newsletter_email" class="form-control" placeholder="Your email" aria-label="Your email address" required>
                        <button class="btn btn-warning text-dark" type="submit">Sign Up</button>
                    </div>
                    <input type="hidden" name="action" value="newsletter_subscribe">
                    <?php wp_nonce_field('newsletter_subscribe_nonce', 'newsletter_nonce'); ?>
                </form>
                <div id="newsletter-message" class="mt-2" style="display: none;"></div>
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
            display: inline-block;
            position: relative;
            padding-bottom: 5px;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .footer-logo {
            height: 120px;
            width: auto;
            transition: transform 0.3s ease, opacity 0.3s ease;
            filter: brightness(1.1) drop-shadow(1px 1px 2px rgba(255, 255, 255, 0.5)) drop-shadow(-1px -1px 2px rgba(255, 255, 255, 0.5)) drop-shadow(1px -1px 2px rgba(255, 255, 255, 0.5)) drop-shadow(-1px 1px 2px rgba(255, 255, 255, 0.5));
            -webkit-filter: brightness(1.1) drop-shadow(1px 1px 2px rgba(255, 255, 255, 0.5)) drop-shadow(-1px -1px 2px rgba(255, 255, 255, 0.5)) drop-shadow(1px -1px 2px rgba(255, 255, 255, 0.5)) drop-shadow(-1px 1px 2px rgba(255, 255, 255, 0.5));
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
            transform: translateY(-2px);
        }

        .footer-brand:hover .footer-logo {
            transform: scale(1.05);
            opacity: 0.9;
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

        /* Force footer newsletter form styling */
        .footer .col-lg-3:last-child,
        footer .col-lg-3:last-child,
        .footer [class*="col-"]:last-child,
        footer [class*="col-"]:last-child {
            background: transparent !important;
        }

        .footer .newsletter-form,
        footer .newsletter-form {
            background: transparent !important;
        }

        .footer .newsletter-form *,
        footer .newsletter-form * {
            background: transparent !important;
        }

        .footer .newsletter-form .form-control,
        footer .newsletter-form .form-control {
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            border-top-left-radius: 0.375rem !important;
            border-bottom-left-radius: 0.375rem !important;
            border: 2px solid rgba(255,255,255,0.2) !important;
            border-right: none !important;
            background-color: rgba(255,255,255,0.1) !important;
            color: #fff !important;
            font-size: 1rem !important;
            padding: 0.75rem 1.25rem !important;
            height: auto !important;
            flex: 1 !important;
        }

        .footer .newsletter-form .form-control::placeholder,
        footer .newsletter-form .form-control::placeholder {
            color: rgba(255,255,255,0.6) !important;
        }

        .footer .newsletter-form .form-control:focus,
        footer .newsletter-form .form-control:focus {
            background-color: rgba(255,255,255,0.15) !important;
            border-color: #FFB200 !important;
            box-shadow: none !important;
            outline: none !important;
        }

        .footer .newsletter-form .btn,
        footer .newsletter-form .btn {
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-top-right-radius: 0.375rem !important;
            border-bottom-right-radius: 0.375rem !important;
            padding: 0.75rem 1.5rem !important;
            font-weight: 600 !important;
            font-size: 1rem !important;
            background-color: #FFB200 !important;
            border-color: #FFB200 !important;
            color: #000 !important;
            transition: all 0.3s ease !important;
            white-space: nowrap !important;
        }

        .footer .newsletter-form .btn:hover,
        footer .newsletter-form .btn:hover {
            background-color: #e6a100 !important;
            border-color: #e6a100 !important;
            color: #000 !important;
            transform: translateX(2px) !important;
        }

        .footer .newsletter-form .input-group,
        footer .newsletter-form .input-group {
            display: flex !important;
            width: 100% !important;
        }

        #newsletter-message {
            font-size: 0.9rem;
            padding: 0.5rem;
            border-radius: 0.25rem;
        }

        #newsletter-message.success {
            background-color: rgba(40, 167, 69, 0.2);
            border: 1px solid rgba(40, 167, 69, 0.5);
            color: #28a745;
        }

        #newsletter-message.error {
            background-color: rgba(220, 53, 69, 0.2);
            border: 1px solid rgba(220, 53, 69, 0.5);
            color: #dc3545;
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

    <script>
    // Newsletter subscription functionality
    document.addEventListener('DOMContentLoaded', function() {
        const newsletterForm = document.querySelector('.newsletter-form');
        const messageDiv = document.getElementById('newsletter-message');
        
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const email = formData.get('newsletter_email');
                
                // Basic email validation
                if (!isValidEmail(email)) {
                    showMessage('Please enter a valid email address.', 'error');
                    return;
                }
                
                // Show loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Signing Up...';
                submitBtn.disabled = true;
                
                // Simulate newsletter subscription (replace with actual AJAX call)
                setTimeout(function() {
                    // Reset button
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    
                    // Show success message
                    showMessage('Thank you for subscribing! Check your email for confirmation.', 'success');
                    
                    // Clear form
                    newsletterForm.reset();
                }, 1500);
                
                // Uncomment below for actual WordPress AJAX implementation
                /*
                fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    
                    if (data.success) {
                        showMessage(data.data.message, 'success');
                        newsletterForm.reset();
                    } else {
                        showMessage(data.data.message, 'error');
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    showMessage('An error occurred. Please try again.', 'error');
                });
                */
            });
        }
        
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
        
        function showMessage(message, type) {
            messageDiv.textContent = message;
            messageDiv.className = 'mt-2 ' + type;
            messageDiv.style.display = 'block';
            
            // Hide message after 5 seconds
            setTimeout(function() {
                messageDiv.style.display = 'none';
            }, 5000);
        }
    });
    </script>
</footer>

<?php wp_footer(); ?>

</body>
</html>
