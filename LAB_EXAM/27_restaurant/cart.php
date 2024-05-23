<?php
session_start();

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Adding item to cart
if (isset($_POST['add_to_cart'])) {
    $menu_id = $_POST['menu_id'];
    $quantity = (int) $_POST['quantity'];

    // Fetch menu item details from the database
    require 'db.php';
    $stmt = $pdo->prepare("SELECT * FROM menu WHERE id = ?");
    $stmt->execute([$menu_id]);
    $item = $stmt->fetch();

    if ($item) {
        $item_name = $item['name'];
        $item_price = $item['price'];
        $total_price = $quantity * $item_price;
        
        // If item already in cart, update quantity and total price
        if (isset($_SESSION['cart'][$menu_id])) {
            $_SESSION['cart'][$menu_id]['name'] = $item_name;
            $_SESSION['cart'][$menu_id]['price'] = $item_price;
            $_SESSION['cart'][$menu_id]['quantity'] += $quantity;
            $_SESSION['cart'][$menu_id]['total_price'] += $total_price;
        } else {
            // Add new item to cart
            $_SESSION['cart'][$menu_id] = [
                'name' => $item_name,
                'price' => $item_price,
                'quantity' => $quantity,
                'total_price' => $total_price
            ];
        }
    }
}

// Display cart items
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
        <h1>Your Cart</h1>
        <?php if (!empty($_SESSION['cart'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $menu_id => $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($item['price'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($item['quantity'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($item['total_price'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="order.php" method="post">
                <button type="submit" name="place_order">Place Order</button>
            </form>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>
</html>
