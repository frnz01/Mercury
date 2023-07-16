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
            <h1 class="welcome-message">Manage Payments</h1>


            <?php foreach ($products_by_supplier as $supplier => $data) : ?>
                <h2>Supplier: <?php echo $supplier; ?></h2>
                <p>Total: <?php echo $data['total']; ?></p>
                <form action="" method="post">
                    <button class="btn btn-primary btn-sm payall-button" type="button" data-total="<?php echo $data['total']; ?>" data-supplier="<?php echo $supplier; ?>">Pay All</button><br><br>
                </form>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Personnel</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Date Purchased</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['products'] as $prod) : ?>
                            <tr>
                                <td><?php echo $prod->username; ?></td>
                                <td><?php echo $prod->p_id; ?></td>
                                <td><?php echo $prod->p_name; ?></td>
                                <td><?php echo $prod->p_price; ?></td>
                                <td><?php echo $prod->quantity; ?></td>
                                <td><?php echo $prod->supplier; ?></td>
                                <td><?php echo $prod->date_purchase; ?></td>
                                <td><?php echo $prod->total; ?></td>
                                <td>
                                    <!-- <form action="" method="post"> -->
                                        <button class="btn btn-primary btn-sm pay-button" type="button" data-p_id="<?php echo $prod->p_id; ?>" data-p_name="<?php echo $prod->p_name; ?>" data-price="<?php echo $prod->p_price; ?>" data-total="<?php echo $prod->total; ?>" data-supplier="<?php echo $prod->supplier; ?>">Pay</button>
                                        <!-- <input type="hidden" name="p_id" value="<?php echo $prod->p_id; ?>">
                                        <button type="submit" class="btn btn-primary btn-sm" name="cancel">cancel</button>
                                    </form> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>

        </div>


        <!-- Edit User Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo site_url('payment/update'); ?>">
                            <div class="form-group">
                                <label for="total">Supplier</label>
                                <input type="text" class="form-control" id="supplier" name="supplier" readonly>
                            </div>
                            <div class="form-group">
                                <label for="p_id">Product ID</label>
                                <input type="text" class="form-control" id="p_id" name="p_id" readonly>
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" id="total" name="total" readonly>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="payment">Pay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pay all Modal -->
        <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="payModalLabel">Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo site_url('payment/updateAll'); ?>" >
                            <input type="hidden" name="productIds" id="productIds">
                            <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <input type="text" class="form-control" id="supplier" name="supplier" readonly>
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody id="productList">
                                    <!-- Product rows will be dynamically inserted here -->
                                </tbody>
                            </table>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" id="total" name="total" readonly>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="payment">Pay</button>
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
        $(document).ready(function() {
            $('.pay-button').click(function() {
                var button = $(this);
                var p_id = button.data('p_id');
                var total = button.data('total');
                var supplier = button.data('supplier');


                //   console.log(p_id);
                //   console.log(p_id);

                $('#editModal #p_id').val(p_id);
                $('#editModal #total').val(total);
                $('#editModal #supplier').val(supplier);

                $('#editModal').modal('show'); // Show the modal
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.payall-button').click(function() {
                var button = $(this);
                var total = button.data('total');
                var supplier = button.data('supplier');

                $('#payModal #total').val(total);
                $('#payModal #supplier').val(supplier);

                // Get the product IDs for the current supplier
                var productIds = [];
                button.closest('.content').find('table tbody tr').each(function() {
                  var row = $(this);
                  var rowSupplier = row.find('td:eq(5)').text(); // Supplier column index
                
                  if (rowSupplier === supplier) {
                    var productId = row.find('td:eq(1)').text();
                    productIds.push(productId);
                  }
                });
                 // Store the product IDs in a hidden input field in the form
                $('#payModal #productIds').val(productIds.join(','));

                // Get the product data for the current supplier
                var productList = '';
                button.closest('div.content').find('table tbody tr').each(function() {
                    var row = $(this);
                    var rowSupplier = row.find('td:eq(5)').text(); // Supplier column index

                    if (rowSupplier === supplier) {
                        var productId = row.find('td:eq(1)').text();
                        var productName = row.find('td:eq(2)').text();
                        var productPrice = row.find('td:eq(3)').text();

                        productList += '<tr>';
                        productList += '<td>' + productId + '</td>';
                        productList += '<td>' + productName + '</td>';
                        productList += '<td>' + productPrice + '</td>';
                        productList += '</tr>';
                    }
                });

                $('#productList').html(productList);

                $('#payModal').modal('show'); // Show the modal
            });

            $('#payModal').on('hidden.bs.modal', function() {
                // Clear the modal data when the modal is closed
                $('#payModal #total').val('');
                $('#payModal #supplier').val('');
                $('#productList').empty();
            });
        });
    </script>




</body>


</html>