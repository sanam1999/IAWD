<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Near By Home</title>
  </head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/star.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/localboostrap.css">

</head>
<header>
    <div class="navbars">
            <a class="border2" href="../product/home.php">
                <i class="fa-solid weblogo fa-cart-flatbed"></i>
       </a>
                <form class="nav-sea " action="home.php" method="get">
                <input class="search-item" name="searchitem" placeholder="Search">
                <button class="search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                </form>
        <div class="nav-signin border2">
                <pre class="same1">Hello, sign in <br>   Account & Lists </pre>
            <div class="option">
                <?php if ($_SESSION['login'] == true && isset($_SESSION['login'])): ?>
                    <a href="../product/logout.php">Logout</a>
                    <a href="../product/profile.php">Profile</a>
                <?php else: ?>
                    <a href="../product/SingUp.php">SignIn</a>
                    <a href="../product/login.php">Login</a>
                <?php endif ?>
            </div>
        </div>
        <a href="../product/orders.php" class="return border2">
            <pre>Return <br>& Orders</pre> 
        </a>
 <a href="../product/card.php" class="card2 return border2">       
            <i class="fa-solid fa-cart-shopping fa-beat"></i>
            <br>
            <p id="card">Cart</p>
        </a>
    </div>
</header>
<div class="panal">
    <div class="filters">
        <i class="fa-solid toggleButton border2 fa-bars"></i>
        <a class="filter border2" href="home.php?category=Electronics">
            <div><i class="fa-solid fa-bolt-lightning"></i></div>
            <p>Electronics</p>
        </a>
        <a class="filter border2" href="home.php?category=Fashion">
            <div><i class="fa-solid fa-vest-patches"></i></div>
            <p>Fashion</p>
        </a>
        <a class="filter border2" href="home.php?category=Home Garden">
            <div><i class="fa-solid fa-warehouse"></i></div>
            <p>Home & Gardens</p>
        </a>
        <a class="filter border2" href="home.php?category=Mobile Phones">
            <div><i class="fa-solid fa-mobile-screen-button"></i></div>
            <p>Mobile Phones</p>
        </a>
        <a class="filter border2" href="home.php?category=Laptops">
            <div><i class="fa-solid fa-laptop"></i></div>
            <p>Laptops</p>
        </a>
        <a class="filter border2" href="home.php?category=Cameras">
            <div><i class="fa-solid fa-camera-retro"></i></div>
            <p>Cameras</p>
        </a>
        <a class="filter border2" href="home.php?category=Men's Clothing">
            <div><i class="fa-solid fa-person"></i></div>
            <p>Men's Clothing</p>
        </a>
        <a class="filter border2" href="home.php?category=Women's Clothing">
            <div><i class="fa-solid fa-person-dress"></i></div>
            <p>Women's Clothing</p>
        </a>
        <a class="filter border2" href="home.php?category=Shoes">
            <div><i class="fa-solid fa-shoe-prints"></i></div>
            <p>Shoes</p>
        </a>
        <a class="filter border2" href="home.php?category=Furniture">
            <div><i class="fa-solid fa-couch"></i></div>
            <p>Furniture</p>
        </a>
    </div>
</div>
<div id="sidebar" class="sidebar oc">
<?php if ($_SESSION['login'] == true && isset($_SESSION['login'])): ?>
        <a class="sidebar-item oc" href="../product/profile.php"><i class="fa-solid fa-user"></i>
        <?php echo $_SESSION['user']; ?></a>
<?php endif ?>
<a href="../product/home.php" class="sidebar-item oc"> <i class="fa-solid fa-house"></i> Home</a>
<a href="../product/card.php" class="sidebar-item oc"> <i class="fa-solid fa-bookmark"></i> Card</a>
<a href="../product/AddProduct.php" class="sidebar-item oc"><i class="fa-solid fa-plus"></i> Add Post</a>
<a href="../product/orders.php" class="sidebar-item oc"> <i class="fa-solid fa-cart-shopping"></i> Orders</a>
<a href="../product/sales.php" class="sidebar-item oc"> <i class="fa-brands fa-sellsy"></i> Sells</a>
<a href="../product/getOrders.php" class="sidebar-item oc"> <i class="fa-solid fa-truck-fast"></i> Placed Orders</a>
<?php if ($_SESSION['login'] == true && isset($_SESSION['login'])): ?>
    <a class="sidebar-item oc" href="../product/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
<?php endif ?>
</div>
<?php
include ("flassmsg.php");
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<body>
    <main class="main-content">