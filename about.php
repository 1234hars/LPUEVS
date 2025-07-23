<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - LPU EVS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #2E7D32;
            --secondary-color: #4CAF50;
            --accent-color: #8BC34A;
            --dark-color: #263238;
            --light-color: #f5f5f5;
            --text-color: #333;
            --text-light: #666;
            --transition: all 0.3s ease;
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --box-shadow-hover: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--light-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        /* Header Styles */
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            z-index: 10;
        }
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: 700;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        
        .logo span {
            color: var(--accent-color);
            margin-left: 0.5rem;
        }
        
        .logo i {
            margin-right: 0.8rem;
            font-size: 1.8rem;
        }
        
        .nav-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 100;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 2rem;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
            padding: 0.5rem 0;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent-color);
            transition: var(--transition);
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        /* Decorative Elements */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            z-index: 0;
        }
        
        .circle-1 {
            width: 200px;
            height: 200px;
            top: -50px;
            right: -50px;
        }
        
        .circle-2 {
            width: 150px;
            height: 150px;
            bottom: -30px;
            left: -30px;
        }
        
        /* Main Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        /* Typography */
        h1, h2, h3, h4 {
            color: var(--dark-color);
            margin-bottom: 1.5rem;
            position: relative;
            font-weight: 700;
        }
        
        h1 {
            font-size: 2.5rem;
            text-align: center;
            margin: 2rem 0;
            line-height: 1.2;
        }
        
        h1::after {
            content: "";
            display: block;
            width: 80px;
            height: 4px;
            background: var(--secondary-color);
            margin: 1rem auto;
            border-radius: 2px;
        }
        
        h2 {
            font-size: 2rem;
            text-align: center;
            margin: 3rem 0 2rem;
        }
        
        h2::after {
            content: "";
            display: block;
            width: 60px;
            height: 3px;
            background: var(--accent-color);
            margin: 1rem auto;
            border-radius: 2px;
        }
        
        h3 {
            font-size: 1.5rem;
        }
        
        p {
            margin-bottom: 1.5rem;
            color: var(--text-light);
        }
        
        /* About Section */
        .about {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: var(--box-shadow);
            margin-bottom: 3rem;
            font-size: 1.1rem;
            line-height: 1.8;
            position: relative;
            overflow: hidden;
            transition: var(--transition);
        }
        
        .about:hover {
            transform: translateY(-5px);
            box-shadow: var(--box-shadow-hover);
        }
        
        .about-highlight {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        /* Mission Vision Section */
        .mission-vision {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }
        
        .card {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: var(--box-shadow);
            text-align: center;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--accent-color));
            transition: var(--transition);
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: var(--box-shadow-hover);
        }
        
        .card:hover::before {
            width: 100%;
            opacity: 0.1;
        }
        
        .card i {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
            transition: var(--transition);
        }
        
        .card:hover i {
            transform: scale(1.1);
            color: var(--primary-color);
        }
        
        .card h3 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            transition: var(--transition);
        }
        
        .card:hover h3 {
            color: var(--secondary-color);
        }
        
        /* Stats Section */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin: 4rem 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
        }
        
        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--box-shadow-hover);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }
        
        .stat-item:hover .stat-number,
        .stat-item:hover .stat-label {
            color: white;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            transition: var(--transition);
        }
        
        .stat-label {
            color: var(--text-light);
            font-size: 1.1rem;
            font-weight: 500;
            transition: var(--transition);
        }
        
        /* Team Section */
        .developers {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }
        
        .developer {
            background: white;
            border-radius: 15px;
            box-shadow: var(--box-shadow);
            padding: 2rem;
            text-align: center;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        
        .developer:hover {
            transform: translateY(-10px);
            box-shadow: var(--box-shadow-hover);
        }
        
        .developer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }
        
        .developer-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(76, 175, 80, 0.2);
            margin: 0 auto 1.5rem;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .developer:hover .developer-img {
            transform: scale(1.05);
            border-color: rgba(76, 175, 80, 0.4);
        }
        
        .developer h3 {
            color: var(--primary-color);
            margin: 1rem 0 0.5rem;
            font-size: 1.4rem;
        }
        
        .developer .role {
            color: var(--secondary-color);
            font-weight: 500;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        
        .developer p {
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }
        
        .social-links a {
            color: var(--primary-color);
            background: rgba(76, 175, 80, 0.1);
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }
        
        .social-links a:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }
        
        /* Group Photo Section */
        .group-photo {
            width: 100%;
            margin: 3rem 0;
            text-align: center;
        }
        
        .group-photo img {
            max-width: 100%;
            border-radius: 15px;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
        }
        
        .group-photo img:hover {
            transform: scale(1.02);
            box-shadow: var(--box-shadow-hover);
        }
        
        .group-photo-caption {
            margin-top: 1rem;
            font-style: italic;
            color: var(--text-light);
        }
        
        /* Footer Styles */
        footer {
            background: var(--dark-color);
            color: white;
            padding: 4rem 0 2rem;
            position: relative;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }
        
        .footer-section {
            margin-bottom: 2rem;
        }
        
        .footer-section h3 {
            color: white;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--accent-color);
        }
        
        .footer-section p {
            color: #bbb;
            margin-bottom: 1rem;
            line-height: 1.6;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: #bbb;
            text-decoration: none;
            transition: var(--transition);
            display: block;
        }
        
        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }
        
        .contact-info {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: #bbb;
        }
        
        .contact-info i {
            margin-right: 1rem;
            color: var(--accent-color);
            width: 20px;
            text-align: center;
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid #444;
            color: #999;
            font-size: 0.9rem;
        }
        
        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            z-index: 99;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            background: var(--secondary-color);
            transform: translateY(-5px);
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease forwards;
        }
        
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
        .delay-3 { animation-delay: 0.6s; }
        .delay-4 { animation-delay: 0.8s; }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .header-content {
                padding: 0 1.5rem;
            }
            
            .container {
                padding: 1.5rem;
            }
            
            h1 {
                font-size: 2.2rem;
            }
            
            h2 {
                font-size: 1.8rem;
            }
        }
        
        @media (max-width: 768px) {
            .nav-toggle {
                display: block;
            }
            
            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                max-width: 300px;
                height: 100vh;
                background: var(--dark-color);
                flex-direction: column;
                align-items: center;
                justify-content: center;
                transition: var(--transition);
                z-index: 90;
                padding: 2rem;
            }
            
            .nav-links.active {
                right: 0;
            }
            
            .nav-links li {
                margin: 1rem 0;
            }
            
            .about, .card, .stat-item, .developer {
                padding: 1.5rem;
            }
            
            .circle-1, .circle-2 {
                display: none;
            }
        }
        
        @media (max-width: 576px) {
            .header-content {
                padding: 0 1rem;
            }
            
            .logo {
                font-size: 1.5rem;
            }
            
            .logo i {
                font-size: 1.3rem;
            }
            
            h1 {
                font-size: 1.8rem;
                margin: 1.5rem 0;
            }
            
            h2 {
                font-size: 1.5rem;
                margin: 2rem 0 1.5rem;
            }
            
            .container {
                padding: 1rem;
            }
            
            .about, .card, .stat-item, .developer {
                padding: 1.2rem;
            }
            
            .developer-img {
                width: 120px;
                height: 120px;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .back-to-top {
                width: 40px;
                height: 40px;
                font-size: 1rem;
                bottom: 1rem;
                right: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <a href="#" class="logo">
                <i class="fas fa-car"></i>LPU<span>EVS</span>
            </a>
            
            <button class="nav-toggle" id="navToggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <ul class="nav-links" id="navLinks">
                <li><a href="./index.php.php">Home</a></li>
                <li><a href="./demo main.php">Services</a></li>
                <li><a href="./log.php">Book Ride</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
        </div>
    </header>
    
    <div class="container">
        <h1 class="fade-in">About LPU EVS</h1>
        
        <div class="about fade-in delay-1">
            <p>LPU EVS is an innovative solution for efficient, safe, and eco-friendly transportation within the Lovely Professional University campus. Our platform addresses the major problems associated with traditional auto-rickshaws by providing timely ride booking, live tracking, and enhanced security through CCTV monitoring.</p>
            
            <p>With a commitment to sustainability and user convenience, LPU EVS combines cutting-edge technology with a user-centric approach to revolutionize campus transportation. Our <span class="about-highlight">electric vehicles</span> not only reduce carbon emissions but also provide a quieter, smoother ride experience for the LPU community.</p>
            
            <p>We're proud to serve over <span class="about-highlight">25,000 students and staff</span> with our fleet of 100% electric vehicles, making LPU a greener and more accessible campus.</p>
        </div>
        
        <div class="mission-vision">
            <div class="card fade-in delay-1">
                <i class="fas fa-bullseye"></i>
                <h3>Our Mission</h3>
                <p>To provide a seamless, sustainable, and secure transportation solution that enhances mobility within the LPU campus while reducing environmental impact.</p>
            </div>
            
            <div class="card fade-in delay-2">
                <i class="fas fa-eye"></i>
                <h3>Our Vision</h3>
                <p>To become the benchmark for smart campus transportation in India, setting new standards in efficiency, safety, and environmental responsibility.</p>
            </div>
            
            <div class="card fade-in delay-3">
                <i class="fas fa-handshake"></i>
                <h3>Our Values</h3>
                <p>Sustainability, Innovation, Safety, Reliability, and User Satisfaction are the core values that drive every aspect of our service.</p>
            </div>
        </div>
        
        <div class="stats">
            <div class="stat-item fade-in delay-1">
                <div class="stat-number">500+</div>
                <div class="stat-label">Daily Rides</div>
            </div>
            <div class="stat-item fade-in delay-2">
                <div class="stat-number">100%</div>
                <div class="stat-label">Electric Fleet</div>
            </div>
            <div class="stat-item fade-in delay-3">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Availability</div>
            </div>
            <div class="stat-item fade-in delay-4">
                <div class="stat-number">99%</div>
                <div class="stat-label">User Satisfaction</div>
            </div>
        </div>
        
        <h2 class="fade-in">Meet Our Team</h2>
        
        <!-- Group Photo Section
        <div class="group-photo fade-in delay-1">
            <img src="./116430462_10158233594041590_6807335707141783505_n.jpg" alt="LPU EVS Team">
            <p class="group-photo-caption">The LPU EVS development team working together on our innovative transportation solution</p>
        </div>
         -->
        
        <div class="developers">
            <div class="developer fade-in delay-1">
                <img src="./Screenshot 2025-03-04 024125.png" alt="Harsh Kumar" class="developer-img">
                <h3>Harsh Kumar</h3>
                <div class="role">Lead Developer</div>
                <p>Harsh is a seasoned software engineer with a passion for developing innovative transportation solutions. He led the development of the LPU EVS platform.</p>
                <div class="social-links">
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="developer fade-in delay-2">
                <img src="./Screenshot 2025-04-08 001717.png" alt="Aman Jain" class="developer-img">
                <h3>Aman Jain</h3>
                <div class="role">Frontend Developer</div>
                <p>Aman is responsible for the sleek and user-friendly design of the LPU EVS website. His expertise in frontend technologies ensures a seamless user experience.</p>
                <div class="social-links">
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="developer fade-in delay-3">
                <img src="./y.png" alt="Yash" class="developer-img">
                <h3>Yash</h3>
                <div class="role">Backend Developer</div>
                <p>Yash specializes in server-side development and database management. He ensured the platform's reliability and security with robust backend architecture.</p>
                <div class="social-links">
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="developer fade-in delay-4">
                <img src="./Screenshot 2025-07-23 215923.png" alt="Deepinder kaur " class="developer-img">
                <h3>Deepinder kaur</h3>
                <div class="role">Assistant Professor</div>
                <p>      Contributed to both frontend and backend development, bringing the LPU EVS platform to life with versatile technical skills and academic expertise.</p>
                <div class="social-links">
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>About LPU EVS</h3>
                <p>Revolutionizing campus transportation with eco-friendly electric vehicles and smart technology solutions.</p>
                <p>Committed to sustainability and user convenience.</p>
                <div class="social-links" style="justify-content: flex-start; margin-top: 1rem;">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Book a Ride</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact Us</h3>
                <div class="contact-info">
                    <i class="fas fa-envelope"></i>
                    <p>info@lpu-evs.com</p>
                </div>
                <div class="contact-info">
                    <i class="fas fa-phone"></i>
                    <p>+91 9876543210</p>
                </div>
                <div class="contact-info">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Lovely Professional University, Phagwara, Punjab</p>
                </div>
            </div>
        </div>
        
        <div class="copyright">
            &copy; 2023 LPU EVS. All Rights Reserved. | Designed with <i class="fas fa-heart" style="color: #ff4d4d;"></i> by LPU Team
        </div>
    </footer>
    
    <a href="#" class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </a>
    
    <script>
        // Mobile Navigation Toggle
        const navToggle = document.getElementById('navToggle');
        const navLinks = document.getElementById('navLinks');
        
        navToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            navToggle.innerHTML = navLinks.classList.contains('active') ? 
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });
        
        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                navToggle.innerHTML = '<i class="fas fa-bars"></i>';
            });
        });
        
        // Back to Top Button
        const backToTop = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('active');
            } else {
                backToTop.classList.remove('active');
            }
        });
        
        // Smooth scrolling for all links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Animation on scroll
        const fadeElements = document.querySelectorAll('.fade-in');
        
        const fadeInOnScroll = () => {
            fadeElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                
                if (elementTop < windowHeight - 100) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        };
        
        // Initial check
        fadeInOnScroll();
        
        // Check on scroll
        window.addEventListener('scroll', fadeInOnScroll);
    </script>
</body>
</html>