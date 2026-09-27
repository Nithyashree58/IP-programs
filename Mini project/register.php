<?php
require 'config.php'; $error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name=trim($_POST['name']); $email=trim($_POST['email']); $password=$_POST['password'];
    if($name==='' || !filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($password)<6){$error='Enter valid details. Password must contain at least 6 characters.';}
    else{
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $stmt=$conn->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)"); $stmt->bind_param("sss",$name,$email,$hash);
        if($stmt->execute()){header("Location: login.php?registered=1");exit;} else {$error='Email already exists.';}
    }
}
?>
<!DOCTYPE html><html><head><title>Register - ShopEasy</title><link rel="stylesheet" href="style.css"></head><body>
<nav class="navbar"><div class="logo">ShopEasy</div><div class="nav-links"><a href="index.php">Home</a><a href="products.php">Products</a><a href="login.php">Login</a></div></nav>
<div class="form-box"><h2>Create Account</h2><?php if($error): ?><div class="alert"><?php echo $error; ?></div><?php endif; ?>
<form method="post"><label>Name</label><input name="name" required><label>Email</label><input type="email" name="email" required><label>Password</label><input type="password" name="password" minlength="6" required><br><br><button class="btn" type="submit">Register</button></form>
<p style="margin-top:15px">Already have an account? <a href="login.php">Login</a></p></div><footer>ShopEasy</footer></body></html>