<?php
require 'config.php'; requireLogin();
$stmt=$conn->prepare("SELECT * FROM orders WHERE user_id=? ORDER BY order_date DESC");$stmt->bind_param("i",$_SESSION['user_id']);$stmt->execute();$orders=$stmt->get_result();
?>
<!DOCTYPE html><html><head><title>My Orders - ShopEasy</title><link rel="stylesheet" href="style.css"></head><body>
<nav class="navbar"><div class="logo">ShopEasy</div><div class="nav-links"><a href="index.php">Home</a><a href="products.php">Products</a><a href="cart.php">Cart</a><a href="orders.php">My Orders</a><a href="logout.php">Logout</a></div></nav>
<main class="container"><h1 class="section-title">My Orders</h1>
<?php if(isset($_GET['success'])): ?><div class="alert success-msg">Order placed successfully!</div><?php endif; ?>
<?php if($orders->num_rows===0): ?><div class="empty">No orders yet. <a href="products.php">Start Shopping</a></div><?php else: ?>
<div class="table-wrap"><table><tr><th>Order ID</th><th>Total</th><th>Date</th></tr>
<?php while($o=$orders->fetch_assoc()): ?><tr><td>#<?php echo $o['id']; ?></td><td>₹<?php echo number_format($o['total'],2); ?></td><td><?php echo $o['order_date']; ?></td></tr><?php endwhile; ?>
</table></div><?php endif; ?></main><footer>ShopEasy Online Shopping</footer></body></html>