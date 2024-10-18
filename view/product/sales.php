<?php
include('../isAuthenticate.php');
require('../../timecount.php');
require('../../model/orders.php');
include('../include/header.php');
$myAllProduct = fetchMyAllsales();
?>
<?php
$totaloder = 0;
$totalsales = 0;
$totalprice = 0;
if ($myAllProduct) {
    foreach ($myAllProduct as $order) {
        $totaloder += $order['pending_orders_count'];
        $totalprice += $order['total_sales'];
        $totalsales += $order['total_quantity'];
    }
}
?>
<link rel="stylesheet" href="../../css/sales.css">
<div class="col-8 offset-2 mt-5 mb-5">
    <div class="d-flex justify-content-evenly">
        <a href="getOrders.php" class="btn btn-outline-secondary btn-lg position-relative l-w-2 ">
            Placed Orders
            <?php if ($totaloder > 0) {
                echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                ' . $totaloder . '
            </span>';
            }
            ?>
        </a>
        <button type="button" class="btn btn-dark position-relative l-w-2">
            Total Sales
            <?php if ($totalsales > 0) {
                echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                ' . $totalsales . '
            </span>';
            }
            ?>
        </button>
        <button type="button" class="btn btn-dark position-relative l-w-2">
            Total Sales Rs <?php echo $totalprice ?>
        </button>
    </div>
</div>
<?php
if ($myAllProduct): ?>
                                                 <?php foreach ($myAllProduct as $order):
                ?>
        <div class="col-6  offset-3 mt-1">


            <div class="col-12 card d-flex flex-row mb-2 " style="height :11rem;">
                <img src="../../<?php echo $order['imageUrl'] ?>" alt="Card Image" class="col-3 p-2 l-br-1">
                <div class="col-7">

                    <h3 class="titale h4 pt-2 mb-0"><?php echo $order['title'] ?></h3>
                    <p class="mb-0 h6"><?php echo $order['description']; ?></p>
                    <p class="mt-5 pt-3 h6"> Rs <?php echo $order['total_sales'] + 0; ?></p>
                    </div>
                <div class="status  pt-2 ml-2">
                    <p class="h6 mt-1 l-ml-4"><?php echo timeAgo($order['created_at']); ?></p>
                    <p class="h6 mt-1 l-ml-4"> Sales <?php echo $order['total_quantity'] + 0; ?><i class="fa-solid fa-xmark"></i></p>
                </div>
                </div>
        </div>
    <?php endforeach;
endif;
?>
<?php
include('../include/footer.php');
?>