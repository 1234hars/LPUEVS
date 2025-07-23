<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPU E-Rikshaw Booking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --lpu-maroon: #800000;
            --lpu-maroon-light: rgba(128, 0, 0, 0.8);
            --lpu-gold: #FFD700;
            --light-gray: #f8f9fa;
            --dark-gray: #343a40;
            --white: #ffffff;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--light-gray);
            color: var(--dark-gray);
            line-height: 1.6;
        }

        header {
            background: linear-gradient(135deg, var(--lpu-maroon), var(--lpu-maroon-light));
            color: var(--white);
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .header-scrolled {
            padding: 10px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--white);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo i {
            color: var(--lpu-gold);
        }

        .navbar-nav {
            gap: 15px;
        }

        .nav-link {
            color: var(--white) !important;
            font-weight: 500;
            padding: 8px 15px !important;
            border-radius: 5px;
            transition: var(--transition);
            position: relative;
        }

        .nav-link:hover, .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: var(--lpu-gold) !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--lpu-gold);
            transition: var(--transition);
        }

        .nav-link:hover::after, .nav-link.active::after {
            width: 70%;
        }

        .hero {
            margin-top: 76px;
            position: relative;
            height: 500px;
            overflow: hidden;
        }

        .hero-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2;
        }

        .hero-text {
            max-width: 600px;
            color: white;
            padding: 0 30px;
        }

        .hero-text h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero-text p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .hero-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }

        .booking-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: var(--shadow);
            margin-top: -100px;
            position: relative;
            z-index: 10;
        }

        .booking-form .form-control {
            height: 50px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding-left: 15px;
        }

        .booking-form .form-control:focus {
            border-color: var(--lpu-maroon);
            box-shadow: 0 0 0 0.25rem rgba(128, 0, 0, 0.25);
        }

        .btn-primary {
            background-color: var(--lpu-maroon);
            border-color: var(--lpu-maroon);
            height: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary:hover {
            background-color: var(--lpu-maroon-light);
            border-color: var(--lpu-maroon-light);
        }

        .section {
            padding: 80px 0;
            position: relative;
        }

        .section-title {
            color: var(--lpu-maroon);
            font-weight: 700;
            margin-bottom: 40px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--lpu-maroon);
        }

        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: var(--shadow);
            text-align: center;
            transition: var(--transition);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--lpu-maroon);
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-left: 4px solid var(--lpu-maroon);
        }

        .faq:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .faq-question {
            color: var(--lpu-maroon);
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .faq-question i {
            transition: var(--transition);
        }

        .faq-answer {
            display: none;
            padding-top: 10px;
            color: var(--dark-gray);
        }

        .faq.active .faq-answer {
            display: block;
        }

        .faq.active .faq-question i {
            transform: rotate(180deg);
        }

        .driver-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            margin-bottom: 30px;
        }

        .driver-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .driver-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .driver-info {
            padding: 20px;
        }

        .driver-rating {
            color: var(--lpu-gold);
            margin-bottom: 10px;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }

        .contact-card {
            background: var(--white);
            padding: 25px;
            border-radius: 10px;
            box-shadow: var(--shadow);
            width: 250px;
            text-align: center;
            transition: var(--transition);
        }

        .contact-card:hover {
            transform: translateY(-5px);
        }

        .contact-icon {
            font-size: 2.5rem;
            color: var(--lpu-maroon);
            margin-bottom: 15px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: var(--lpu-maroon);
            color: var(--white);
            border-radius: 50%;
            font-size: 1.5rem;
            transition: var(--transition);
        }

        .social-link:hover {
            background: var(--lpu-gold);
            color: var(--lpu-maroon);
            transform: translateY(-3px);
        }

        footer {
            background: linear-gradient(135deg, var(--lpu-maroon), var(--lpu-maroon-light));
            color: var(--white);
            padding: 40px 0 20px;
            text-align: center;
        }

        .footer-logo {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: inline-block;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .footer-link {
            color: var(--white);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-link:hover {
            color: var(--lpu-gold);
        }

        .copyright {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--lpu-maroon);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background: var(--lpu-gold);
            color: var(--lpu-maroon);
        }

        /* Booking steps */
        .booking-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
        }

        .booking-steps::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 3px;
            background: #ddd;
            z-index: 1;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ddd;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 10px;
            transition: var(--transition);
        }

        .step.active .step-number {
            background: var(--lpu-maroon);
            color: white;
        }

        .step.completed .step-number {
            background: var(--lpu-gold);
            color: var(--lpu-maroon);
        }

        .step-text {
            font-weight: 500;
            color: #666;
            text-align: center;
        }

        .step.active .step-text {
            color: var(--lpu-maroon);
            font-weight: 600;
        }

        .step.completed .step-text {
            color: var(--lpu-maroon);
        }

        /* Map container */
        .map-container {
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        /* Ride options */
        .ride-option {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: var(--transition);
        }

        .ride-option:hover {
            border-color: var(--lpu-maroon);
        }

        .ride-option.selected {
            border: 2px solid var(--lpu-maroon);
            background-color: rgba(128, 0, 0, 0.05);
        }

        .ride-icon {
            font-size: 1.5rem;
            color: var(--lpu-maroon);
            margin-right: 15px;
        }

        .ride-price {
            font-weight: 600;
            color: var(--lpu-maroon);
        }

        /* Payment methods */
        .payment-method {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: var(--transition);
        }

        .payment-method:hover {
            border-color: var(--lpu-maroon);
        }

        .payment-method.selected {
            border: 2px solid var(--lpu-maroon);
            background-color: rgba(128, 0, 0, 0.05);
        }

        .payment-icon {
            font-size: 1.5rem;
            color: var(--lpu-maroon);
            margin-right: 15px;
        }

        /* Confirmation */
        .confirmation-icon {
            font-size: 5rem;
            color: var(--lpu-maroon);
            margin-bottom: 20px;
        }

        @media (max-width: 992px) {
            .hero {
                height: 400px;
            }
            
            .hero-text h1 {
                font-size: 2.2rem;
            }
            
            .section {
                padding: 60px 0;
            }
        }

        @media (max-width: 768px) {
            .hero {
                height: 350px;
            }
            
            .hero-text {
                max-width: 100%;
                text-align: center;
            }
            
            .hero-text h1 {
                font-size: 2rem;
            }
            
            .hero-text p {
                font-size: 1rem;
            }
            
            .booking-card {
                margin-top: 0;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .booking-steps {
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }
            
            .booking-steps::before {
                display: none;
            }
            
            .step {
                flex: 0 0 calc(50% - 20px);
            }
        }

        @media (max-width: 576px) {
            .logo {
                font-size: 1.5rem;
            }
            
            .hero {
                height: 300px;
                margin-top: 60px;
            }
            
            .section {
                padding: 40px 0;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .faq-question {
                font-size: 1.1rem;
            }
            
            .back-to-top {
                width: 40px;
                height: 40px;
                font-size: 1rem;
                bottom: 20px;
                right: 20px;
            }
            
            .step {
                flex: 0 0 100%;
            }
        }
    </style>
</head>
<body>
    <header id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand logo" href="#">
                    <i class="fas fa-rickshaw"></i>
                    <span>LPU E-Rikshaw</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/log/welcome.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#booking">Book Now</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#faq">Help</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-outline-light" href="http://localhost/log/login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section class="hero">
        <img src="https://images.unsplash.com/photo-1581093196276-3c1113e9cc8a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="E-Rikshaw on campus" class="hero-image">
        <div class="hero-content">
            <div class="container">
                <div class="hero-text">
                    <h1>Campus E-Rikshaw Booking</h1>
                    <p>Safe, affordable, and eco-friendly transportation across LPU campus. Book your ride in seconds!</p>
                    <a href="#booking" class="btn btn-primary btn-lg">Book Now</a>
                </div>
            </div>
        </div>
    </section>

    <section id="booking" class="section">
        <div class="container">
            <div class="booking-card">
                <h2 class="text-center mb-4">Book Your E-Rikshaw</h2>
                
                <div class="booking-steps mb-5">
                    <div class="step active" id="step1">
                        <div class="step-number">1</div>
                        <div class="step-text">Pickup & Destination</div>
                    </div>
                    <div class="step" id="step2">
                        <div class="step-number">2</div>
                        <div class="step-text">Choose Ride</div>
                    </div>
                    <div class="step" id="step3">
                        <div class="step-number">3</div>
                        <div class="step-text">Payment</div>
                    </div>
                    <div class="step" id="step4">
                        <div class="step-number">4</div>
                        <div class="step-text">Confirmation</div>
                    </div>
                </div>
                
                <div id="booking-step1">
                    <div class="map-container mb-4">
                        <!-- Map placeholder - would be replaced with actual map integration -->
                        <div style="width: 100%; height: 100%; background: #eee; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-map-marked-alt" style="font-size: 3rem; color: #999;"></i>
                        </div>
                    </div>
                    
                    <form class="booking-form">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="pickup" class="form-label">Pickup Location</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    <input type="text" class="form-control" id="pickup" placeholder="Where are you now?">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="destination" class="form-label">Destination</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-flag-checkered"></i></span>
                                    <input type="text" class="form-control" id="destination" placeholder="Where to?">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Date</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    <input type="date" class="form-control" id="date">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="time" class="form-label">Time</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    <input type="time" class="form-control" id="time">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary" onclick="nextStep(1)">Find Rides</button>
                        </div>
                    </form>
                </div>
                
                <div id="booking-step2" style="display: none;">
                    <h4 class="mb-4">Available Rides</h4>
                    
                    <div class="ride-option" onclick="selectRide(this)">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-rickshaw ride-icon"></i>
                                <div>
                                    <h5 class="mb-1">Standard E-Rikshaw</h5>
                                    <p class="mb-0 text-muted">Seats up to 3 passengers</p>
                                </div>
                            </div>
                            <div class="ride-price">₹30</div>
                        </div>
                    </div>
                    
                    <div class="ride-option" onclick="selectRide(this)">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-rickshaw ride-icon"></i>
                                <div>
                                    <h5 class="mb-1">Premium E-Rikshaw</h5>
                                    <p class="mb-0 text-muted">Seats up to 4 passengers with comfort seats</p>
                                </div>
                            </div>
                            <div class="ride-price">₹50</div>
                        </div>
                    </div>
                    
                    <div class="ride-option" onclick="selectRide(this)">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-rickshaw ride-icon"></i>
                                <div>
                                    <h5 class="mb-1">Group E-Rikshaw</h5>
                                    <p class="mb-0 text-muted">Seats up to 6 passengers</p>
                                </div>
                            </div>
                            <div class="ride-price">₹80</div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary" onclick="prevStep(2)">Back</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(2)">Continue to Payment</button>
                    </div>
                </div>
                
                <div id="booking-step3" style="display: none;">
                    <h4 class="mb-4">Payment Method</h4>
                    
                    <div class="payment-method" onclick="selectPayment(this)">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-wallet payment-icon"></i>
                            <div>
                                <h5 class="mb-1">Cash Payment</h5>
                                <p class="mb-0 text-muted">Pay directly to the driver</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="payment-method" onclick="selectPayment(this)">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-credit-card payment-icon"></i>
                            <div>
                                <h5 class="mb-1">Credit/Debit Card</h5>
                                <p class="mb-0 text-muted">Pay securely with your card</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="payment-method" onclick="selectPayment(this)">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-mobile-alt payment-icon"></i>
                            <div>
                                <h5 class="mb-1">UPI Payment</h5>
                                <p class="mb-0 text-muted">Pay via PhonePe, GPay, etc.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary" onclick="prevStep(3)">Back</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(3)">Confirm Booking</button>
                    </div>
                </div>
                
                <div id="booking-step4" style="display: none;">
                    <div class="text-center py-4">
                        <i class="fas fa-check-circle confirmation-icon text-success"></i>
                        <h3 class="mb-3">Booking Confirmed!</h3>
                        <p class="lead">Your e-rikshaw will arrive at your pickup location shortly.</p>
                        <p>Booking ID: <strong>LPUER-2023-45678</strong></p>
                        <p>Driver: <strong>Rajesh Kumar</strong> (4.8 ★)</p>
                        <p>Estimated arrival: <strong>5 minutes</strong></p>
                        <div class="mt-4">
                            <button class="btn btn-primary me-2">View Booking Details</button>
                            <button class="btn btn-outline-secondary" onclick="resetBooking()">Book Another Ride</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="section bg-light">
        <div class="container">
            <h2 class="text-center section-title">Why Choose LPU E-Rikshaw?</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3>Fast Booking</h3>
                        <p>Book your ride in less than 30 seconds with our simple and intuitive booking system.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <h3>Affordable Rates</h3>
                        <p>Special discounted rates for LPU students and staff with transparent pricing.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3>Eco-Friendly</h3>
                        <p>100% electric vehicles helping reduce carbon footprint on campus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="drivers" class="section">
        <div class="container">
            <h2 class="text-center section-title">Our Trusted Drivers</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="driver-card">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Driver" class="driver-img">
                        <div class="driver-info">
                            <h4>Rajesh Kumar</h4>
                            <div class="driver-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>4.7 (128)</span>
                            </div>
                            <p>5 years experience serving LPU community. Speaks English, Hindi, and Punjabi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="driver-card">
                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Driver" class="driver-img">
                        <div class="driver-info">
                            <h4>Harpreet Singh</h4>
                            <div class="driver-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>5.0 (96)</span>
                            </div>
                            <p>3 years experience. Known for punctuality and safe driving.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="driver-card">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Driver" class="driver-img">
                        <div class="driver-info">
                            <h4>Priya Sharma</h4>
                            <div class="driver-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>4.9 (112)</span>
                            </div>
                            <p>2 years experience. Always helpful with luggage and directions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="section bg-light">
        <div class="container">
            <h2 class="text-center section-title">Frequently Asked Questions</h2>
            <div class="faq-container">
                <div class="faq">
                    <div class="faq-question">
                        <span>How do I book an e-rickshaw?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Booking is simple! Just use our booking form above to select your pickup and destination locations, choose your preferred ride type, and complete the payment. You'll receive a confirmation with your driver details and estimated arrival time.</p>
                    </div>
                </div>

                <div class="faq">
                    <div class="faq-question">
                        <span>What are the operating hours?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our e-rickshaw service operates from 7:00 AM to 10:00 PM daily, including weekends and holidays. Special arrangements can be made for late-night transportation needs.</p>
                    </div>
                </div>

                <div class="faq">
                    <div class="faq-question">
                        <span>Is there a student discount available?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! LPU students get a 15% discount on all rides when they show their valid student ID. Additionally, we offer semester passes at discounted rates for frequent commuters.</p>
                    </div>
                </div>

                <div class="faq">
                    <div class="faq-question">
                        <span>How can I cancel my booking?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>You can cancel your booking through our website or mobile app up to 15 minutes before your scheduled pickup time. Cancellations may be subject to a small fee depending on how close to the pickup time they are made.</p>
                    </div>
                </div>

                <div class="faq">
                    <div class="faq-question">
                        <span>Are the e-rickshaws wheelchair accessible?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Currently, we have 5 wheelchair accessible e-rickshaws in our fleet. Please mention your accessibility needs when booking to ensure we assign an appropriate vehicle.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section">
        <div class="container">
            <h2 class="text-center section-title">Contact Us</h2>
            <p class="text-center mb-5">Have questions or feedback? We'd love to hear from you!</p>
            
            <div class="contact-info">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4>Email</h4>
                    <p><a href="mailto:info@lpu-erickshaw.com">info@lpu-erickshaw.com</a></p>
                </div>
                
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h4>Phone</h4>
                    <p>+91 98765 43210</p>
                    <p>7AM - 10PM Daily</p>
                </div>
                
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4>Location</h4>
                    <p>Transport Office, Block 32</p>
                    <p>LPU Campus