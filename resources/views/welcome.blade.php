<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LinkedIn</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f2ef;
            color: #333;
        }

        /* Navbar for welcome page */
        .welcome-navbar {
            background-color: #fff;
            padding: 1rem 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .welcome-navbar .linkedin-logo {
            color: #0a66c2;
            font-size: 2rem;
            font-weight: bold;
        }
        .welcome-navbar .btn {
            font-weight: 600;
            border-radius: 20px;
            padding: 8px 20px;
            font-size: 0.9rem;
            margin-left: 10px;
        }
        .welcome-navbar .btn-outline-primary {
            border-color: #0a66c2;
            color: #0a66c2;
        }
        .welcome-navbar .btn-outline-primary:hover {
            background-color: rgba(10, 102, 194, 0.1);
        }
        .welcome-navbar .btn-primary {
            background-color: #0a66c2;
            border-color: #0a66c2;
            color: #fff;
        }
        .welcome-navbar .btn-primary:hover {
            background-color: #004182;
            border-color: #004182;
        }

        /* Hero Section */
        .hero-section {
            background-color: #f3f2ef;
            padding: 60px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #292929;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 30px;
        }
        .hero-section .hero-img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Call to Action Section */
        .cta-section {
            background-color: #fff;
            padding: 50px 0;
            border-top: 1px solid #e0e0e0;
            border-bottom: 1px solid #e0e0e0;
        }
        .cta-section .form-control {
            border-radius: 4px;
            padding: 12px 15px;
            font-size: 1rem;
            border: 1px solid #ccc;
        }
        .cta-section .form-control:focus {
            border-color: #0a66c2;
            box-shadow: 0 0 0 0.25rem rgba(10, 102, 194, 0.25);
        }
        .cta-section .btn-join {
            background-color: #0a66c2;
            color: #fff;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 20px;
            border: none;
            width: 100%;
            font-size: 1rem;
            transition: background-color 0.2s;
        }
        .cta-section .btn-join:hover {
            background-color: #004182;
        }
        .cta-section .privacy-text {
            font-size: 0.85rem;
            color: #666;
            margin-top: 15px;
        }
        .cta-section .privacy-text a {
            color: #0a66c2;
            text-decoration: none;
            font-weight: 600;
        }
        .cta-section .privacy-text a:hover {
            text-decoration: underline;
        }
        .cta-section .divider {
            margin: 25px 0;
            position: relative;
            text-align: center;
        }
        .cta-section .divider::before,
        .cta-section .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background-color: #e0e0e0;
        }
        .cta-section .divider::before { left: 0; }
        .cta-section .divider::after { right: 0; }
        .cta-section .divider span {
            background-color: #fff;
            padding: 0 10px;
            color: #666;
            font-size: 0.9rem;
        }
        .cta-section .btn-social {
            background-color: #fff;
            color: #333;
            border: 1px solid #ccc;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 20px;
            width: 100%;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            transition: background-color 0.2s;
        }
        .cta-section .btn-social:hover {
            background-color: #f3f2ef;
        }
        .cta-section .btn-social img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        /* Feature Sections */
        .feature-section {
            padding: 50px 0;
            background-color: #f9f9f9;
            border-bottom: 1px solid #e0e0e0;
        }
        .feature-section h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }
        .feature-item {
            text-align: center;
            margin-bottom: 30px;
        }
        .feature-item i {
            font-size: 3rem;
            color: #0a66c2;
            margin-bottom: 15px;
        }
        .feature-item h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .feature-item p {
            font-size: 0.95rem;
            color: #555;
        }

        /* Testimonial Section */
        .testimonial-section {
            background-color: #fff;
            padding: 50px 0;
            text-align: center;
        }
        .testimonial-section h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 30px;
        }
        .testimonial-card {
            background-color: #f3f2ef;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
        .testimonial-card p {
            font-style: italic;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .testimonial-card .author {
            font-weight: 600;
            font-size: 1rem;
        }
        .testimonial-card .author-title {
            font-size: 0.9rem;
            color: #666;
        }

        /* Footer */
        .welcome-footer {
            background-color: #f3f2ef;
            padding: 30px 0;
            font-size: 0.85rem;
            color: #666;
            border-top: 1px solid #e0e0e0;
        }
        .welcome-footer .footer-links a {
            color: #666;
            text-decoration: none;
            margin-right: 15px;
        }
        .welcome-footer .footer-links a:hover {
            text-decoration: underline;
        }
        .welcome-footer .linkedin-logo-small {
            color: #0a66c2;
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .welcome-navbar .navbar-collapse {
                flex-direction: column;
                align-items: flex-start;
            }
            .welcome-navbar .btn {
                width: 100%;
                margin-left: 0;
                margin-top: 10px;
            }
            .hero-section h1 {
                font-size: 2rem;
            }
            .hero-section p {
                font-size: 1rem;
            }
            .cta-section .col-md-6 {
                margin-bottom: 30px;
            }
            .feature-section h2, .testimonial-section h2 {
                font-size: 1.8rem;
            }
            .feature-item {
                margin-bottom: 20px;
            }
            .welcome-footer .footer-links {
                text-align: center;
                margin-top: 15px;
            }
            .welcome-footer .footer-links a {
                display: block;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>

    <nav class="welcome-navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand linkedin-logo" href="{{ url('/') }}">LinkedIn</a>
            <div>
                <a class="btn btn-outline-primary" href="{{ route('auth.register') }}">Join now</a>
                <a class="btn btn-primary" href="{{ route('auth.login') }}">Sign in</a>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-md-start">
                    <h1>Welcome to your professional community</h1>
                    <p>Find the right job or internship for you, connect with professionals, and grow your career.</p>
                    <button class="btn btn-primary btn-lg" id="getStartedBtn">Get started</button>
                </div>
                <div class="col-md-6">
                    <img src="https://placehold.co/600x400/eef3f8/666?text=Professional+Network" alt="Professional Network Illustration" class="hero-img">
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-center mb-4">Join the world's largest professional network</h2>
                    <form id="joinForm">
                        <div class="mb-3">
                            <input type="email" class="form-control" id="ctaEmail" placeholder="Email or phone number" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="ctaPassword" placeholder="Password (6+ characters)" required minlength="6">
                        </div>
                        <p class="privacy-text">
                            By clicking Agree & Join, you agree to the LinkedIn <a href="#">User Agreement</a>, <a href="#">Privacy Policy</a>, and <a href="#">Cookie Policy</a>.
                        </p>
                        <button type="submit" class="btn btn-join">Agree & Join</button>
                    </form>
                    <div class="divider"><span>or</span></div>
                    <button class="btn btn-social" id="joinGoogleBtn">
                        <img src="https://www.google.com/favicon.ico" alt="Google icon">
                        Join with Google
                    </button>
                    <button class="btn btn-social" id="joinAppleBtn">
                        <img src="https://www.apple.com/favicon.ico" alt="Apple icon">
                        Join with Apple
                    </button>
                    <p class="text-center mt-3">Already on LinkedIn? <a href="#" id="signInCtaBtn">Sign in</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-section">
        <div class="container">
            <h2>Discover what LinkedIn can do for you</h2>
            <div class="row mt-4">
                <div class="col-md-4 feature-item">
                    <i class="fas fa-briefcase"></i>
                    <h3>Find the right job</h3>
                    <p>Easily search for jobs, internships, and career opportunities that match your skills and interests.</p>
                </div>
                <div class="col-md-4 feature-item">
                    <i class="fas fa-user-friends"></i>
                    <h3>Build your network</h3>
                    <p>Connect with professionals, colleagues, and industry leaders to expand your connections.</p>
                </div>
                <div class="col-md-4 feature-item">
                    <i class="fas fa-chart-line"></i>
                    <h3>Grow your skills</h3>
                    <p>Access learning resources, courses, and insights to develop new skills and advance your career.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section">
        <div class="container">
            <h2>What people are saying</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="testimonial-card">
                        <p>"LinkedIn helped me land my dream job! The networking features and job alerts were invaluable."</p>
                        <div class="author">- Jane Doe</div>
                        <div class="author-title">Senior Marketing Manager</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="welcome-footer">
        <div class="container text-center text-md-start">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 mb-md-0">
                    <span class="linkedin-logo-small">LinkedIn</span>
                </div>
                <div class="col-md-8 text-md-end footer-links">
                    <a href="#">About</a>
                    <a href="#">Accessibility</a>
                    <a href="#">User Agreement</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Cookie Policy</a>
                    <a href="#">Copyright Policy</a>
                    <a href="#">Brand Policy</a>
                    <a href="#">Guest Controls</a>
                    <a href="#">Community Guidelines</a>
                    <span class="d-block d-md-inline-block mt-2 mt-md-0">&copy; 2024</span>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p id="modalMessage"></p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Function to show status modal
            function showStatusModal(message) {
                $('#modalMessage').text(message);
                $('#statusModal').modal('show');
            }

            // Hero section "Get started" button
            $('#getStartedBtn').on('click', function() {
                // Scroll to the CTA section or redirect to registration
                $('html, body').animate({
                    scrollTop: $('.cta-section').offset().top
                }, 800);
            });

            // CTA section "Agree & Join" form submission
            $('#joinForm').on('submit', function(e) {
                e.preventDefault();
                const email = $('#ctaEmail').val().trim();
                const password = $('#ctaPassword').val().trim();

                if (email && password.length >= 6) {
                    showStatusModal('Attempting to register...');
                    console.log('Registering:', { email, password });
                    // In a real app, send AJAX request to backend for registration
                } else if (!email) {
                    showStatusModal('Please enter your email or phone number.');
                } else if (password.length < 6) {
                    showStatusModal('Password must be at least 6 characters long.');
                }
            });

            // CTA section social buttons
            $('#joinGoogleBtn').on('click', function() {
                showStatusModal('Joining with Google...');
                console.log('Joining with Google');
                // In a real app, initiate Google OAuth flow
            });

            $('#joinAppleBtn').on('click', function() {
                showStatusModal('Joining with Apple...');
                console.log('Joining with Apple');
                // In a real app, initiate Apple OAuth flow
            });

            // CTA section "Sign in" link
            $('#signInCtaBtn').on('click', function(e) {
                e.preventDefault();
                showStatusModal('Navigating to Sign in page...');
                console.log('Navigating to Sign in from CTA');
                // In a real app, redirect to login page
            });
        });
    </script>
</body>
</html>
