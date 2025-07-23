<?php
// Start session
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "lpuevs");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error variable
$error = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);
    $userType = $conn->real_escape_string($_POST['userType']);
    $vehicleNumber = isset($_POST['vehicle_number']) ? $conn->real_escape_string($_POST['vehicle_number']) : null;

    // Validate passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Check if user exists
        $checkUser = $conn->query("SELECT * FROM users WHERE username='$username' OR email='$email'");
        
        if ($checkUser->num_rows > 0) {
            $error = "User already exists! Please choose different credentials.";
        } else {
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare SQL based on user type
            if ($userType == 'driver') {
                $sql = "INSERT INTO users (username, email, password, usertype, vehicle_number) 
                        VALUES ('$username', '$email', '$hashedPassword', '$userType', '$vehicleNumber')";
            } else {
                $sql = "INSERT INTO users (username, email, password, usertype) 
                        VALUES ('$username', '$email', '$hashedPassword', '$userType')";
            }

            // Execute query
            if ($conn->query($sql)) {
                header("Location: log.php");
                exit();
            } else {
                $error = "Registration failed: " . $conn->error;
            }
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | LPU EVS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --danger: #f72585;
            --border-radius: 10px;
            --shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background: rgba(255,255,255,0.95);
            width: 100%;
            max-width: 450px;
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.3);
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo i {
            background: var(--primary);
            color: white;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 5px 15px rgba(67,97,238,0.3);
        }
        
        h2 {
            text-align: center;
            color: var(--dark);
            margin-bottom: 25px;
            font-weight: 600;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-group i {
            position: absolute;
            left: 15px;
            top: 15px;
            color: #777;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 15px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67,97,238,0.2);
            outline: none;
        }
        
        .user-type {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin: 25px 0;
        }
        
        .user-type label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }
        
        .radio-btn {
            width: 18px;
            height: 18px;
            border: 2px solid #ddd;
            border-radius: 50%;
            position: relative;
        }
        
        .radio-btn::after {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            background: var(--primary);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
        }
        
        input[type="radio"] {
            display: none;
        }
        
        input[type="radio"]:checked + .radio-btn {
            border-color: var(--primary);
        }
        
        input[type="radio"]:checked + .radio-btn::after {
            opacity: 1;
        }
        
        .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67,97,238,0.3);
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
        
        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }
        
        .error {
            color: var(--danger);
            background: rgba(247,37,133,0.1);
            padding: 12px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
        }
        
        #vehicleField {
            display: none;
            animation: fadeIn 0.3s ease;
        }
        
        @media (max-width: 576px) {
            .container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <i class="fas fa-car"></i>
        </div>
        
        <h2>Create Your Account</h2>
        
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
            </div>
            
            <div class="user-type">
                <label>
                    <input type="radio" name="userType" value="user" checked onchange="toggleVehicleField(false)">
                    <span class="radio-btn"></span>
                    Passenger
                </label>
                <label>
                    <input type="radio" name="userType" value="driver" onchange="toggleVehicleField(true)">
                    <span class="radio-btn"></span>
                    Driver
                </label>
            </div>
            
            <div class="form-group" id="vehicleField">
                <i class="fas fa-car-alt"></i>
                <input type="text" name="vehicle_number" class="form-control" placeholder="Vehicle Number">
            </div>
            
            <button type="submit" class="btn">Register Now</button>
            
            <div class="login-link">
                Already have an account? <a href="log.php">Login here</a>
            </div>
        </form>
    </div>

    <script>
        function toggleVehicleField(show) {
            const field = document.getElementById('vehicleField');
            const input = field.querySelector('input');
            
            if (show) {
                field.style.display = 'block';
                input.required = true;
            } else {
                field.style.display = 'none';
                input.required = false;
            }
        }
        
        // Add focus effects
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.previousElementSibling.style.color = 'var(--primary)';
            });
            
            input.addEventListener('blur', function() {
                this.previousElementSibling.style.color = '#777';
            });
        });
    </script>
</body>
</html>