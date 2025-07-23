<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Rikshaw Booking | LPU EVS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4a6bff;
            --primary-dark: #3a56cc;
            --accent: #6dd6ff;
            --success: #4cc9f0;
            --warning: #ff6b6b;
            --light: #f8f9fa;
            --dark: #212529;
            --white: #ffffff;
            --gray: #6c757d;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            --transition: all 0.3s ease;
            --border-radius: 18px;
            --card-bg: rgba(255, 255, 255, 0.12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #3ff2b393 0%, #abf3b5ff 100%);
            color: var(--white);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            line-height: 1.6;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('./116430462_10158233594041590_6807335707141783505_n.jpg') no-repeat center center;
            background-size: cover;
            opacity: 0.15;
            z-index: -1;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background: rgba(100, 235, 237, 0.45);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: var(--border-radius);
            padding: 40px 35px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.18);
            text-align: center;
            transition: var(--transition);
            animation: fadeIn 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .container::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.48) 0%, transparent 70%);
            transform: rotate(30deg);
            z-index: -1;
            pointer-events: none;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-container {
            position: relative;
            width: 110px;
            height: 110px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 50%;
            box-shadow: 0 8px 25px rgba(74, 107, 255, 0.5);
            transition: var(--transition);
            z-index: 1;
        }

        .logo {
            width: 95px;
            height: 90px;
            border-radius: 50%;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            overflow: hidden;
        }

        .logo img {
            width: 70%;
            height: auto;
            object-fit: contain;
        }

        .logo-container:hover .logo-bg {
            transform: rotate(15deg) scale(1.05);
            box-shadow: 0 10px 30px rgba(74, 107, 255, 0.6);
        }

        .logo-container:hover .logo {
            transform: scale(1.05);
        }

        h1 {
            color: var(--white);
            margin-bottom: 30px;
            font-size: 2.2rem;
            font-weight: 600;
            position: relative;
            padding-bottom: 15px;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--success), var(--accent));
            border-radius: 2px;
        }

        .tagline {
            font-size: 0.95rem;
            opacity: 0.9;
            margin-bottom: 25px;
            font-weight: 400;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin: 30px 0;
        }

        .feature {
            padding: 18px 10px;
            background: var(--card-bg);
            border-radius: 12px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: var(--transition);
            cursor: default;
        }

        .feature:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .feature i {
            font-size: 1.8rem;
            margin-bottom: 12px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            transition: var(--transition);
        }

        .feature:hover i {
            transform: scale(1.15);
        }

        .feature p {
            font-size: 0.9rem;
            font-weight: 500;
            opacity: 0.9;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin: 35px 0 25px;
        }

        .btn {
            padding: 16px 25px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: 0.6s;
            z-index: -1;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .btn:active {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: var(--white);
        }

        .btn-success {
            background: linear-gradient(to right, #4cc9f0, #4895ef);
            color: var(--white);
        }

        #message {
            margin: 20px 0;
            padding: 15px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.15);
            color: var(--white);
            font-size: 0.95rem;
            display: none;
            animation: fadeIn 0.3s ease-out;
            border-left: 4px solid var(--warning);
        }

        footer {
            margin-top: 30px;
            font-size: 0.8rem;
            opacity: 0.8;
        }

        footer p {
            position: relative;
            display: inline-block;
        }

        footer p::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.5), transparent);
        }

        .golf-cart {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 200px;
            height: auto;
            animation: drive 8s infinite ease-in-out;
            z-index: 0;
            opacity: 0.9;
            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.3));
            transform-origin: center;
        }

        @keyframes drive {
            0% { transform: translateX(0) rotate(0deg); }
            25% { transform: translateX(-30px) rotate(-5deg); }
            50% { transform: translateX(-60px) rotate(0deg); }
            75% { transform: translateX(-30px) rotate(5deg); }
            100% { transform: translateX(0) rotate(0deg); }
        }

        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            transform: scale(0);
            animation: ripple 1.5s ease-out infinite;
            pointer-events: none;
        }

        @keyframes ripple {
            to {
                transform: scale(2.5);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }
            
            .logo-container {
                width: 100px;
                height: 100px;
            }
            
            .logo {
                width: 80px;
                height: 80px;
            }
            
            h1 {
                font-size: 1.9rem;
            }
            
            .features {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            
            .golf-cart {
                width: 160px;
                bottom: 10px;
                right: 10px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 25px 20px;
                border-radius: 16px;
            }
            
            .logo-container {
                width: 90px;
                height: 90px;
                margin-bottom: 20px;
            }
            
            .logo {
                width: 70px;
                height: 70px;
            }
            
            h1 {
                font-size: 1.6rem;
                margin-bottom: 20px;
            }
            
            .tagline {
                font-size: 0.85rem;
                margin-bottom: 20px;
            }
            
            .btn {
                padding: 14px 20px;
                font-size: 0.9rem;
            }
            
            .golf-cart {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <div class="logo-bg"></div>
            <div class="logo">
                <img src="./g_cart-removebg-preview.png" alt="E-Rikshaw">
            </div>
        </div>
        
        <h1>E-Rikshaw Booking</h1>
        <p class="tagline">Safe, affordable and eco-friendly campus transportation</p>
        
        <div class="features">
            <div class="feature">
                <i class="fas fa-bolt"></i>
                <p>Instant Booking</p>
            </div>
            <div class="feature">
                <i class="fas fa-shield-alt"></i>
                <p>Safe Rides</p>
            </div>
            <div class="feature">
                <i class="fas fa-rupee-sign"></i>
                <p>Affordable</p>
            </div>
        </div>
        
        <div class="btn-group">
            <button class="btn btn-success" id="onTimeBtn">
                <i class="fas fa-bolt"></i> On-Time Booking
            </button>
            <button class="btn btn-primary" id="preBookingBtn">
                <i class="fas fa-calendar-check"></i> Pre-Booking
            </button>
        </div>
        
        <div id="message"></div>
        
        <footer>
            <p>© 2025 LPU EVS. All rights reserved.</p>
        </footer>
    </div>

    <img src="./g_cart-removebg-preview.png" class="golf-cart" alt="E-Rikshaw">

    <script>
        // Create ripple effect on button click
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 1000);
            });
        });

        document.getElementById('onTimeBtn').addEventListener('click', function() {
            const message = document.getElementById("message");
            message.innerHTML = `
                <i class="fas fa-info-circle"></i> On-Time Booking feature will be available soon!
                <div style="margin-top: 8px; font-size: 0.8rem;">
                    <i class="fas fa-spinner fa-spin"></i> Currently under development
                </div>
            `;
            message.style.display = "block";
            
            // Hide message after 4 seconds
            setTimeout(() => {
                message.style.display = "none";
            }, 4000);
        });

        document.getElementById('preBookingBtn').addEventListener('click', function() {
            const btn = this;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Redirecting...';
            btn.style.opacity = '0.8';
            btn.style.pointerEvents = 'none';
            
            // Simulate delay for better UX
            setTimeout(() => {
                window.location.href = 'log.php';
            }, 1000);
        });

        // Add hover effects to features
        document.querySelectorAll('.feature').forEach(feature => {
            feature.addEventListener('mouseenter', function() {
                const icon = this.querySelector('i');
                icon.style.transform = 'scale(1.15)';
            });
            
            feature.addEventListener('mouseleave', function() {
                const icon = this.querySelector('i');
                icon.style.transform = 'scale(1)';
            });
        });

        // Add parallax effect to container
        document.querySelector('.container').addEventListener('mousemove', function(e) {
            const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
            const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
            this.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
        });

        document.querySelector('.container').addEventListener('mouseleave', function() {
            this.style.transform = 'rotateY(0deg) rotateX(0deg)';
        });
    </script>
</body>
</html>