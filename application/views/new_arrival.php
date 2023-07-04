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

  <!-- Custom CSS -->
  <style>
    /* Add your custom styles here */
    body {
      background-color: #f8f9fa;
    }

    .sidebar {
      background-color: #fff;
      color: #000;
      height: 100vh;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar .nav-link {
      color: #000;
      transition: background-color 0.3s ease;
    }

    .sidebar .nav-link i {
      margin-right: 10px;
    }

    .sidebar .nav-link:hover {
      background-color: #EBEBEB;
    }

    .sidebar .nav-link.active {
      background-color: #B8B8B8;
      font-weight: bold;
    }

    .sidebar .nav-link.active::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 5px;
      background-color: #000;
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
      color: #000;
      transition: background-color 0.3s ease;
    }

    .sidebar .sub-nav li a:hover {
      background-color: #EBEBEB;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
    }

    .logout-button {
      position: absolute;
      top: 10px;
      right: 10px;
    }

    .navbar {
      background-color: #fff;
      color: #000;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      color: #000;
      font-weight: bold;
      font-size: 1.5rem;
    }

    .navbar-brand img {
      height: 50px;
    }

    .username {
      color: #000;
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

    /* Sub-nav styling */
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
    color: #000;
    transition: background-color 0.3s ease;
    padding: 5px;
    font-size: 14px;
    text-decoration: none; 
  }

  .sub-nav li a:hover {
    background-color: #EBEBEB;
  }

  .sub-nav li a i {
    margin-right: 10px;
  }
  </style>


</head>

<body>

<?php
// Retrieve the username and user role from the session
$userData = $this->session->userdata('user');
$username = isset($userData['username']) ? $userData['username'] : '';
$userRole = isset($userData['user_role']) ? $userData['user_role'] : '';

// Function to check if a navigation item should be displayed based on user role
function showNavItem($requiredRole, $userRole) {
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
        <li class="nav-item">
          <a class="nav-link active" href="dashboard"><i class="fas fa-user"></i> Dashboard</a>
        </li>

        <?php if ($userRole === 'Administrator') : ?>
          <li class="nav-item">
            <a class="nav-link" href="user"><i class="fas fa-users"></i> Manage Users</a>
          </li>
        <?php endif; ?>

        <?php if ($userRole === 'Administrator' || $userRole === 'Employee') : ?>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-chart-bar"></i> Data Analytics</a>
            <ul class="sub-nav">
              
                <li><a href="#"><i class="fas fa-file-invoice-dollar"></i> Accounting Record</a></li>
             
              <li><a href="#"><i class="fas fa-chart-line"></i> Sales Record</a></li>
             
                <li><a href="#"><i class="fas fa-file-invoice"></i> Purchase Record</a></li>
            
              
                <li><a href="#"><i class="fas fa-box-open"></i> Inventory Record</a></li>
             
            </ul>
          </li>
        <?php endif; ?>

        <?php if ($userRole === 'Administrator' || $userRole === 'Accountant') : ?>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-calculator"></i> Accounting</a>
            <ul class="sub-nav">
              <li><a href="#"><i class="fas fa-credit-card"></i> Payment</a></li>
              <li><a href="#"><i class="fas fa-file-alt"></i> Financial Records</a></li>
            </ul>
          </li>
        <?php endif; ?>

        <?php if ($userRole === 'Administrator' || $userRole === 'Cashier') : ?>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Sales Management</a>
            <ul class="sub-nav">
              <li><a href="#"><i class="fas fa-cash-register"></i> Point of Sale</a></li>
              <li><a href="#"><i class="fas fa-file-invoice"></i> Sales Record</a></li>
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
    <h1 class="welcome-message">New Arrivals</h1>
      <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">+ Add New Purchase</button> -->
      <table class="table table-bordered table-striped">
  <thead class="thead-dark">
    <tr>
      <th>Product ID</th>
      <th>Product Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Supplier</th>
      <th>Date Purchased</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $prod): ?>
      <tr>
        <td><?php echo $prod->p_id; ?></td>
        <td><?php echo $prod->p_name; ?></td>
        <td><?php echo $prod->p_price; ?></td>
        <td><?php echo $prod->quantity; ?></td>
        <td><?php echo $prod->supplier; ?></td>
        <td><?php echo $prod->date_purchase; ?></td>
        <td>
        <form action="<?php echo site_url('purchase/update'); ?>" method="post">
            <input type="hidden" name="p_id" value="<?php echo $prod->p_id; ?>">
            <button class="btn btn-primary btn-sm purchase-button" type="submit">Confirm</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>
