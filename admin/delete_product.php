<?php
require_once '../config.php';
require_once 'admin_functions.php';
require_once '../functions.php';

requireAdmin();

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $result = deleteProduct($product_id);

    if ($result['success']) {
        header("Location: manage_products.php?deleted=1");
        exit;
    } else {
        header("Location: manage_products.php?error=1");
        exit;
    }
} else {
    header("Location: manage_products.php");
    exit;
}
?>