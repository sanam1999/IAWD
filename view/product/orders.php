<?php
include('../isAuthenticate.php');
require('../../timecount.php');
include('../include/header.php');
require('../../model/orders.php');
require('../../model/product.php');
$orders = fetchOdersAsObjects();
?>
<link rel="stylesheet" href="../../css/orders.css">
<div class="f">
    <?php if ($orders): ?>
        <?php foreach ($orders as $order):

            $product = fetchSingleProduct($order->product_id);
            ?>

            <div class="odercard mt-1 mb-1">
                <img src="../../<?= $product->imageurl ?>" alt="product">
                <div class="odercard-content">
                    <span>
                        <h3 class="titale"> <?php echo $product->title ?></h3>
                        <p><?php echo htmlspecialchars($product->description); ?></p>
                    </span>
                    <?php if ($order->status == "Pending"): ?>
                        <form action="../../route.php?order_id=<?= urlencode($order->order_id) ?>" method="post">
                            <input type="hidden" name="action" value="canceloder">
                            <button type="submit" class="cancelbtn btn btn-outline-danger">Cancel</button>
                        </form>
                    <?php elseif ($order->status == "Cancelled" || $order->status == "Delivered"): ?>
                        <button class="btn">
                            <a class="btn btn-outline-secondary" href="show.php?product_id=<?= $product->product_id; ?>">buy
                                again</a>
                        </button>
                    <?php else: ?>
                        <button class=" disable btn btn-outline-danger">Cancel</button>
                        <p class="error"></p>
                    <?php endif; ?>




                </div>

                <div class="status">
                    <p class="pending"><?php echo $order->status ?></p>
                    <p><?php echo timeAgo($order->oder_date) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<script src="../../js/orders.js"></script>
<?php
include('../include/footer.php');
?>