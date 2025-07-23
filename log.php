<?php
// Start session at the very beginning (no whitespace before this)
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "lpuevs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error variable
$error = '';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check user in the database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // If password is correct, set session and redirect
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['usertype'] = $row['usertype'];

            if ($row['usertype'] == 'user') {
                header("Location: passenger_dashboard.php");
                exit();
            } else if ($row['usertype'] == 'driver') {
                header("Location: driver_dashboard.php");
                exit();
            }
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "No user found with that username!";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LPU EVS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --warning-color: #f72585;
            --border-radius: 12px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
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
            background: url('./uni mall lpu.webp') no-repeat center center;
            background-size: cover;
            opacity: 0.2;
            z-index: -1;
        }

        .quote-container {
            position: absolute;
            top: 10%;
            width: 100%;
            text-align: center;
            padding: 0 20px;
        }

        .quote {
            font-size: 2rem;
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
            font-weight: 700;
            background: linear-gradient(90deg, #ffffff, #e0e0e0);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeIn 1.5s ease-in-out;
            letter-spacing: 1px;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .container {
            width: 100%;
            max-width: 380px;
            padding: 30px 25px;
            background: rgba(255, 255, 255, 0.98);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            text-align: center;
            transition: var(--transition);
            animation: slideUp 1s ease-in-out;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin-top: 60px;
        }

        @keyframes slideUp {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .logo {
            width: 70px;
            height: 70px;
            margin: 0 auto 15px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }

        .container h2 {
            margin-bottom: 20px;
            color: var(--dark-color);
            font-weight: 600;
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: var(--dark-color);
            font-weight: 500;
            font-size: 0.85rem;
        }

        .input-field {
            width: 100%;
            height: 45px;
            padding: 0 15px 0 40px;
            border-radius: var(--border-radius);
            border: 1px solid #e0e0e0;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            transition: var(--transition);
            background-color: rgba(255, 255, 255, 0.9);
        }

        .input-field:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
            outline: none;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 34px;
            color: #777;
            font-size: 1rem;
        }

        .btn {
            width: 100%;
            height: 45px;
            border-radius: var(--border-radius);
            border: none;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 0.95rem;
            cursor: pointer;
            transition: var(--transition);
            margin: 8px 0;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }

        .btn:hover {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-secondary {
            background: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            box-shadow: none;
        }

        .btn-secondary:hover {
            background: rgba(67, 97, 238, 0.1);
            box-shadow: none;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 15px 0;
            color: #777;
            font-size: 0.8rem;
        }

        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e0e0e0;
        }

        .divider::before {
            margin-right: 10px;
        }

        .divider::after {
            margin-left: 10px;
        }

        .forgot-password {
            margin-top: 12px;
            font-size: 0.85rem;
        }

        .forgot-password a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .forgot-password a:hover {
            text-decoration: underline;
            color: var(--secondary-color);
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 15px;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            color: #555;
            font-size: 1rem;
            border: 1px solid #e0e0e0;
            cursor: pointer;
            transition: var(--transition);
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .social-btn.google:hover {
            color: #DB4437;
            border-color: #DB4437;
        }

        .social-btn.facebook:hover {
            color: #4267B2;
            border-color: #4267B2;
        }

        .social-btn.twitter:hover {
            color: #1DA1F2;
            border-color: #1DA1F2;
        }

        .footer-text {
            margin-top: 20px;
            font-size: 0.75rem;
            color: #777;
            line-height: 1.4;
        }

        .footer-text a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .error-message {
            color: var(--warning-color);
            background: rgba(247, 37, 133, 0.1);
            padding: 10px;
            border-radius: var(--border-radius);
            margin-bottom: 15px;
            font-size: 0.85rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 25px 20px;
                max-width: 90%;
            }
            
            .quote-container {
                top: 8%;
            }
            
            .quote {
                font-size: 1.8rem;
            }
            
            .logo {
                width: 60px;
                height: 60px;
                font-size: 1.6rem;
            }
            
            .input-field {
                height: 42px;
                padding-left: 38px;
            }
            
            .input-icon {
                top: 32px;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            
            .container {
                padding: 22px 18px;
                margin-top: 50px;
            }
            
            .quote {
                font-size: 1.5rem;
            }
            
            .logo {
                width: 55px;
                height: 55px;
                font-size: 1.5rem;
            }
            
            .container h2 {
                font-size: 1.3rem;
                margin-bottom: 15px;
            }
            
            .btn {
                height: 42px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="quote-container">
        <div class="quote"></div>
    </div>
    
    <div class="container">
        <div class="logo">
            <i class="fas fa-car"></i>
        </div>
        <h2>Welcome Back!</h2>
        
        <?php if (!empty($error)): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <i class="fas fa-user input-icon"></i>
                <input type="text" id="username" name="username" class="input-field" placeholder="Enter your username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password" name="password" class="input-field" placeholder="Enter your password" required>
            </div>
            
            <button type="submit" class="btn">Login</button>
            
            <div class="divider">or</div>
            
            <div class="social-login">
                <div class="social-btn google">
                    <i class="fab fa-google"></i>
                </div>
                <div class="social-btn facebook">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="social-btn twitter">
                    <i class="fab fa-twitter"></i>
                </div>
            </div>
            
            <div class="forgot-password">
                <a href="forgotpassword.php">Forgot Password?</a>
            </div>
        </form>
        
        <button class="btn btn-secondary" onclick="window.location.href='register.php';">Create New Account</button>
        
        <div class="footer-text">
            By continuing, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
        </div>
    </div>

    <script>
        // Add animation to social buttons on hover
        document.querySelectorAll('.social-btn').forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                btn.style.transform = 'translateY(-3px)';
            });
            btn.addEventListener('mouseleave', () => {
                btn.style.transform = 'translateY(0)';
            });
        });

        // Add focus effects to input fields
        document.querySelectorAll('.input-field').forEach(input => {
            input.addEventListener('focus', () => {
                input.parentNode.querySelector('.input-icon').style.color = 'var(--primary-color)';
            });
            input.addEventListener('blur', () => {
                input.parentNode.querySelector('.input-icon').style.color = '#777';
            });
        });
    </script>
</body>

</html>