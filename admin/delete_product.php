<?php
require_once '../config.php';
require_once 'admin_functions.php';
require_once '../functions.php';

requireAdmin();

$id = intval($_GET['id']);

if ($id > 0) {
    $result = deleteProduct($id);
    if ($result['success']) {
        header('Location: manage_products.php?deleted=1');
        exit;
    } else {
        die("Error: " . $result['message']);
    }
} else {
    die("Invalid product ID.");
}
?>
