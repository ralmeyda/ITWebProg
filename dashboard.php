<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link
            href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
            rel="stylesheet"
        />
        <style>
        body {
            padding-top: 100px; /* so content isn’t hidden behind fixed header */
        }

        .dashboard-container {
            width: 90%;
            margin: 0 auto;
        }

        .dashboard-container h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #e35f26;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }

        .add-btn {
            display: inline-block;
            background-color: #e35f26;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .no-products {
            text-align: center;
            padding: 30px;
            font-size: 18px;
            color: #555;
        }
    </style>
    </head>
    <body>
        <header>
        <a href="dashboard.php" class="logo">CYCRIDE</a>
        <nav class="navbar" id="navbar">
            <a href="dashboard.php">Home</a>
            <a href="addproduct.php">Add Product</a>
        </nav>
        </header>
        <h1 style="margin-top:135px;text-align:center;"> Dashboard </h1>
        <div class="dashboard-container">
    <h1>📦 Product List</h1>
    <a href="addproduct.php" class="add-btn">+ Add New Product</a>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Image</th>
                <th>Price</th>
                <th>Units</th>
                <th>Date Added</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><img src="<?php echo $row['image']; ?>" alt="product"></td>
                    <td>₱<?php echo number_format($row['price'], 2); ?></td>
                    <td><?php echo $row['units']; ?></td>
                    <td><?php echo date("M d, Y", strtotime($row['created_at'])); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <div class="no-products">
            No products have been added yet.
        </div>
    <?php endif; ?>
</div>
    </body>
</html>

