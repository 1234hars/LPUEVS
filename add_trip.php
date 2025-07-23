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
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_location = mysqli_real_escape_string($conn, $_POST['start_location']);
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $seats = intval($_POST['seats']);
    $price = floatval($_POST['price']);
    $driver_username = $_SESSION['username'];
    // Insert the trip into the database
    $sql = "INSERT INTO trips (start_location, destination, date, time, available_seats, price_per_seat, driver_username)
            VALUES ('$start_location', '$destination', '$date', '$time', '$seats', '$price', '$driver_username')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Trip added successfully!'); window.location.href='driver_dashboard.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trip | LPU EVS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --success-color: #4cc9f0;
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
            max-width: 500px;
            background: var(--card-bg);
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            transition: var(--transition);
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

        h2 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 2rem;
            font-weight: 600;
            font-size: 1.8rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--accent-color);
            border-radius: 3px;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-color);
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem 0.8rem 2.5rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: var(--transition);
            background-color: #f9f9f9;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
            background-color: #fff;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 2.5rem;
            color: var(--light-text);
            font-size: 1rem;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 0.5rem;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: var(--light-text);
            font-size: 0.9rem;
            text-decoration: none;
            transition: var(--transition);
        }

        .back-link:hover {
            color: var(--primary-color);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 2rem 1.5rem;
            }
            
            h2 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            
            .container {
                padding: 1.5rem 1rem;
                border-radius: 10px;
            }
            
            .form-control {
                padding: 0.7rem 1rem 0.7rem 2.2rem;
            }
            
            .input-icon {
                font-size: 0.9rem;
                top: 2.3rem;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .container {
            animation: fadeIn 0.6s ease-out forwards;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Trip</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="start_location">Start Location</label>
                <i class="fas fa-map-marker-alt input-icon"></i>
                <input type="text" id="start_location" name="start_location" class="form-control" placeholder="Enter start location" required>
            </div>
            
            <div class="form-group">
                <label for="destination">Destination</label>
                <i class="fas fa-flag-checkered input-icon"></i>
                <input type="text" id="destination" name="destination" class="form-control" placeholder="Enter destination" required>
            </div>
            
            <div class="form-group">
                <label for="date">Date</label>
                <i class="far fa-calendar-alt input-icon"></i>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="time">Time</label>
                <i class="far fa-clock input-icon"></i>
                <input type="time" id="time" name="time" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="seats">Available Seats</label>
                <i class="fas fa-users input-icon"></i>
                <input type="number" id="seats" name="seats" class="form-control" placeholder="Number of seats" min="1" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price per Seat (₹)</label>
                <i class="fas fa-rupee-sign input-icon"></i>
                <input type="number" id="price" name="price" class="form-control" placeholder="Price per seat" step="0.01" min="0" required>
            </div>
            
            <button type="submit" class="submit-btn">
                <i class="fas fa-plus-circle"></i> Add Trip
            </button>
            
            <a href="driver_dashboard.php" class="back-link">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </form>
    </div>

    <script>
        // Set minimum date to today
        document.getElementById('date').min = new Date().toISOString().split("T")[0];
        
        // Add focus effects programmatically
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                const icon = this.previousElementSibling;
                if (icon) {
                    icon.style.color = '#4361ee';
                }
            });
            
            input.addEventListener('blur', function() {
                const icon = this.previousElementSibling;
                if (icon) {
                    icon.style.color = '#8d99ae';
                }
            });
        });
    </script>
</body>
</html>
<?php
$conn->close();
?>