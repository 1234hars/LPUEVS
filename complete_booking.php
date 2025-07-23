<?php
session_start();

// Check if the user is logged in and is a driver
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'driver') {
    header("Location: login.php");
    exit;
}

// Database connection
$conn = new mysqli("localhost", "root", "", "lpuevs");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$success_message = '';
$error_message = '';

// Check if booking_id is provided
if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Query to delete the booking
    $sql = "DELETE FROM booking WHERE id = '$booking_id'";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Booking completed successfully!";
    } else {
        $error_message = "Error completing booking: " . $conn->error;
    }
} else {
    $error_message = "No booking ID provided!";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Booking | LPU EVS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #4cc9f0;
            --danger-color: #f72585;
            --warning-color: #f8961e;
            --text-color: #2b2d42;
            --light-text: #8d99ae;
            --background-color: #f8f9fa;
            --card-bg: #ffffff;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 600px;
            background: var(--card-bg);
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, var(--primary-color), var(--success-color));
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-weight: 600;
            position: relative;
            padding-bottom: 0.5rem;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--success-color);
            border-radius: 3px;
        }

        .status-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            animation: bounce 1s infinite alternate;
        }

        .success-icon {
            color: var(--success-color);
        }

        .error-icon {
            color: var(--danger-color);
        }

        .message {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            padding: 1rem;
            border-radius: var(--border-radius);
        }

        .success-message {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .error-message {
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            margin: 0.5rem;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            box-shadow: none;
        }

        .btn-outline:hover {
            background: rgba(67, 97, 238, 0.1);
        }

        /* Animations */
        @keyframes bounce {
            from { transform: translateY(0); }
            to { transform: translateY(-10px); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .container {
            animation: fadeIn 0.6s ease-out forwards;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 2rem 1.5rem;
            }
            
            h1 {
                font-size: 1.5rem;
            }
            
            .status-icon {
                font-size: 4rem;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            
            .container {
                padding: 1.5rem 1rem;
            }
            
            .btn {
                width: 100%;
                margin: 0.5rem 0;
            }
            
            .btn-group {
                display: flex;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($success_message): ?>
            <div class="status-icon success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1>Booking Completed</h1>
            <div class="message success-message">
                <i class="fas fa-check"></i> <?php echo $success_message; ?>
            </div>
        <?php elseif ($error_message): ?>
            <div class="status-icon error-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <h1>Error Occurred</h1>
            <div class="message error-message">
                <i class="fas fa-exclamation-triangle"></i> <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        
        <div class="btn-group">
            <a href="view_bookings.php" class="btn">
                <i class="fas fa-arrow-left"></i> Back to Bookings
            </a>
            <a href="driver_dashboard.php" class="btn btn-outline">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </div>
    </div>

    <script>
        // Add animation to buttons on hover
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>