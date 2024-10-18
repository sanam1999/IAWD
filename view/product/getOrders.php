<?php
include ('../isAuthenticate.php');
require('../../timecount.php');
require ('../../model/orders.php');
require ('../../model/product.php');
include ('../include/header.php');
?>

<link rel="stylesheet" href="../../css/getOrders.css">

<div class="cards">
    <div class="card-header">
        Sales
    </div>
    <div class="card-body">
        <?php $orders = fetchMysales();
        if ($orders): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Total</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['title']; ?></td>
                            <td><?php echo $order['total']; ?></td>
                            <td class="des"><?php echo $order['description']; ?></td>
                            <td><?php echo timeAgo($order['oder_date']); ?></td>
                            <td><?php echo $order['quntity']; ?></td>
                            <td><?php echo $order['status']; ?></td>
                            <td>
                                <?php if ($order['status'] == 'Pending'): ?>
                                    <form action="../../route.php?order_id=<?= $order['order_id'] ?>" method="post">
                                        <input type="hidden" name="action" value="confrmOders">
                                        <button class="btn btn-outline-secondary">Confirm</button>
                                    </form>
                                <?php else: ?>
                                    <p>Confirmed</p>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<?php
include ('../include/footer.php');
?>