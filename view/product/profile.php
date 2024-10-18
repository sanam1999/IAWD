<?php
require('../../model/product.php');
require('../../model/orders.php');
require('../../model/RF.php');
require('../../timecount.php');
session_start();
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
} else {
    include('../isAuthenticate.php');
    $user_id = $_SESSION['userid'];
}
$Review = fetchReview($user_id);
if ($Review['rating_count'] != 0) {
    $v = ceil($Review['total_rating'] / $Review['rating_count']);
} else {
    $v = 0;
}
include('../include/header.php');
$Products = fetchProductuser($user_id);
?>
<link rel="stylesheet" href="../../css/profile.css">

<div class=" col-6 offset-3">
    <div class="profileEdit">
        <div class="profile mt-4 col-12 ">
            <i class=" fa-solid fa-user"></i>
            <span class="h4"><?php echo count($Products); ?> Posts</span>
            <p class="starability-result" data-rating="<?php echo $v ?>"></p>
        </div>

        <hr>
        <?php if (isset($_SESSION['userid']) && ($_SESSION['userid'] == $user_id)): ?>
            <div class="userdata margintop-1">
                <div class="col-12 d-flex justify-content-between ">
                    <div>
                        <label for="inputName" class="h5">Name</label>
                        <p><?php echo $_SESSION['user']; ?></p>
                    </div>
                    <div>
                        <label for="inputEmail" class="h5">Email</label>
                        <p><?php echo $_SESSION['email']; ?></p>
                    </div>
                </div>
                <?php $Address = fetchAddress(); ?>
                                                                                                                                                            <hr>
                                                                                                                                                            <h3 class="mt-2 h3">Address</h3>
                                                                                                                                                        <?php if ($Address && !empty($Address)): ?>

                    <div class="col-12 d-flex justify-content-between">
                        <div class="form-group">
                            <label for="inputProvince" class="h5">Province</label>
                            <p><?php echo $Address->province; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="inputDistrict" class="h5">District</label>
                            <p><?php echo $Address->district; ?></p>
                        </div>
                        <div class="form-group ">
                            <label for="inputZipCode" class="h5">Zip Code</label>
                            <p><?php echo $Address->zip_code; ?></p>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-between mt-4">
                        <div class="form-group">
                            <label for="inputPhoneNumber" class="h5">Phone number</label>
                            <p><?php echo $Address->phone_number; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress" class="h5">Address</label>
                            <p><?php echo $Address->address; ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <form class="adressform p-3 card needs-validation" action="../../route.php" method="post" novalidate>
                        <input type="hidden" name="action" value="addAddress">
                        <div class="d-flex justify-content-between">
                            <div class="form-group l-w-3">
                                <label for="inputProvince">Province</label>
                                <input type="text" class="form-control" id="inputProvince" name="province" required>
                                <div class="invalid-feedback">Please provide a valid province.</div>
                            </div>
                            <div class="form-group l-w-3">
                                <label for="inputDistrict">District</label>
                                <input type="text" class="form-control" id="inputDistrict" name="district" required>
                                <div class="invalid-feedback">Please provide a valid district.</div>
                            </div>
                            <div class="form-group l-w-3">
                                <label for="inputZipCode">Zip Code</label>
                                <input type="text" class="form-control" id="inputZipCode" name="zip_code" required>
                                <div class="invalid-feedback">Please provide a valid zip code.</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-group l-w-4-5">
                                <label for="inputPhoneNumber">Phone number</label>
                                <input type="text" class="form-control" id="inputPhoneNumber" name="phone_number" required>
                                <div class="invalid-feedback">Please provide a valid phone number.</div>
                            </div>
                            <div class="form-group l-w-4-5">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" name="address" required>
                                <div class="invalid-feedback">Please provide a valid address.</div>
                            </div>
                        </div>
                        <button type="submit" class="btn submitAddersss btn-outline-warning mt-2">Submit</button>
                    </form>

                    <span>
                        <div class="btn  btn-outline-secondary addAddersssbtn">+ address</div>
                    </span>
                <?php endif; ?>
            </div>

            <hr>

        <?php endif; ?>

        <?php foreach ($Products as $Product): ?>
                                                                                                                                                        <!-- show post -->
                                                                                                                                                        <div class="col-12 card d-flex flex-row mb-2 " style="height :11rem;">
                                                                                                                                                            <img src="../../<?php echo $Product->imageurl; ?>" alt="Card Image" class="col-3 p-2 l-br-1">
                                                                                                                                                        <div class="col-7">
                    <span>
                        <h3 class="titale h4 pt-2 mb-0"><?php echo $Product->title; ?></h3>
                        <p class="mb-0 h6"><?php echo $Product->description; ?></p>
                        </span>

                    <?php if ($_SESSION['userid'] == $user_id): ?>
                        <div class="d-inline-flex mt-5 gap-3 action">
                            <form action="../../route.php?product_id=<?= $Product->product_id; ?>" method="post">
                                <input type="hidden" name="action" value="deletepost">
                                <button type="submit" class="btn btn-outline-danger ">Delete</button>
                            </form>

                            <a href="edit.php?product_id=<?= $Product->product_id; ?>"><button class="btn-outline-warning btn ">Edit</button></a>
</div>
                    <?php endif; ?>
                </div>
                <div class="status  pt-2 ml-2">
                    <p class="h6 mt-1 l-ml-4"><?php echo timeAgo($Product->created_at); ?></p>
                </div>
                </div>
                <?php endforeach; ?>
                </div>
                </div>
                <script src="../../js/profile.js"></script>
<?php include('../include/footer.php');



?>