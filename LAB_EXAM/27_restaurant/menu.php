<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM menu");
$menuItems = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="orders.php">My Orders</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <h1>Menu</h1>
        <ul>
            <?php foreach ($menuItems as $item): ?>
                <li>
                    <?php echo htmlspecialchars($item['name']) . " - $" . htmlspecialchars($item['price']); ?>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="menu_id" value="<?php echo $item['id']; ?>">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
