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
      <h1 class="welcome-message">Manage Purchase</h1>
      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">+ Add New Purchase</button>
      <h1 class="welcome-message">Low Stock Product</h1>
      <table class="table table-bordered table-striped">
  <thead class="thead-dark">
    <tr>
      <th>Product ID</th>
      <th>Product Name</th>
      <!-- <th>Price</th> -->
      <th>Stock</th>
      <!-- <th>Date Received</th> -->
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $prod): ?>
      <tr>
        <td><?php echo $prod->p_id; ?></td>
        <td><?php echo $prod->p_name; ?></td>
        <!-- <td><?php echo $prod->price; ?></td> -->
        <td><?php echo $prod->stock; ?></td>
        <!-- <td><?php echo $prod->date_recieved; ?></td> -->
        <td>
        <button class="btn btn-primary btn-sm purchase-button" data-toggle="modal" data-target="#purchaseModal" data-p_id="<?php echo $prod->p_id; ?>" data-p_name="<?php echo $prod->p_name; ?>" data-price="<?php echo $prod->price; ?>" >Purchase</button>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
    <!-- Add User Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add New Purchase</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('purchase/add'); ?>" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required readonly>
          </div>
          <div class="form-group">
            <label for="p_id">Product ID</label>
            <input type="text" class="form-control" id="p_id" name="p_id" required>
          </div>
          <div class="form-group">
            <label for="p_name">Product Name</label>
            <input type="text" class="form-control" id="p_name" name="p_name" required>
          </div>
          <div class="form-group">
            <label for="p_price">Price</label>
            <input type="number" class="form-control" id="p_price" name="p_price" required>
          </div>
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
          </div>
          <div class="form-group">
            <label for="supplier">Supplier</label>
            <select class="form-control" id="supplier" name="supplier" required>
              <option value="">Select Supplier</option>
              <option value="ABC Corporation">ABC Corporation</option>
              <option value="XYZ Corporation">XYZ Corporation</option>
            </select>
          </div>
          <div class="form-group">
            <label for="date_purchase">Purchase Date</label>
            <input type="text" class="form-control" id="date_purchase" name="date_purchase" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
          </div>
          <div class="form-group">
            <label for="total">Total</label>
            <input type="text" class="form-control" id="total" name="total" required readonly>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="purchase">Purchase</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="purchaseModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="purchaseModalLabel">Add New Purchase</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('purchase/add'); ?>" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required readonly>
          </div>
          <div class="form-group">
            <label for="p_id">Product ID</label>
            <input type="text" class="form-control" id="p_id" name="p_id" required readonly>
          </div>
          <div class="form-group">
            <label for="p_name">Product Name</label>
            <input type="text" class="form-control" id="p_name" name="p_name" required readonly>
          </div>
          <div class="form-group">
            <label for="p_price">Price</label>
            <input type="number" class="form-control" id="p_price" name="p_price" required readonly>
          </div>
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
          </div>
          <div class="form-group">
            <label for="supplier">Supplier</label>
            <select class="form-control" id="supplier" name="supplier" required>
              <option value="">Select Supplier</option>
              <option value="DOH">DOH</option>
              <option value="Medicine.INC">Medicine.INC</option>
              <option value="Drug Syndicate">Drug Syndicate</option>
              <option value="Alcohol Corporation">Alcohol Corporation</option>
              <option value="Drug Store">Drug Store</option>
            </select>
          </div>
          <div class="form-group">
            <label for="date_purchase">Purchase Date</label>
            <input type="text" class="form-control" id="date_purchase" name="date_purchase" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
          </div>
          <div class="form-group">
            <label for="total">Total</label>
            <input type="text" class="form-control" id="total" name="total" required readonly>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="purchase">Purchase</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


  </div>

   <!-- Modal Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
  function calculateTotal() {
    var quantity = parseInt(document.getElementById('quantity').value);
    var price = parseFloat(document.getElementById('p_price').value);
    var total = quantity * price;
    document.getElementById('total').value = total.toFixed(2);
  }

  document.getElementById('quantity').addEventListener('input', calculateTotal);
  document.getElementById('p_price').addEventListener('input', calculateTotal);
</script>

<script>
  <?php if ($this->session->flashdata('purchase_success')): ?>
    alert('Purchase successfully');
  <?php endif; ?>
</script>

<script>
  $(document).ready(function() {
    $('.purchase-button').click(function() {
      var button = $(this);
      var p_id = button.data('p_id');
      var p_name = button.data('p_name');
      var price = button.data('price') + 8;

      console.log(p_id);
      console.log(p_name);
      console.log(price);

      $('#purchaseModal #p_id').val(p_id);
      $('#purchaseModal #p_name').val(p_name);
      $('#purchaseModal #p_price').val(price);

      // Calculate total based on quantity and price
      $('#purchaseModal #quantity').change(function() {
        var quantity = parseInt($(this).val());
        var total = quantity * price;
        $('#purchaseModal #total').val(total);
      });

      $('#purchaseModal').modal('show'); // Show the modal
    });
  });
</script>



</body>


</html>
