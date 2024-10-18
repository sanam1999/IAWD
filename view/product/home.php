<?php
session_start();
require('../../model/product.php');

if (isset($_GET['searchitem'])) {
    $searchItem = $_GET['searchitem'];
    $products = fetchsearchProducts($searchItem);
} elseif (isset($_GET['category'])) {
    $category = $_GET['category'];
    $products = fetchRelatedProducts($category);
} else {
    $products = fetchProductsAsObjects();
}

include('../include/header.php');
?>
<style>
    #slider {

        width: 100%;
        height: 45rem;

    }

    .noo {
        margin-top: -21rem !important;
    }
</style>
<link rel="stylesheet" href="../../css/home.css">
<section class="home">
   
         <img id="slider" src="../../image/staticImg/1.png" alt="Image 1">
    
    <br>
</section>

<?php if ($products): ?>
    <div class="row row-cols-lg-6 row-cols-md-4 row-cols-sm-2 noo">
        <?php foreach ($products as $product):
            $newPrice = (int) $product->price;
            $discountedPrice = $newPrice - ($newPrice * 0.05);
            ?>
                                                                                                                                                                                                                                                                                                                                                                                        <a class="a" href="show.php?product_id=<?= $product->product_id ?>">
            <div class="card col ">
                <img src="../../<?= $product->imageurl ?>" class="card-img-top p-1" alt=<?= $product->description ?>>
                <div class="card-img-overlay card-img-overlay1"> <?= $product->description ?> </div>
                <div class="card-body">
                    <span class="cardbody">
                        <p class="card-text">
                            <?= $product->title ?>
                                <span class="dis">Rs<?= $product->price ?></span>
                                <span>Rs<?= $discountedPrice ?></span>
                          
                        </p>
                        <?php $liked = fetchlikes($product->product_id); ?>
                        <span class="likebox">
                            <form
                                action="../../route.php?<?= $liked->status == 'liked' ? 'like_id=' . $liked->like_id : 'product_id=' . $product->product_id ?>"
                                method="POST">
                                <input type="hidden" name="action" value="<?= $liked->status == 'liked' ? 'delike' : 'like' ?>">
                                <button type="submit" class="like">
                                    <i
                                        class="<?= $liked->status == 'liked' ? 'liked fa-solid fa-heart' : 'fa-regular fa-heart' ?>">
                                        &#160 </i>
                                    </button>
                                    </form>
                                    </span>
                    </span>
                </div>
            </div>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php include('../include/footer.php'); ?>
<script>
    const images = ["../../image/staticImg/1.png", "../../image/staticImg/2.png", "../../image/staticImg/3.png", "../../image/staticImg/4.png", "../../image/staticImg/5.png"];
    let currentIndex = 0;

    function changeImage() {
        currentIndex = (currentIndex + 1) % images.length;
        document.getElementById("slider").src = images[currentIndex];
    }

    setInterval(changeImage, 4000);
</script>