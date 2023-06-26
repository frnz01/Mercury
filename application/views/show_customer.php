
<!-- <html>
    <?php echo $customer->CustomerID; ?>
    <?php echo $customer->name; ?>
    <?php echo $customer->contact_no; ?>
    <?php echo $customer->address; ?>
</html> -->

<html>
<head>
    <style>
        body {
            background-color: #f5f5f5;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e5e5e5;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #e5e5e5;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f8f8f8;
            color: #555555;
            font-weight: bold;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $customer->CustomerID; ?></td>
                <td><?php echo $customer->name; ?></td>
                <td><?php echo $customer->contact_no; ?></td>
                <td><?php echo $customer->address; ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>




