<?php

require('../../model/product.php');
require('../../model/RF.php');
require('../../timecount.php');


if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $product = fetchSingleProduct($product_id);
    if ($product) {
        include('../include/header.php');

        $newPrice = (int) $product->price;
        $discountedPrice = $newPrice - ($newPrice * $product->discount / 100);
        ?>

        <link rel="stylesheet" href="../../css/show.css">
        <div class="show col-6 offset-3 mt-3">
             <h5 class="card-title col-6 offset-5"><?php echo $product->title; ?></h5>
            <div class="card cardmain mb-3 " style="max-width: 70rem">
                
                <div class="row g-0">
                    <div class="col-md-6">
                        <img class="card-img-top p-2  card-img-top2" src="../../<?php echo ($product->imageurl); ?>"
                            alt="Card image cap">
                    </div>
                    
                    <div class="col-md-6">
                        
                        <div class="card-body l-mr-3 pt-3 ">
                           
                            <p class="card-text card-text2 h5"> <?php echo $product->description; ?></p>
                        <p class="card-text card-text2 mt-4"> Available <span class="gap1"><?php echo $product->stock; ?></span></p>
                            <p class="card-text card-text2">Condition <span
                                    class="gap1"><?php echo $product->condition; ?></span></p>
                            <p class="card-text card-text2">Price <span class="gap1 dis">Rs
                                    <?php echo $product->price; ?></span></p>
                            <p class="card-text card-text2"><?= $product->discount ?>% Off <span class=" gap1 ">Rs <?= $discountedPrice ?></span>
                            </p>
                            <div class="user">
                                <form action="profile.php" method="get">
                                    <input type="hidden" name="user_id" value="<?php echo ($product->user_id); ?>">
                                    <button type="submit" class="btn btn-outline-secondary btn-lg">Profile</button>
                                    </form>
                                <p class="card-text"><small class="text-body-secondary"> Ago
                                        <?php echo timeAgo($product->created_at) ?></small></p>

                                <div class="order">
                                    <a id="buyNowLink" class="btn btn-outline-secondary"
                                        href="book.php?product_id=<?php echo ($product_id); ?>&quantity=1">Buy Now</a>
                                    <div class="qnt">
                                        <button class=" btn btn-outline-secondary m">-</button>
                                        <p class="countdisplay">1</p>
                                        <button class="btn btn-outline-secondary p">+</button>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                </div>
            </div>


            <div class="col-12">
                <form action="../../route.php?product_id=<?php echo ($product->product_id); ?>" novalidate class="needs-validation"
        method="post">
                    <div class="">
                        <input type="hidden" name="action" value="comment">
                        <fieldset class="starability-slot">
                            <legend>First rating:</legend>
                            <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="1" checked
                                aria-label="No rating." />
                            <input type="radio" id="second-rate1" class="input-no-rate" name="rating" value="1" />
                            <label for="second-rate1" title="Terrible">1 star</label>
                            <input type="radio" id="second-rate2" name="rating" value="2" />
                            <label for="second-rate2" title="Not good">2 stars</label>
                            <input type="radio" id="second-rate3" name="rating" value="3" />
                            <label for="second-rate3" title="Average">3 stars</label>
                            <input type="radio" id="second-rate4" name="rating" value="4" />
                            <label for="second-rate4" title="Very good">4 stars</label>
                            <input type="radio" id="second-rate5" name="rating" value="5" />
                            <label for="second-rate5" title="Amazing">5 stars</label>
                        </fieldset>
                    </div>
                    <label for="review" class="form-comment">Comments</label>
                    <textarea name="comment" class="form-control" id="comment" cols="90" rows="5"></textarea>
                    <div class="invalid-feedback">Please add some comments for review</div>

                    <br>
                    <button class="btn btn-outline-dark mb-3">Submit</button>
                </form>
            </div>
<?php
            $pid = $product->product_id;
            $Reviews = GetReview($pid);
            $curuserid = $_SESSION['userid'];

            if ($Reviews): ?>
                            <div class="  col-12">
                                <h1 class="card-header" style="text-align: center;">Reviews</h1>
                                <div class="p-2">
                        <?php foreach ($Reviews as $Review): ?>
                                            <div class="">
                                                <span class="commentq">
                                                    <h4 class="card-title">@<?php echo ($Review->uname); ?></h4>
                                    <p class="starability-result" data-rating="<?php echo ($Review->rating); ?>"></p>
                                </span>
                                <p class="card-text"><?php echo ($Review->comment); ?></p>
                                <?php if ($curuserid == $Review->user_id): ?>


                                    <form action="../../route.php?Review_id=<?php echo $Review->review_id ?>" method="POST">
                                        <input type="hidden" name="action" value="deleteReview">
                                        <button type="submit" class="btn btn-outline-dark">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                        </div>
                        </div>
                        <?php endif; ?>
        </div>
        <h1 class="card-header" style="text-align: center;">Related Items</h1>
        <section class="course-2">
            <?php
            $products = fetchRelatedProducts($product->category);
            if ($products): ?>
                    <div class="row row-cols-lg-6 row-cols-md-4 row-cols-sm-2 ">
                        <?php foreach ($products as $product):
                            if ($pid == $product->product_id) {
                                continue;
                            }
                        $newPrice = (int) $product->price;
                        $discountedPrice = $newPrice - ($newPrice * 0.05);
                        ?>
                                        <a class="a" href="show.php?product_id=<?= $product->product_id ?>">
                            <div class="card col">
                                <img src="../../<?= $product->imageurl ?>" class="card-img-top" alt=<?= $product->description ?>>
                                <div class="card-img-overlay card-img-overlay1"> <?= $product->description ?> </div>
                                <div class="card-body">
                                    <span class="cardbody">
                                        <p class="card-text">
                                            <?= $product->title ?><br>
                                            <span>
                                                <span class="dis">Rs<?= $product->price ?></span>
                                                <span>Rs<?= $discountedPrice ?></span>
                                            </span>
                                        </p>

                                    </span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                            </div>
                <?php endif; ?>

        </section>
        <script>
            let p = document.querySelector('.p');
            let m = document.querySelector('.m');
            let countdisplay = document.querySelector('.countdisplay');
            let buyNowLink = document.getElementById('buyNowLink');
            let count = 1;
            function updateDisplay() {
                countdisplay.innerText = count;
                buyNowLink.href = `book.php?product_id=<?php echo ($product_id); ?>&quantity=${count}`;
            }
            p.addEventListener('click', () => {
                if (count < 10) {
                    count++;
                    updateDisplay();
                }
            });
            m.addEventListener('click', () => {
                if (count > 1) {
                    count--;
                    updateDisplay();
                }
            });

            updateDisplay();
        </script>
        <?php
        include('../include/footer.php');
    } else {
        $_SESSION['error'] = "Product not found";
        header('Location: home.php');
        exit;
    }
} else {
    $_SESSION['error'] = "Select an item";
    header('Location: home.php');
    exit;
}
?>