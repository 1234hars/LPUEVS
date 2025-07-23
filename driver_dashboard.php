<?php
session_start();
// Check if the user is logged in and is a driver
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'driver') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard | E-Rikshaw</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #4cc9f0;
            --green-gradient: linear-gradient(135deg, #4CAF50, #2E7D32);
            --green-hover: linear-gradient(135deg, #66BB6A, #388E3C);
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('main-qimg-fe3b6c0b28474c5e471f76e3eaf569bd-lq.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            color: var(--dark-color);
            min-height: 100vh;
            line-height: 1.6;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: 20px;
        }

        .dashboard {
            width: 100%;
            max-width: 1000px;
            margin: auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 30px;
            box-shadow: var(--shadow);
            border-radius: 15px;
            text-align: center;
            transition: var(--transition);
        }

        .dashboard-header {
            margin-bottom: 30px;
            position: relative;
        }

        .dashboard-header h2 {
            color: var(--dark-color);
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .dashboard-header p {
            color: var(--gray);
            font-size: 1rem;
        }

        .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--green-gradient);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            font-weight: bold;
            box-shadow: var(--shadow);
        }

        .navbar {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 40px;
            padding: 10px;
            background: var(--green-gradient);
            border-radius: 10px;
            gap: 10px;
        }

        .navbar a {
            text-decoration: none;
            color: var(--white);
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 8px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .navbar a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .dashboard-card {
            background: var(--white);
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--dark-color);
            font-weight: 600;
        }

        .card-desc {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background: var(--green-gradient);
            color: var(--white);
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            background: var(--green-hover);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin: 30px 0;
        }

        .stat-card {
            background: var(--white);
            padding: 15px;
            border-radius: 10px;
            box-shadow: var(--shadow);
            text-align: center;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--gray);
        }

        @media (max-width: 768px) {
            .dashboard {
                padding: 20px;
            }
            
            .dashboard-header h2 {
                font-size: 1.5rem;
            }
            
            .navbar {
                flex-direction: column;
                gap: 5px;
            }
            
            .navbar a {
                justify-content: center;
                padding: 10px;
            }
            
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .wrapper {
                padding: 10px;
            }
            
            .dashboard {
                border-radius: 10px;
                padding: 15px;
            }
            
            .user-avatar {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }
            
            .card-icon {
                font-size: 2rem;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .dashboard-card {
            animation: fadeIn 0.5s ease forwards;
        }

        .dashboard-card:nth-child(1) { animation-delay: 0.1s; }
        .dashboard-card:nth-child(2) { animation-delay: 0.2s; }
        .dashboard-card:nth-child(3) { animation-delay: 0.3s; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="dashboard">
            <div class="dashboard-header">
                <div class="user-avatar">
                    <?= strtoupper(substr(htmlspecialchars($_SESSION['username']), 0, 1)) ?>
                </div>
                <h2>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</h2>
                <p>Manage your trips and bookings efficiently</p>
            </div>

            <div class="navbar">
                <a href="add_trip.php"><i class="fas fa-plus-circle"></i> Add Trip</a>
                <a href="delete_trip.php"><i class="fas fa-trash-alt"></i> Delete Trip</a>
                <a href="view_bookings.php"><i class="fas fa-calendar-check"></i> View Bookings</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>

            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-value">24</div>
                    <div class="stat-label">Total Trips</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">18</div>
                    <div class="stat-label">Completed</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">4.8</div>
                    <div class="stat-label">Rating</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">3</div>
                    <div class="stat-label">Pending</div>
                </div>
            </div>

            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-road"></i>
                    </div>
                    <h3 class="card-title">Add New Trip</h3>
                    <p class="card-desc">Create a new trip for passengers to book</p>
                    <a href="add_trip.php" class="btn">Add Trip</a>
                </div>
                
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-list-alt"></i>
                    </div>
                    <h3 class="card-title">View Bookings</h3>
                    <p class="card-desc">See all your upcoming and past bookings</p>
                    <a href="view_bookings.php" class="btn">View Bookings</a>
                </div>
                
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="card-title">Earnings</h3>
                    <p class="card-desc">Track your weekly and monthly earnings</p>
                    <a href="#" class="btn">View Earnings</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>