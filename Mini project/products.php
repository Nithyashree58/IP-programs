<?php require 'config.php'; $result=$conn->query("SELECT * FROM products ORDER BY id DESC"); ?>
<!DOCTYPE html><html><head><title>Products - ShopEasy</title><link rel="stylesheet" href="style.css"></head>
<body>
<nav class="navbar"><div class="logo">ShopEasy</div><div class="nav-links"><a href="index.php">Home</a><a href="products.php">Products</a><a href="cart.php">Cart (<?php echo array_sum($_SESSION['cart'] ?? []); ?>)</a><?php if(isLoggedIn()): ?><a href="orders.php">My Orders</a><a href="logout.php">Logout</a><?php else: ?><a href="login.php">Login</a><?php endif; ?></div></nav>
<main class="container"><h1 class="section-title">Our Products</h1>
<div class="grid">
<?php while($p=$result->fetch_assoc()): ?>
<div class="card"><img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>"><div class="card-body">
<h3><?php echo htmlspecialchars($p['name']); ?></h3><p class="small"><?php echo htmlspecialchars($p['description']); ?></p><div class="price">₹<?php echo number_format($p['price'],2); ?></div>
<a class="btn" href="cart.php?action=add&id=<?php echo $p['id']; ?>">Add to Cart</a></div></div>
<?php endwhile; ?>
</div></main><footer>ShopEasy Online Shopping</footer></body></html>