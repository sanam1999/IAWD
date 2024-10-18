<?php
include ('../isAuthenticate.php');
include ('../include/header.php');
require ('../../model/card.php');
require ('../../model/product.php');

$cards = fetchcardAsObjects();
?>
<link rel="stylesheet" href="../../css/card.css">
<div class="col-4 offset-3">
    <?php if ($cards): ?>
        <?php foreach ($cards as $card): ?>
            <?php $product = fetchSingleProduct($card->product_id); ?>
            <div class="odercard mt-1 mb-1">
                <img src="../../<?php echo $product->imageurl ?>">
                <div class="odercard-content">
                    <span>
                        <h3 class="titale"><?php echo htmlspecialchars($product->title); ?></h3>
                        <p><?php echo htmlspecialchars($product->description); ?></p>
                    </span>
                    <a class="a" href="show.php?product_id=<?= $product->product_id ?>">
                        <button type="submit" class="btn btn-outline-secondary mb-2">Buy now</button>
                    </a>
                </div>
                <span class="likebox status">
                    <form action="../../route.php?like_id=<?= $card->like_id; ?>" method="post">
                        <input type="hidden" name="action" value="delike">
                        <button type="submit" class="like">
                            <i class="liked fa-solid fa-heart"></i>
                        </button>
                    </form>
                </span>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No cards found.</p>
    <?php endif; ?>
</div>

<?php
include ('../include/footer.php');
?>