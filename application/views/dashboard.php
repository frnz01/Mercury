<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- Add these scripts in the <head> section of your HTML file -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <!-- Custom CSS -->
  <style>
    /* Add your custom styles here */
    body {
      background-color: #f8f9fa;
    }

    .sidebar {
      background-color: #222222;
      color: #ffffff;
      height: 100vh;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 80px;
      position: fixed;
    }

    .sidebar .nav-link {
      color: #ffffff;
      transition: background-color 0.3s ease;
    }

    .sidebar .nav-link i {
      margin-right: 10px;
    }

    .sidebar .nav-link:hover {
      background-color: #333333;
    }

    .sidebar .nav-link.active {
      background-color: #1e7e34;
      font-weight: bold;
    }

    .sidebar .nav-link.active::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 5px;
      background-color: #ffffff;
    }

    .sidebar .nav-item:hover .sub-nav {
      display: block;
    }

    .sidebar .sub-nav {
      display: none;
      list-style: none;
      padding-left: 20px;
      margin-top: 5px;
    }

    .sidebar .sub-nav li a {
      color: #ffffff;
      transition: background-color 0.3s ease;
    }

    .sidebar .sub-nav li a:hover {
      background-color: #333333;
    }

    .content {
      margin-left: 350px;
      padding: 20px;
      margin-top: 100px;
      background-color: #ffffff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      width: 70%;
    }

    .logout-button {
      position: absolute;
      top: 10px;
      right: 10px;
    }

    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 2;
      background-color: #ffffff;
      color: #000000;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      color: #000000;
      font-weight: bold;
      font-size: 1.5rem;
    }

    .navbar-brand img {
      height: 50px;
    }

    .username {
      color: #000000;
      font-weight: bold;
      margin-right: 10px;
    }

    .logout-container {
      display: flex;
      align-items: center;
    }

    .username {
      font-family: 'Courier New', Courier, monospace;
      margin-right: 100px;
    }

    .welcome-message {
      margin-top: 20px;
      font-size: 1.5rem;
    }

    .sub-nav {
      display: none;
      padding-left: 20px;
    }

    .nav-item:hover .sub-nav {
      display: block;
    }

    .sub-nav li a {
      display: flex;
      align-items: center;
      color: #ffffff;
      transition: background-color 0.3s ease;
      padding: 5px;
      font-size: 14px;
      text-decoration: none;
    }

    .sub-nav li a:hover {
      background-color: #333333;
    }

    .sub-nav li a i {
      margin-right: 10px;
    }

    .filter-controls input[type="date"] {
      /* Add your preferred styling for the date picker here */
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
  </style>
  <script>
    window.onload = function() {
      var salesData = <?php echo json_encode($sales, JSON_NUMERIC_CHECK); ?>;
      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        //theme: "light2",
        title: {
          text: "Sales Report - July 2023"
        },
        axisX: {
          title: "Date",
          valueFormatString: "YYYY-MM-DD",
          crosshair: {
            enabled: true,
            snapToDataPoint: true
          }
        },
        axisY: {
          title: "Total Amount",
          includeZero: true,
          crosshair: {
            enabled: true,
            snapToDataPoint: true
          }
        },
        toolTip: {
          content: "Date: {x} <br/> Total Amount: {y}"
        },
        data: [{
          type: "area",
          xValueType: "dateTime",
          dataPoints: salesData
        }]
      });
      chart.render();
    }
  </script>

</head>

<body>

  <?php
  // Retrieve the username and user role from the session
  $userData = $this->session->userdata('user');
  $username = isset($userData['username']) ? $userData['username'] : '';
  $userRole = isset($userData['user_role']) ? $userData['user_role'] : '';

  // Function to check if a navigation item should be displayed based on user role
  function showNavItem($requiredRole, $userRole)
  {
    return $requiredRole === 'Administrator' || $requiredRole === $userRole;
  }
  ?>

  <nav class="navbar">
    <a href="#" class="navbar-brand">
      <img src="https://www.mercurydrug.com/public/images/md-main-logo.png" alt="Mercury Drug Store Logo">
    </a>
    <div class="logout-container">
      <p class="username"><i class="fas fa-user"></i>-<?php echo $username; ?>-</p>
      <a href="login" class="btn btn-dark logout-button"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  </nav>

  <div class="d-flex">
    <nav class="sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <?php if ($userRole === 'Administrator') : ?>
            <li class="nav-item">
              <a class="nav-link active" href="dashboard"><i class="fas fa-user"></i> Dashboard</a>
            </li>
          <?php endif; ?>

          <?php if ($userRole === 'Administrator') : ?>
            <li class="nav-item">
              <a class="nav-link" href="user"><i class="fas fa-users"></i> Manage Users</a>
            </li>
          <?php endif; ?>

          <?php if ($userRole === 'Administrator' || $userRole === 'Accountant') : ?>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-calculator"></i> Accounting</a>
              <ul class="sub-nav">
                <li><a href="payment"><i class="fas fa-credit-card"></i> Payment</a></li>
                <li><a href="f_record"><i class="fas fa-file-alt"></i> Financial Records</a></li>
              </ul>
            </li>
          <?php endif; ?>

          <?php if ($userRole === 'Administrator' || $userRole === 'Cashier') : ?>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Sales Management</a>
              <ul class="sub-nav">
                <li><a href="poSale"><i class="fas fa-cash-register"></i> Point of Sale</a></li>
                <li><a href="sales_rep"><i class="fas fa-file-invoice"></i> Sales Record</a></li>
              </ul>
            </li>
          <?php endif; ?>

          <?php if ($userRole === 'Administrator' || $userRole === 'Pharmacist') : ?>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-shopping-basket"></i> Purchase Management</a>
              <ul class="sub-nav">
                <li><a href="purchase"><i class="fas fa-tasks"></i> Manage Purchase</a></li>

                <li><a href="p_record"><i class="fas fa-file-invoice"></i> Purchase Record</a></li>

              </ul>
            </li>
          <?php endif; ?>

          <?php if ($userRole === 'Administrator' || $userRole === 'Pharmacist') : ?>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-boxes"></i> Inventory Management</a>
              <ul class="sub-nav">
                <li><a href="n_arrival"><i class="fas fa-box"></i> New Arrivals</a></li>
                <li><a href="product"><i class="fas fa-cogs"></i>All Products</a></li>
              </ul>
            </li>
          <?php endif; ?>
        </ul>
      </div>



    </nav>


    <div class="content">
      <!-- <div class="filter-controls">
        <label for="selectedView">Select View:</label>
        <select id="selectedView">
          <option value="day" selected>Day</option>
          <option value="week">Week</option>
          <option value="month">Month</option>
          <option value="year">Year</option>
        </select>
      </div> -->

      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>