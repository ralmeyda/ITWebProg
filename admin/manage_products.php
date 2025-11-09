<?php
require_once '../config.php';
require_once 'admin_functions.php';
require_once '../functions.php';

requireAdmin();

$products = getAllProductsAdmin();

$added = isset($_GET['added']) ? true : false;
$deleted = isset($_GET['deleted']) ? true : false;
$updated = isset($_GET['updated']) ? true : false;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Products - CYCRIDE Admin</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body { background: #f5f5f5; }
        .admin-container { max-width: 1200px; margin: 100px auto; padding: 20px; }
        table {
            width: 100%; border-collapse: collapse; background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden;
        }
        th, td {
            padding: 15px; border-bottom: 1px solid #ddd; text-align: left;
        }
        th { background: #e35f26; color: white; }
        tr:hover { background: #f9f9f9; }
        img { max-width: 60px; border-radius: 4px; }
        .actions a {
            margin-right: 10px; text-decoration: none; padding: 6px 12px;
            border-radius: 6px; color: white; font-size: 13px;
        }
        .edit-btn { background: #3498db; }
        .delete-btn { background: #e74c3c; }
        .alert {
            padding: 15px; border-radius: 6px; margin-bottom: 20px;
            font-weight: 600;
        }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>
    <header>
        <a href="dashboard.php" class="logo">CYCRIDE ADMIN</a>
        <nav class="navbar">
            <a href="dashboard.php">Dashboard</a>
            <a href="add_product.php">Add Product</a>
            <a href="../logout_process.php" style="color:#ff4444;">Logout</a>
        </nav>
    </header>

    <div class="admin-container">
        <h1><i class="ri-list-check"></i> Manage Products</h1>

        <?php if ($added): ?>
            <div class="alert alert-success">✅ Product added successfully!</div>
        <?php elseif ($updated): ?>
            <div class="alert alert-success">✅ Product updated successfully!</div>
        <?php elseif ($deleted): ?>
            <div class="alert alert-success">🗑️ Product deleted successfully!</div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price (₱)</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                    <tr><td colspan="7" style="text-align:center;">No products found.</td></tr>
                <?php else: ?>
                    <?php foreach ($products as $p): ?>
                        <tr>
                            <td><?php echo $p['product_id']; ?></td>
                            <td><img src="../<?php echo $p['image_url']; ?>" alt=""></td>
                            <td><?php echo clean($p['product_name']); ?></td>
                            <td><?php echo clean($p['category_name']); ?></td>
                            <td><?php echo number_format($p['price'], 2); ?></td>
                            <td><?php echo $p['stock_quantity']; ?></td>
                            <td class="actions">
                                <a href="edit_product.php?id=<?php echo $p['product_id']; ?>" class="edit-btn"><i class="ri-edit-line"></i> Edit</a>
                                <a href="delete_product.php?id=<?php echo $p['product_id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this product?');"><i class="ri-delete-bin-line"></i> Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
