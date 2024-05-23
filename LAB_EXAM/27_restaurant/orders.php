<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT orders.*, menu.name FROM orders JOIN menu ON orders.menu_id = menu.id WHERE orders.user_id = ?");
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="cart.php">Cart</a>
        <a href="orders.php">My Orders</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <h1>My Orders</h1>
        <?php if ($orders): ?>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Menu Item</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Order Status</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['id']); ?></td>
                            <td><?php echo htmlspecialchars($order['name']); ?></td>
                            <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($order['total_price']); ?></td>
                            <td><?php echo htmlspecialchars($order['order_status']); ?></td>
                            <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You have no orders.</p>
        <?php endif; ?>
    </div>
</body>
</html>
