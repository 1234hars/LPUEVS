<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPU E-Rickshaw Booking System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00C853; /* Green */
            --primary-dark: #009624;
            --accent: #FFD600; /* Yellow */
            --light: #f8f9fa;
            --dark: #212529;
            --white: #ffffff;
            --gray: #6c757d;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --border-radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }

        header {
            background-color: var(--white);
            box-shadow: var(--shadow);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 15px 0;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .logo i {
            color: var(--accent);
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 25px;
        }

        nav a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: var(--transition);
            position: relative;
            padding: 5px 0;
        }

        nav a:hover {
            color: var(--primary);
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: var(--transition);
        }

        nav a:hover::after {
            width: 100%;
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 8px 20px;
            border-radius: var(--border-radius);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
        }

        .btn-outline {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
        }

        .btn-outline:hover {
            background: var(--primary);
            color: var(--white);
        }

        .btn-solid {
            background: var(--primary);
            color: var(--white);
            border: 2px solid var(--primary);
        }

        .btn-solid:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('lpu-campus.jpg') no-repeat center center;
            background-size: cover;
            height: 80vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--white);
            margin-top: 70px;
            padding: 0 20px;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .hero .btn {
            padding: 12px 30px;
            font-size: 1.1rem;
            margin: 0 10px;
        }

        .btn-accent {
            background: var(--accent);
            color: var(--dark);
            border: 2px solid var(--accent);
            font-weight: 600;
        }

        .btn-accent:hover {
            background: #e6c200;
            border-color: #e6c200;
        }

        .section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.2rem;
            color: var(--primary);
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--accent);
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: rgba(0, 200, 83, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: var(--primary);
            font-size: 1.8rem;
        }

        .feature-card h3 {
            margin-bottom: 15px;
            color: var(--primary);
        }

        .booking-steps {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .step {
            flex: 1;
            min-width: 250px;
            max-width: 300px;
            background: var(--white);
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            position: relative;
            text-align: center;
            transition: var(--transition);
        }

        .step:hover {
            transform: translateY(-5px);
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 auto 20px;
            position: relative;
        }

        .step-number::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 100%;
            width: 20px;
            height: 2px;
            background: var(--primary);
            display: none;
        }

        .step:last-child .step-number::after {
            display: none;
        }

        .pricing {
            background: rgba(0, 200, 83, 0.05);
        }

        .pricing-plans {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .plan {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 40px 30px;
            text-align: center;
            flex: 1;
            min-width: 280px;
            max-width: 350px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .plan:hover {
            transform: translateY(-10px);
        }

        .plan-header {
            margin-bottom: 30px;
        }

        .plan-name {
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .plan-price {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
        }

        .plan-price span {
            font-size: 1rem;
            font-weight: 400;
        }

        .plan-features {
            list-style: none;
            margin-bottom: 30px;
        }

        .plan-features li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .popular {
            position: absolute;
            top: 0;
            right: 0;
            background: var(--accent);
            color: var(--dark);
            padding: 5px 20px;
            font-weight: 600;
            transform: rotate(45deg) translate(30%, -50%);
            transform-origin: top right;
            font-size: 0.8rem;
        }

        .testimonials {
            background: var(--white);
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .testimonial {
            background: var(--light);
            padding: 30px;
            border-radius: var(--border-radius);
            position: relative;
        }

        .testimonial::before {
            content: '"';
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 4rem;
            color: rgba(0, 200, 83, 0.1);
            font-family: serif;
            line-height: 1;
        }

        .testimonial-content {
            position: relative;
            z-index: 1;
            margin-bottom: 20px;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
        }

        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info h4 {
            color: var(--primary);
            margin-bottom: 5px;
        }

        .author-info p {
            font-size: 0.8rem;
            color: var(--gray);
        }

        .promo-banner {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            padding: 40px;
            border-radius: var(--border-radius);
            text-align: center;
            margin-top: 50px;
        }

        .promo-banner h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .promo-banner p {
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }

        footer {
            background: var(--dark);
            color: var(--white);
            padding: 60px 0 20px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 20px;
        }

        .footer-logo i {
            color: var(--accent);
        }

        .footer-about p {
            opacity: 0.7;
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .footer-links h3 {
            color: var(--white);
            margin-bottom: 20px;
            font-size: 1.2rem;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-links h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--accent);
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--accent);
            padding-left: 5px;
        }

        .footer-contact p {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            opacity: 0.7;
        }

        .copyright {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            opacity: 0.7;
            font-size: 0.9rem;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--primary);
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 992px) {
            .hero h1 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 15px;
            }
            
            .header-container {
                flex-direction: column;
                align-items: flex-start;
            }
            
            nav {
                width: 100%;
                display: none;
                margin-top: 15px;
            }
            
            nav.active {
                display: block;
            }
            
            nav ul {
                flex-direction: column;
                gap: 10px;
            }
            
            .auth-buttons {
                display: none;
                width: 100%;
                flex-direction: column;
                gap: 10px;
                margin-top: 15px;
            }
            
            .auth-buttons.active {
                display: flex;
            }
            
            .mobile-menu-btn {
                display: block;
                position: absolute;
                top: 15px;
                right: 15px;
            }
            
            .hero {
                height: 70vh;
                margin-top: 60px;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .hero-buttons {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }
            
            .hero .btn {
                margin: 0;
            }
            
            .section {
                padding: 60px 20px;
            }
            
            .step-number::after {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .hero {
                height: 60vh;
            }
            
            .hero h1 {
                font-size: 1.8rem;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .feature-card, .step, .plan {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <i class="fas fa-rickshaw"></i>
                <span>LPU E-Rickshaw</span>
            </div>
            
            <button class="mobile-menu-btn" id="menuBtn">
                <i class="fas fa-bars"></i>
            </button>
            
            <nav id="mainNav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="./about.php">About</a></li>
                    <li><a href="./demo main.php">Services</a></li>
                    <li><a href="./help.php">Help</a></li>
                </ul>
            </nav>
            
            <div class="auth-buttons" id="authButtons">
                <a href="./log.php" class="btn btn-outline">Login</a>
                <a href="./register.php" class="btn btn-solid">Register</a>
            </div>
        </div>
    </header>
    
    <section class="hero">
        <div class="hero-content">
            <h1>Smart, Green Campus Transportation</h1>
            <p>Book your E-Rickshaw ride in seconds and enjoy comfortable, eco-friendly travel across LPU campus</p>
            <div class="hero-buttons">
                <a href="./log.php" class="btn btn-accent">Book Now</a>
                <a href="#how-it-works" class="btn btn-outline">How It Works</a>
            </div>
        </div>
    </section>
    
    <section class="section">
        <div class="section-title">
            <h2>Why Choose LPU E-Rickshaw</h2>
        </div>
        
        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Instant Booking</h3>
                <p>Get a ride within minutes with our easy-to-use booking system available 24/7</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3>Eco-Friendly</h3>
                <p>Zero-emission electric vehicles contributing to a cleaner campus environment</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-rupee-sign"></i>
                </div>
                <h3>Affordable</h3>
                <p>Budget-friendly fares with special discounts for LPU students and staff</p>
            </div>
        </div>
    </section>
    
    <section class="section" id="how-it-works">
        <div class="section-title">
            <h2>How It Works</h2>
        </div>
        
        <div class="booking-steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Select Your Ride</h3>
                <p>Choose between on-demand or pre-booked rides based on your schedule</p>
            </div>
            
            <div class="step">
                <div class="step-number">2</div>
                <h3>Confirm Booking</h3>
                <p>Enter your pickup and drop locations and confirm your booking</p>
            </div>
            
            <div class="step">
                <div class="step-number">3</div>
                <h3>Enjoy Your Ride</h3>
                <p>Track your E-Rickshaw in real-time and enjoy a comfortable ride</p>
            </div>
        </div>
    </section>
    
    <section class="section pricing">
        <div class="section-title">
            <h2>Our Pricing</h2>
        </div>
        
        <div class="pricing-plans">
            <div class="plan">
                <div class="plan-header">
                    <h3 class="plan-name">Standard Ride</h3>
                    <div class="plan-price">₹20 <span>/ride</span></div>
                </div>
                <ul class="plan-features">
                    <li>Point-to-point campus travel</li>
                    <li>Shared ride option available</li>
                    <li>Estimated 5-10 min wait time</li>
                    <li>24/7 availability</li>
                </ul>
                <a href="./log.php" class="btn btn-outline">Book Now</a>
            </div>
            
            <div class="plan">
                <div class="popular">Popular</div>
                <div class="plan-header">
                    <h3 class="plan-name">Student Pass</h3>
                    <div class="plan-price">₹150 <span>/week</span></div>
                </div>
                <ul class="plan-features">
                    <li>Unlimited standard rides</li>
                    <li>Priority booking</li>
                    <li>Exclusive student discount</li>
                    <li>Valid student ID required</li>
                </ul>
                <a href="./log.php" class="btn btn-solid">Get Pass</a>
            </div>
            
            <div class="plan">
                <div class="plan-header">
                    <h3 class="plan-name">Premium Ride</h3>
                    <div class="plan-price">₹50 <span>/ride</span></div>
                </div>
                <ul class="plan-features">
                    <li>Direct non-stop service</li>
                    <li>Luxury seating</li>
                    <li>Immediate pickup</li>
                    <li>Personalized service</li>
                </ul>
                <a href="./log.php" class="btn btn-outline">Book Now</a>
            </div>
        </div>
    </section>
    
    <section class="section testimonials">
        <div class="section-title">
            <h2>What Our Riders Say</h2>
        </div>
        
        <div class="testimonial-grid">
            <div class="testimonial">
                <div class="testimonial-content">
                    <p>The E-Rickshaw service has made getting to my early morning classes so much easier. Always on time and the drivers are very friendly!</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Rahul Sharma">
                    </div>
                    <div class="author-info">
                        <h4>Rahul Sharma</h4>
                        <p>B.Tech CSE, LPU</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial">
                <div class="testimonial-content">
                    <p>As a faculty member, I appreciate the eco-friendly aspect of this service. It's reliable and has significantly reduced my walking time between buildings.</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Dr. Priya Patel">
                    </div>
                    <div class="author-info">
                        <h4>Dr. Priya Patel</h4>
                        <p>Faculty of Management</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial">
                <div class="testimonial-content">
                    <p>The student weekly pass is a game-changer! Affordable and convenient for my daily commute from hostel to different academic blocks.</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Anjali Gupta">
                    </div>
                    <div class="author-info">
                        <h4>Anjali Gupta</h4>
                        <p>MBA Student</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section">
        <div class="promo-banner">
            <h3>Special Offer for New Users!</h3>
            <p>Get your first 3 rides at 50% off when you sign up today. Limited time offer for LPU students and staff.</p>
            <a href="./register.php" class="btn btn-accent">Sign Up Now</a>
        </div>
    </section>
    
    <footer>
        <div class="footer-container">
            <div class="footer-about">
                <div class="footer-logo">
                    <i class="fas fa-rickshaw"></i>
                    <span>LPU E-Rickshaw</span>
                </div>
                <p>Providing smart, sustainable transportation solutions across Lovely Professional University campus since 2023.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="./about.php">About Us</a></li>
                    <li><a href="./demo main.php">Services</a></li>
                    <li><a href="#how-it-works">How It Works</a></li>
                    <li><a href="./help.php">Help Center</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h3>Services</h3>
                <ul>
                    <li><a href="#">On-Demand Rides</a></li>
                    <li><a href="#">Pre-Booking</a></li>
                    <li><a href="#">Student Pass</a></li>
                    <li><a href="#">Campus Tour</a></li>
                    <li><a href="#">Special Events</a></li>
                </ul>
            </div>
            
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> Transport Center, Lovely Professional University, Phagwara</p>
                <p><i class="fas fa-phone"></i> +91 98765 43210</p>
                <p><i class="fas fa-envelope"></i> erickshaw@lpu.co.in</p>
                <p><i class="fas fa-clock"></i> 6:00 AM - 10:00 PM (Daily)</p>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2023 LPU E-Rickshaw Service. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        </div>
    </footer>
    
    <script>
        // Mobile menu toggle
        const menuBtn = document.getElementById('menuBtn');
        const mainNav = document.getElementById('mainNav');
        const authButtons = document.getElementById('authButtons');
        
        menuBtn.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            authButtons.classList.toggle('active');
            
            // Change icon
            const icon = this.querySelector('i');
            if (icon.classList.contains('fa-bars')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 70,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (mainNav.classList.contains('active')) {
                        mainNav.classList.remove('active');
                        authButtons.classList.remove('active');
                        menuBtn.querySelector('i').classList.remove('fa-times');
                        menuBtn.querySelector('i').classList.add('fa-bars');
                    }
                }
            });
        });
        
        // Add shadow to header on scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 10) {
                header.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.1)';
            } else {
                header.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.1)';
            }
        });
    </script>
</body>
</html>