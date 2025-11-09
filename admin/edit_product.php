<?php
require_once '../config.php';
require_once 'admin_functions.php';
require_once '../functions.php';

requireAdmin();

$id = intval($_GET['id']);
$product = getProductById($id);
$categories = getCategories();

if (!$product) {
    die("Product not found!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryId = intval($_POST['category_id']);
    $productName = trim($_POST['product_name']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $stockQuantity = intval($_POST['stock_quantity']);
    $imageUrl = $product['image_url'];

    // Handle image upload (optional)
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $uploadResult = uploadProductImage($_FILES['product_image']);
        if ($uploadResult['success']) {
            $imageUrl = 'admin/' . $uploadResult['filepath'];
        }
    }

    $updated = updateProduct($id, $categoryId, $productName, $description, $price, $stockQuantity, $imageUrl);
    if ($updated['success']) {
        header('Location: manage_products.php?updated=1');
        exit;
    } else {
        $error = $updated['message'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product - CYCRIDE Admin</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <header>
        <a href="dashboard.php" class="logo">CYCRIDE ADMIN</a>
        <nav class="navbar">
            <a href="dashboard.php">Dashboard</a>
            <a href="manage_products.php">Manage Products</a>
            <a href="../logout_process.php" style="color:#ff4444;">Logout</a>
        </nav>
    </header>

    <div class="admin-container">
        <h1><i class="ri-edit-line"></i> Edit Product</h1>

        <?php if (!empty($error)): ?>
            <p style="color:red;"><?php echo clean($error); ?></p>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <label>Category:</label>
            <select name="category_id" required>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?php echo $cat['category_id']; ?>" <?php if ($product['category_id'] == $cat['category_id']) echo 'selected'; ?>>
                        <?php echo clean($cat['category_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Product Name:</label>
            <input type="text" name="product_name" value="<?php echo clean($product['product_name']); ?>" required>

            <label>Description:</label>
            <textarea name="description"><?php echo clean($product['description']); ?></textarea>

            <label>Price (₱):</label>
            <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>

            <label>Stock Quantity:</label>
            <input type="number" name="stock_quantity" value="<?php echo $product['stock_quantity']; ?>" required>

            <label>Current Image:</label><br>
            <img src="../<?php echo $product['image_url']; ?>" width="100" style="margin-bottom:10px;"><br>
            <input type="file" name="product_image" accept="image/*">

            <button type="submit" class="btn-primary">Update Product</button>
        </form>
    </div>
</body>
</html>
