<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
<head><title>ShopEasy - Online Shopping</title><link rel="stylesheet" href="style.css"></head>
<body>
<nav class="navbar"><div class="logo">ShopEasy</div><div class="nav-links">
<a href="index.php">Home</a><a href="products.php">Products</a><a href="cart.php">Cart (<?php echo array_sum($_SESSION['cart'] ?? []); ?>)</a>
<?php if(isLoggedIn()): ?><a href="orders.php">My Orders</a><a href="logout.php">Logout</a>
<?php else: ?><a href="login.php">Login</a><a href="register.php">Register</a><?php endif; ?>
</div></nav>
<main class="container">
<section class="hero"><h1>Welcome to ShopEasy</h1><p>Simple, secure and dynamic online shopping website built using HTML, CSS, JavaScript, PHP and MySQL.</p><a class="btn" href="products.php">Shop Now</a></section>
<h2 class="section-title">Why ShopEasy?</h2>
<div class="grid">
<div class="card"><div class="card-body"><h3>🛍️ Easy Shopping</h3><p>Browse products and add your favourite items to the cart.</p></div></div>
<div class="card"><div class="card-body"><h3>🔐 User Login</h3><p>Create an account and securely manage your orders.</p></div></div>
<div class="card"><div class="card-body"><h3>🗄️ MySQL Database</h3><p>Products, users and orders are stored dynamically in MySQL.</p></div></div>
</div>
</main><footer>© 2026 ShopEasy | Mini Project</footer>
</body></html>