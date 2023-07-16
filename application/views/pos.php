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
  margin-left: 280px;
  margin-right: 50px;
  padding: 20px;
  margin-top: 100px;
  background-color: #ffffff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  width: 100%;
}

.product-container {
  width: 100%;
}

.search-form {
  margin-bottom: 20px;
}
#search-input {
    border-radius: 5px;
}

.input-group {
  position: relative;
}

.form-control {
  border-radius: 0;
  border-right: none;
}

.input-group-append .btn {
  border-radius: 0;
}

.table-container {
  height: 500px; /* Set the desired height for the table container */
  overflow-y: auto; /* Enable vertical scrolling */
}

.order-list {
  background-color: #f8f9fa;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  width: 700px;
}

.order-list h1 {
  font-size: 1.2rem;
  margin-bottom: 10px;
}

.form-control {
  border-radius: 0;
  margin-bottom: 10px;
}

.orders {
  height: 400px;
  overflow-y: auto;
  padding: 10px;
  border-radius: 10px;
  box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
}

.list-footer {
  margin-top: 10px;
  text-align: center;
}

.list-footer button {
  width: 100%;
  border-radius: 5px;
}

#product-table {
  width: 100%; /* Adjust the width of the product table */
}

.receipt-table {
  width: 100%;
}

.receipt-footer {
  display: flex;
  justify-content: space-between;
  margin-top: 10px;
  font-weight: bold;
}

.total-label {
  font-size: 1.2rem;
}

.total-value {
  font-size: 1.2rem;
  color: #007bff;
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
  <h1 class="welcome-message">Point of Sale</h1>
  <div class="row">
    <div class="col-md-8 product-container">
      <form class="search-form" action="">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search Product" id="search-input">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit"> <i class="fas fa-search"></i></button>
          </div>
          <div class="input-group-append">
            <button class="btn btn-secondary" type="button" id="reset-button"><i class="fas fa-sync-alt"></i></button>
          </div>
        </div>
      </form>
      <div class="table-container">
        <table class="table table-bordered table-striped" id="product-table">
          <thead class="thead-dark">
            <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $prod): ?>
              <tr>
                <td><?php echo $prod->p_id; ?></td>
                <td><?php echo $prod->p_name; ?></td>
                <td><?php echo $prod->price; ?></td>
                <td>
                  <button class="btn btn-primary btn-sm add-button" data-product-id="<?php echo $prod->p_id; ?>" data-product-name="<?php echo $prod->p_name; ?>" data-product-price="<?php echo $prod->price; ?>">Add</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <div id="not-found-message" style="display: none;">Not Found</div>
      </div>
    </div>
    <div class="col-md-4 order-list">
        <form id="order-form" action="<?php echo site_url('poSale/cash_payment'); ?>" method="post">
          <input type="text" class="form-control" placeholder="Customer Name" name="customer_name" required>
          <input type="hidden" class="form-control" placeholder="Username" name="username" value="<?php echo $username; ?>" readonly>
          <h1>Orders List</h1>
          <div class="orders">
            <table class="table table-bordered table-striped receipt-table">
              <thead class="thead-dark">
                <tr>
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="orders-table-body">
                <!-- Orders content goes here -->
              </tbody>
            </table>
          </div>
          <div class="receipt-footer">
            <div class="total-label">Total:</div>
            <div class="total-value" id="total-value">0.00</div><br /><br />
          </div>
          <input type="number" class="form-control" placeholder="Amount" name="amount" required>
          <input type="number" class="form-control" placeholder="Change" name="change" readonly>
          <div class="list-footer">
            <button class="btn btn-primary" type="submit">Pay</button><br/><br />
            <button class="btn btn-primary" type="submit">Card</button>
          </div>
        </form>
    </div>
  </div>
</div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Search -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
  $(document).ready(function() {
    var originalTable = $('#product-table tbody').html(); // Store the original table HTML

    // Handle search form submission
    $('.search-form').submit(function(event) {
      event.preventDefault(); // Prevent default form submission
      var searchValue = $('#search-input').val().toLowerCase(); // Get search value
      filterTable(searchValue); // Filter table based on search value
    });

    // Handle reset button click
    $('#reset-button').click(function() {
      $('#search-input').val(''); // Clear search input
      $('#product-table tbody').html(originalTable); // Reset table to original content
      $('#not-found-message').hide(); // Hide "Not Found" message
    });

    // Filter table based on search value
    function filterTable(searchValue) {
      $('#product-table tbody tr').each(function() {
        var productId = $(this).find('td:eq(0)').text().toLowerCase();
        var productName = $(this).find('td:eq(1)').text().toLowerCase();
        if (productId.includes(searchValue) || productName.includes(searchValue)) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });

      // Show "Not Found" message if no matching rows
      var visibleRows = $('#product-table tbody tr:visible');
      if (visibleRows.length === 0) {
        $('#not-found-message').show();
      } else {
        $('#not-found-message').hide();
      }
    }
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
  var originalTable = $('#product-table tbody').html(); // Store the original table HTML
  var orders = []; // Array to store the orders

  // Handle add button click
  $('.add-button').click(function() {
    var productId = $(this).data('product-id');
    var productName = $(this).data('product-name');
    var productPrice = $(this).data('product-price');
    var quantity = 1;
    var totalPrice = productPrice * quantity;
    var order = {
      productId: productId,
      productName: productName,
      productPrice: productPrice,
      quantity: quantity,
      totalPrice: totalPrice
    };
    orders.push(order); // Add the order to the orders array
    updateOrders(); // Update the orders list
    calculateChange(); // Calculate and update the change value
  });

  // Handle order quantity change
  $(document).on('change', '.order-quantity', function() {
    var index = $(this).data('order-index');
    var newQuantity = parseInt($(this).val());
    if (!isNaN(newQuantity) && newQuantity > 0) {
      orders[index].quantity = newQuantity;
      orders[index].totalPrice = orders[index].productPrice * newQuantity;
      updateOrders(); // Update the orders list
      calculateChange(); // Calculate and update the change value
    }
  });

  // Handle order removal
  $(document).on('click', '.remove-order', function() {
    var index = $(this).data('order-index');
    orders.splice(index, 1); // Remove the order from the orders array
    updateOrders(); // Update the orders list
    calculateChange(); // Calculate and update the change value
  });

  // Handle form submission
  $('#order-form').submit(function(event) {
    event.preventDefault(); // Prevent default form submission

    // Retrieve form values
    var customerName = $('[name="customer_name"]').val();
    var username = $('[name="username"]').val();
    var amount = parseFloat($('[name="amount"]').val());
    var change = parseFloat($('[name="change"]').val());

    // Create an array to store the order details
    var orderDetails = [];
    for (var i = 0; i < orders.length; i++) {
      var order = orders[i];
      var orderDetail = {
        p_id: order.productId,
        quantity: order.quantity,
        total: order.totalPrice
      };
      orderDetails.push(orderDetail);
    }

    // Create an object to hold the form data
    var formData = {
      customer_name: customerName,
      username: username,
      amount: amount,
      change: change,
      orderDetails: orderDetails,
      overallTotal: parseFloat($('#total-value').text())
    };

   // Send the form data via AJAX
   $.ajax({
  url: $(this).attr('action'),
  type: 'POST',
  dataType: 'json',
  data: formData,
  success: function(response) {
    // Handle the response from the server
    if (response.status === 'success') {
      // Payment successful
      alert(response.message);
      // Reset the form
      $('#order-form')[0].reset();
      orders = [];
      updateOrders();
      calculateChange();
    } else {
      // Payment failed
      console.log('Payment failed. Please try again.'); // Print the error message in the console
      // Reset the form
      $('#order-form')[0].reset();
      orders = [];
      updateOrders();
      calculateChange();
    }
  },
  error: function() {
    // Error handling
    console.log('An error occurred. Please try again.'); // Print the error message in the console
  }
});

  });

  // Calculate and update the change value
  function calculateChange() {
    var amount = parseFloat($('[name="amount"]').val());
    var total = parseFloat($('#total-value').text());

    if (isNaN(amount)) {
      $('[name="change"]').val(''); // Clear the change field
    } else if (!isNaN(total)) {
      var change = amount - total;
      $('[name="change"]').val(change.toFixed(2));
    }
  }

  // Add event listener to the amount input field
  $('[name="amount"]').on('input', function() {
    calculateChange(); // Recalculate the change
    var change = parseFloat($('[name="change"]').val());
    var payButton = $('.list-footer button[type="submit"]');
    if (change < 0) {
      payButton.prop('disabled', true); // Disable the Pay button
    } else {
      payButton.prop('disabled', false); // Enable the Pay button
    }
  });

  // Function to update the orders list
  function updateOrders() {
    var ordersTableBody = $('#orders-table-body');
    ordersTableBody.empty(); // Clear the orders table body

    var total = 0; // Variable to calculate the overall total

    if (orders.length === 0) {
      ordersTableBody.append('<tr><td colspan="6" class="text-center">No orders</td></tr>');
    } else {
      for (var i = 0; i < orders.length; i++) {
        var order = orders[i];
        var orderRow = '<tr>' +
          '<td>' + order.productId + '</td>' +
          '<td>' + order.productName + '</td>' +
          '<td>' + order.productPrice + '</td>' +
          '<td><input type="number" class="form-control order-quantity" data-order-index="' + i + '" value="' + order.quantity + '"></td>' +
          '<td>' + order.totalPrice + '</td>' +
          '<td><button class="btn btn-danger btn-sm remove-order" data-order-index="' + i + '"> <i class="fas fa-trash-alt"></i></button></td>' +
          '</tr>';
        ordersTableBody.append(orderRow);
        total += order.totalPrice;
      }
    }

    // Update the overall total value
    $('#total-value').text(total.toFixed(2));
  }

  // Calculate and update the change value when the amount input changes
  $('[name="amount"]').on('input', calculateChange);
});

</script>



</body>


</html>
