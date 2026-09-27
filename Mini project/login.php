<?php
require 'config.php'; if(isLoggedIn()){header("Location: index.php");exit;} $error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $email=trim($_POST['email']);$password=$_POST['password'];
    $stmt=$conn->prepare("SELECT id,name,password FROM users WHERE email=?");$stmt->bind_param("s",$email);$stmt->execute();$res=$stmt->get_result();$user=$res->fetch_assoc();
    if($user && password_verify($password,$user['password'])){$_SESSION['user_id']=$user['id'];$_SESSION['user_name']=$user['name'];header("Location: products.php");exit;}
    $error='Invalid email or password.';
}
?>
<!DOCTYPE html><html><head><title>Login - ShopEasy</title><link rel="stylesheet" href="style.css"></head><body>
<nav class="navbar"><div class="logo">ShopEasy</div><div class="nav-links"><a href="index.php">Home</a><a href="products.php">Products</a><a href="register.php">Register</a></div></nav>
<div class="form-box"><h2>User Login</h2><?php if(isset($_GET['registered'])): ?><div class="alert success-msg">Registration successful. Please login.</div><?php endif; ?><?php if($error): ?><div class="alert"><?php echo $error; ?></div><?php endif; ?>
<form method="post"><label>Email</label><input type="email" name="email" required><label>Password</label><input type="password" name="password" required><br><br><button class="btn" type="submit">Login</button></form><p style="margin-top:15px">New user? <a href="register.php">Create account</a></p></div><footer>ShopEasy</footer></body></html>