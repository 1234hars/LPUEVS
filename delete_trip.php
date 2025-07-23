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

// Handle trip deletion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trip_id = mysqli_real_escape_string($conn, $_POST['trip_id']);
    $sql = "DELETE FROM trips WHERE id = '$trip_id' AND driver_username = '" . $_SESSION['username'] . "'";
    
    if ($conn->query($sql) === TRUE) {
        $message = "<div class='message success'>Trip deleted successfully.</div>";
    } else {
        $message = "<div class='message error'>Error: " . $conn->error . "</div>";
    }
}

// Retrieve trips assigned to this driver
$username = $_SESSION['username'];
$sql = "SELECT * FROM trips WHERE driver_username = '$username' ORDER BY date DESC, time DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Trip | LPU EVS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --danger-color: #ef233c;
            --success-color: #2b9348;
            --warning-color: #f77f00;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --gray-color: #6c757d;
            --white-color: #ffffff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --border-radius: 8px;
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
            color: var(--dark-color);
            line-height: 1.6;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: var(--white-color);
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, 0.9);
        }

        h2 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 25px;
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
            width: 80px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 3px;
        }

        .message {
            margin: 15px 0;
            padding: 12px;
            border-radius: var(--border-radius);
            text-align: center;
            font-weight: 500;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .success {
            background-color: rgba(43, 147, 72, 0.2);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .error {
            background-color: rgba(239, 35, 60, 0.2);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        .table-container {
            overflow-x: auto;
            margin: 25px 0;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: var(--primary-color);
            color: var(--white-color);
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: rgba(67, 97, 238, 0.05);
        }

        tr:hover {
            background-color: rgba(67, 97, 238, 0.1);
            transform: scale(1.01);
            transition: var(--transition);
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: var(--border-radius);
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: var(--white-color);
        }

        .btn-danger:hover {
            background-color: #d90429;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(239, 35, 60, 0.3);
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white-color);
            text-decoration: none;
            padding: 10px 20px;
            margin-top: 20px;
            display: inline-block;
            width: auto;
        }

        .btn-primary:hover {
            background-color: #3a56e8;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
        }

        .no-trips {
            text-align: center;
            padding: 30px;
            color: var(--gray-color);
            font-style: italic;
        }

        .icon {
            margin-right: 8px;
        }

        .action-cell {
            white-space: nowrap;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            th, td {
                padding: 12px 8px;
                font-size: 0.9rem;
            }
            
            .btn {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
            
            .btn-primary {
                padding: 8px 15px;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 10px;
            }
            
            .container {
                padding: 15px;
            }
            
            h2 {
                font-size: 1.3rem;
                margin-bottom: 15px;
            }
            
            th, td {
                padding: 10px 5px;
                font-size: 0.8rem;
            }
            
            .btn {
                padding: 5px 8px;
                font-size: 0.75rem;
            }
            
            .icon {
                margin-right: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-trash-alt icon"></i>Delete Trip</h2>
        
        <?php if (isset($message)) echo $message; ?>
        
        <div class="table-container">
            <form method="POST" action="">
                <table>
                    <thead>
                        <tr>
                            <th>Trip ID</th>
                            <th>Start Location</th>
                            <th>Destination</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= htmlspecialchars($row['start_location']); ?></td>
                                    <td><?= htmlspecialchars($row['destination']); ?></td>
                                    <td><?= date('M j, Y', strtotime($row['date'])); ?></td>
                                    <td><?= date('h:i A', strtotime($row['time'])); ?></td>
                                    <td class="action-cell">
                                        <button type="submit" name="trip_id" value="<?= $row['id']; ?>" class="btn btn-danger">
                                            <i class="fas fa-trash-alt icon"></i>Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="no-trips">No trips assigned to you.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </form>
        </div>
        
        <a href="driver_dashboard.php" class="btn btn-primary">
            <i class="fas fa-arrow-left icon"></i>Back to Dashboard
        </a>
    </div>

    <script>
        // Add confirmation dialog for delete action
        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to delete this trip?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>