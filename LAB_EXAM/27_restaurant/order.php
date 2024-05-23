<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['place_order']) && !empty($_SESSION['cart'])) {
    $user_id = $_SESSION['user_id'];
    $pdo->beginTransaction();

    try {
        foreach ($_SESSION['cart'] as $menu_id => $item) {
            $quantity = $item['quantity'];
            $total_price = $item['total_price'];

            $stmt = $pdo->prepare("INSERT INTO orders (user_id, menu_id, quantity, total_price) VALUES (?, ?, ?, ?)");
            $stmt->execute([$user_id, $menu_id, $quantity, $total_price]);
        }
        $pdo->commit();
        $_SESSION['cart'] = []; // Clear the cart
        header("Location: orders.php");
        exit();
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Failed to place order: " . $e->getMessage();
    }
} else {
    header("Location: cart.php");
    exit();
}
