<?php

if (!isset($_GET['product_id']) || !isset($_GET['quantity'])) {
    header('Location: home.php');
    exit;
}

$product_id = $_GET['product_id'];
$quantity = $_GET['quantity'];
include('../isAuthenticate.php');
require('../../model/product.php');
require('../../model/orders.php');
include('../include/header.php');



$product = fetchSingleProduct($product_id);
$price = (int) $product->price;
$total = $quantity * $price;
$deliveryCharge = 150;
$discountedPrice = $total - ($total * ($product->discount / 100)) + $deliveryCharge;
$total += $deliveryCharge;

?>
<link rel="stylesheet" href="../../css/book.css">

<div class="show col-8 offset-2">
    <div class="payment " style="display: none;">
        <div class="invoice-form">
            <h2>Invoice <span class="cancel-btn" id="cancel-invoice">X</span></h2>
            <div class="form-group">
                <label for="card-number">Card number</label>
                <input type="number" required id="card-number" placeholder="1234 5678 9012 3456" required>
            </div>
            <div class="form-group">
                <label for="card-name">Name on card</label>
                <input type="text" required id="card-name" placeholder="Ex. John Doe" required>
            </div>
            <div class="form-group">
                <label for="expiry-date">Expiry date</label>
                <input type="number" required id="expiry-date" placeholder="01 / 19" required>
            </div>
            <div class="form-group">
                <label for="security-code">Security code</label>
                <input type="number" required id="security-code" placeholder="•••" required>
                <span class="info-icon">?</span>
            </div>
            <button class="book paymentnext btn btn-outline-secondary">Next</button>
        </div>
    </div>

    <div class="otp" style="display: none;">
        <div class="invoice-form">
            <h2>NearbyHome <span class="cancel-btn" id="cancel-otp">X</span></h2>

            <div class="form-group">
                <label for="otp-code">One Time Password</label>
                <input type="text" required id="otp-code" name="otp" placeholder="* * * *">
                <p class="errorotp danger"></p>
            </div>
            <form id="paymentForm" action="../../route.php" method="POST">
                <input type="hidden" name="action" value="buy">
                <input type="hidden" name="product_id" value="<?= htmlspecialchars($product_id); ?>">
                <input type="hidden" name="quantity" value="<?= htmlspecialchars($quantity); ?>">
                <input type="hidden" name="price" value="<?= htmlspecialchars($price); ?>">
                <input type="hidden" name="discountedPrice" value="<?= htmlspecialchars($discountedPrice); ?>">
                <button type="submit" class="btn btn-outline-secondary" id="buyNowLink">Buy Now</button>
            </form>
        </div>
    </div>


    <div class="paymentProsess col-12 mt-5">
        <?php
        $Address = fetchAddress();
        if ($Address) {
            echo '<p><span><i class="fa-solid fa-location-dot"></i> Address</span> <span>' . $Address->address . '</span></p>';
        } else {
            echo '<p><span>Address</span> <span><a href="profile.php" ><i class="fa-solid fa-puzzle-piece"></i> Address</a></span></p>';


        }
        ?>

        <p><span>Quantity</span> <span><?= htmlspecialchars($quantity); ?></span></p>
        <p><span>Price</span> <span>Rs <?= htmlspecialchars($product->price); ?></span></p>
        <p><span>Delivery charge</span> <span>Rs <?= $deliveryCharge; ?></span></p>
        <p><span>Total</span> <span class="text-decoration-line-through">Rs <?= htmlspecialchars($total); ?></span>
            &nbsp;&nbsp; <?= htmlspecialchars($product->discount) ?> %Off Rs
            <?= htmlspecialchars($discountedPrice); ?></span>
        </p>
        <br>
        <?php

        if ($Address) {
            echo '<button class="book getpay btn btn-outline-secondary ">Confirm</button>';
        } else {
            ?>
            <div class="address-warning">
                <button class="book getpay btn btn-secondary" disabled>Confirm</button>
                <a href="profile.php" class="btn btn-outline-dark"><i class="fa-solid fa-puzzle-piece"></i> Address</a>
            </div>
            <p class="h6">Please add your address before proceeding with the order.</p>
            <?php
        }
        ?>



    </div>
</div>
<script src="../../js/book.js"></script>
<?php include('../include/footer.php'); ?>