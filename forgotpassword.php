<?php
// Start session at the very beginning (no whitespace before this)
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "lpuevs");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
$message = "";
$messageClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Simulate sending a reset email (you can implement actual email sending here)
        // mail($email, "Password Reset", "Click this link to reset your password: <reset_link>");

        $message = "A password reset link has been sent to your email!";
        $messageClass = "success";
    } else {
        $message = "Email not found in our system!";
        $messageClass = "error";
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
    <title>Forgot Password | E-Rikshaw</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #4cc9f0;
            --error-color: #f72585;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --white: #ffffff;
            --gray: #6c757d;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('lpu-main-gate.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 450px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            text-align: center;
            position: relative;
            z-index: 1;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            display: block;
            background-color: var(--primary-color);
            border-radius: 50%;
            padding: 15px;
            color: white;
            font-size: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h2 {
            color: var(--dark-color);
            margin-bottom: 20px;
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 3px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark-color);
            font-weight: 500;
        }

        .input-field {
            width: 100%;
            padding: 15px 20px 15px 45px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            transition: var(--transition);
            outline: none;
            background-color: var(--light-color);
        }

        .input-field:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 40px;
            color: var(--gray);
            font-size: 1.2rem;
        }

        .btn {
            width: 100%;
            padding: 15px;
            background: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn:active {
            transform: translateY(0);
        }

        .message {
            margin: 20px 0;
            padding: 15px;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .success {
            background-color: rgba(76, 201, 240, 0.2);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .error {
            background-color: rgba(247, 37, 133, 0.2);
            color: var(--error-color);
            border-left: 4px solid var(--error-color);
        }

        .back-to-login {
            margin-top: 20px;
            font-size: 0.9rem;
            color: var(--gray);
        }

        .back-to-login a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .back-to-login a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .animation-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 150px;
            z-index: 0;
        }

        .golf-cart {
            width: 100%;
            animation: drive 4s ease-in-out infinite;
        }

        @keyframes drive {
            0%, 100% {
                transform: translateX(0) rotate(0deg);
            }
            25% {
                transform: translateX(-10px) rotate(-2deg);
            }
            50% {
                transform: translateX(0) rotate(0deg);
            }
            75% {
                transform: translateX(10px) rotate(2deg);
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }
            
            .logo {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            .animation-container {
                width: 120px;
                bottom: 10px;
                right: 10px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 25px 20px;
                border-radius: 15px;
            }
            
            .logo {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
            }
            
            .input-field {
                padding: 12px 15px 12px 40px;
            }
            
            .input-icon {
                font-size: 1rem;
                top: 35px;
            }
            
            .animation-container {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <i class="fas fa-rickshaw"></i>
        </div>
        <h2>Forgot Password</h2>
        
        <?php if (!empty($message)): ?>
            <div class="message <?php echo $messageClass; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email Address</label>
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" class="input-field" placeholder="Enter your email address" required>
            </div>
            
            <button type="submit" class="btn">
                <i class="fas fa-paper-plane"></i> Send Reset Link
            </button>
        </form>
        
        <div class="back-to-login">
            Remember your password? <a href="login.php">Sign In</a>
        </div>
    </div>
    
    <div class="animation-container">
        <img src="g_cart-removebg-preview.png" class="golf-cart" alt="Golf Cart">
    </div>
</body>

</html>