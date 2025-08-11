<?php
/**
 * Template part for displaying the navbar
 */
?>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm py-0" style="top: var(--wp-admin--admin-bar--height, 0);">
    <div class="container h-100">
        <a class="navbar-brand fw-bold fs-4 py-0" href="#">
            <span style="color: #FF0000;">Spanish</span><span style="color: #FFC400;">Talking</span><span class="text-secondary">.com</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://youtube.com" target="_blank">YouTube</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a href="https://youtube.com" target="_blank" class="btn btn-danger btn-sm rounded-pill px-3 me-2">
                        <i class="fab fa-youtube me-1"></i> Watch on YouTube
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#blog" class="btn btn-warning text-dark btn-sm rounded-pill px-3">
                        Read the Blog
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
.navbar {
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.95) !important;
    transition: all 0.3s ease;
    height: var(--navbar-height);

    /* Custom button styles */
    .btn-danger {
        background-color: #FF0000;
        border-color: #FF0000;
    }

    .btn-danger:hover {
        background-color: #e60000;
        border-color: #e60000;
    }

    .btn-warning {
        background-color: #FFC400;
        border-color: #FFC400;
        color: #000;
    }

    .btn-warning:hover {
        background-color: #e6b000;
        border-color: #e6b000;
        color: #000;
    }

    /* Logo hover and animation effects */
    .navbar-brand span {
        transition: opacity 0.3s ease, transform 0.3s ease;
        display: inline-block;
    }

    .navbar-brand:hover span {
        opacity: 0.9;
    }

    /* Smooth navigation transitions */
    .nav-link {
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: #FF0000;
    }
    min-height: auto;
    padding: 0;
    border-bottom: 3px solid #FFB200;
}

.navbar-brand {
    font-size: 1.5rem;
    padding: 0;
    height: var(--navbar-height);
    display: flex;
    align-items: center;
}

.nav-link {
    font-weight: 500;
    padding: 0 1rem;
    height: var(--navbar-height);
    display: flex;
    align-items: center;
    color: #DE0000;
}

.nav-link:hover {
    color: #AA151B;
}

.navbar .btn {
    padding: 0.5rem 1.25rem;
    height: 38px;
    display: flex;
    align-items: center;
    font-size: 0.95rem;
    margin: 9px 0;
}

.navbar .btn-light {
    background: rgba(255, 178, 0, 0.1);
    border-color: #FFB200;
    color: #DE0000;
}

.navbar .btn-primary {
    background: #DE0000;
    border: none;
    color: #fff;
}

.navbar .btn-primary:hover {
    background: #AA151B;
}

.navbar.scrolled {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}
</style>
