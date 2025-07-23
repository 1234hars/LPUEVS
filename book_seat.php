<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'user') {
    header("Location: login.php");
    exit;
}

// Database connection
$conn = new mysqli("localhost", "root", "", "lpuevs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle booking form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trip_id = mysqli_real_escape_string($conn, $_POST['trip_id']);
    $passenger_name = mysqli_real_escape_string($conn, $_POST['passenger_name']);
    $seats = (int)$_POST['seats'];
    $username = $_SESSION['username'];

    // Insert booking into the database
    $sql = "INSERT INTO booking (trip_id, passenger_username, seats) VALUES ('$trip_id', '$username', '$seats')";
    
    if ($conn->query($sql) === TRUE) {
        // Update the available seats in trips table
        $conn->query("UPDATE trips SET available_seats = available_seats - $seats WHERE id = '$trip_id'");
        // Redirect to passenger dashboard after successful booking
        header("Location: passenger_dashboard.php");
        exit;
    } else {
        $error_message = "Error: " . $conn->error;
    }
}

// Fetch available trips along with vehicle numbers to display
$sql = "
    SELECT trips.id, trips.start_location, trips.destination, trips.date, trips.time, 
           trips.available_seats, trips.price_per_seat, users.vehicle_number 
    FROM trips 
    JOIN users ON trips.driver_username = users.username 
    WHERE trips.available_seats > 0
    ORDER BY trips.date, trips.time";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Seat - LPU EVS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --success-color: #4cc9f0;
            --danger-color: #f72585;
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
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background: var(--card-bg);
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
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

        h2 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
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

        select.form-control {
            padding: 0.8rem 1rem;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
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

        .btn {
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
            display: flex;
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

        .btn-danger {
            background: linear-gradient(135deg, var(--danger-color), #d90429);
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #d90429, var(--danger-color));
            box-shadow: 0 6px 20px rgba(247, 37, 133, 0.4);
        }

        .trip-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--primary-color);
            transition: var(--transition);
        }

        .trip-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .trip-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            align-items: center;
        }

        .trip-route {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        .trip-meta {
            display: flex;
            gap: 1rem;
            color: var(--light-text);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .trip-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .detail-icon {
            color: var(--accent-color);
        }

        .no-trips {
            text-align: center;
            padding: 2rem;
            color: var(--light-text);
        }

        .error-message {
            background-color: #fee;
            color: var(--danger-color);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--danger-color);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            .trip-details {
                grid-template-columns: 1fr;
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
            
            .trip-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
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
        <h2><i class="fas fa-ticket-alt"></i> Book Your Seat</h2>
        
        <?php if (isset($error_message)): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($result->num_rows > 0): ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="trip_id">Select Trip</label>
                    <select id="trip_id" name="trip_id" class="form-control" required>
                        <option value="">-- Choose a trip --</option>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <option value="<?= $row['id']; ?>">
                                <?= htmlspecialchars($row['start_location']) . " to " . htmlspecialchars($row['destination']) . 
                                   " (" . date('M j, Y', strtotime($row['date'])) . " at " . date('g:i A', strtotime($row['time'])) . ")" ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="passenger_name">Passenger Name</label>
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="passenger_name" name="passenger_name" class="form-control" 
                           placeholder="Your full name" value="<?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : '' ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="seats">Number of Seats</label>
                    <i class="fas fa-chair input-icon"></i>
                    <input type="number" id="seats" name="seats" class="form-control" 
                           placeholder="How many seats?" min="1" required>
                </div>
                
                <button type="submit" class="btn">
                    <i class="fas fa-check-circle"></i> Confirm Booking
                </button>
            </form>
            
            <div style="margin-top: 2rem;">
                <h3 style="font-size: 1.2rem; margin-bottom: 1rem; color: var(--primary-color);">
                    <i class="fas fa-route"></i> Available Trips
                </h3>
                
                <?php 
                // Reset pointer to show trips again
                $result->data_seek(0); 
                while ($row = $result->fetch_assoc()): 
                ?>
                    <div class="trip-card">
                        <div class="trip-header">
                            <div class="trip-route">
                                <?= htmlspecialchars($row['start_location']) ?> → <?= htmlspecialchars($row['destination']) ?>
                            </div>
                            <div style="color: var(--accent-color); font-weight: 500;">
                                ₹<?= number_format($row['price_per_seat'], 2) ?> per seat
                            </div>
                        </div>
                        
                        <div class="trip-meta">
                            <span><i class="far fa-calendar-alt"></i> <?= date('M j, Y', strtotime($row['date'])) ?></span>
                            <span><i class="far fa-clock"></i> <?= date('g:i A', strtotime($row['time'])) ?></span>
                        </div>
                        
                        <div class="trip-details">
                            <div class="detail-item">
                                <span class="detail-icon"><i class="fas fa-users"></i></span>
                                <span><?= $row['available_seats'] ?> seats available</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-icon"><i class="fas fa-car"></i></span>
                                <span>Vehicle: <?= htmlspecialchars($row['vehicle_number']) ?></span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="no-trips">
                <i class="fas fa-info-circle" style="font-size: 2rem; color: var(--light-text); margin-bottom: 1rem;"></i>
                <h3>No available trips at the moment</h3>
                <p>Please check back later or contact support</p>
            </div>
        <?php endif; ?>
        
        <a href="passenger_dashboard.php" class="btn" style="margin-top: 1.5rem; text-decoration: none;">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
        
        <a href="logout.php" class="btn btn-danger" style="margin-top: 1rem; text-decoration: none;">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

    <script>
        // Dynamic seat limit based on selected trip
        document.getElementById('trip_id').addEventListener('change', function() {
            const tripId = this.value;
            if (tripId) {
                // In a real app, you would fetch the available seats via AJAX
                // For this example, we'll just remove any previous max limit
                document.getElementById('seats').removeAttribute('max');
            }
        });
        
        // Add focus effects to form inputs
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                const icon = this.parentElement.querySelector('.input-icon');
                if (icon) {
                    icon.style.color = '#4361ee';
                }
            });
            
            input.addEventListener('blur', function() {
                const icon = this.parentElement.querySelector('.input-icon');
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