<?php

require('../../model/product.php');
require('../../model/RF.php');
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $Product = fetchSingleProduct($product_id);

} else {
    session_start();
    $_SESSION['error'] = 'Post not selected';
    header('Location: profile.php');
    exit;

}
include('../include/header.php');
?>
<link rel="stylesheet" href="../../css/edit.css">
<div class="card col-6 offset-3 p-4 mt-2 mb-4">


    <p class="h3">Edit Your Post</p>

    <form action="../../route.php?product_id=<?= htmlspecialchars($Product->product_id); ?>" method="post"
        class="needs-validation" novalidate>
        <input type="hidden" name="action" value="editpost">

        <div class="mb-2">
            <label for="inputCategory" class="form-label mb-0 ">Category</label>
            <select class="form-select" name="category" id="inputCategory" required>
                <option value="" disabled>Select a category</option>
                <option value="Electronics" <?= $Product->category === 'Electronics' ? 'selected' : ''; ?>>
                    Electronics</option>
                <option value="Fashion" <?= $Product->category === 'Fashion' ? 'selected' : ''; ?>>Fashion
                </option>
                <option value="Home & Garden" <?= $Product->category === 'Home & Garden' ? 'selected' : ''; ?>>
                    Home & Garden
                </option>
                <option value="Mobile Phones" <?= $Product->category === 'Mobile Phones' ? 'selected' : ''; ?>>
                    Mobile Phones
                </option>
                <option value="Laptops" <?= $Product->category === 'Laptops' ? 'selected' : ''; ?>>Laptops
                </option>
                <option value="Cameras" <?= $Product->category === 'Cameras' ? 'selected' : ''; ?>>Cameras
                </option>
                <option value="Men's Clothing" <?= $Product->category === "Men's Clothing" ? 'selected' : ''; ?>>Men's
                    Clothing
                </option>
                <option value="Women's Clothing" <?= $Product->category === "Women's Clothing" ? 'selected' : ''; ?>>
                    Women's
                    Clothing</option>
                <option value="Shoes" <?= $Product->category === 'Shoes' ? 'selected' : ''; ?>>Shoes</option>
                <option value="Furniture" <?= $Product->category === 'Furniture' ? 'selected' : ''; ?>>
                    Furniture</option>
            </select>
            <div class="invalid-feedback">Please select a category.</div>
        </div>

        <div class="mb-2">
            <label for="inputTitle" class="form-label mb-0 ">Title</label>
            <input type="text" required name="title" class="form-control" id="inputTitle"
                value="<?= htmlspecialchars($Product->title); ?>">
            <div class="invalid-feedback">Please provide a title.</div>
        </div>

        <div class="mb-2">
            <label for="inputDescription" class="form-label mb-0">Description</label>
            <textarea class="form-control" name="description" required id="inputDescription"
                rows="3"><?= htmlspecialchars($Product->description); ?></textarea>
        </div>

        <div class="mb-2">
            <label for="inputPrice" class="form-label mb-0">Price</label>
            <input type="text" required name="price" class="form-control" id="inputPrice"
                value="<?= htmlspecialchars($Product->price); ?>">
            <div class="invalid-feedback">Please provide a price.</div>
        </div>

        <div class="mb-2">
            <label for="inputImage" class="form-label mb-0">Image URL</label>
            <input type="text" name="imageurl" class="form-control" required id="inputImage"
                value="<?= htmlspecialchars($Product->imageurl); ?>">
        </div>

        <div class="mb-2">
            <label for="inputCondition" class="form-label mb-0">Condition</label>
            <select class="form-select" name="condition" id="inputCondition" required>
                <option value="" disabled>Select a condition</option>
                <option value="New" <?= $Product->condition === 'New' ? 'selected' : ''; ?>>New</option>
                <option value="Used" <?= $Product->condition === 'Used' ? 'selected' : ''; ?>>Used</option>
                <option value="Refurbished" <?= $Product->condition === 'Refurbished' ? 'selected' : ''; ?>>
                    Refurbished
                </option>
            </select>
            <div class="invalid-feedback">Please select a condition.</div>
        </div>

        <div class="mb-2">
            <label for="inputStack" class="form-label mb-0">Stack</label>
            <input type="number" required name="stack" class="form-control" id="inputStack"
                value="<?= $Product->stock; ?>">
            <div class="invalid-feedback">Please provide a stock value.</div>
        </div>
        <div class="mb-2">
            <label for="inputStack" class="form-label mb-0">Discount</label>
            <input type="number" required name="discount" class="form-control" id="inputStack"
                value="<?= $Product->discount; ?>">
            <div class="invalid-feedback">Please provide a stock value.</div>
        </div>
        <button type="submit" class="btn btn-outline-danger">Save changes</button>
    </form>


</div>
<?php

include('../include/footer.php');
?>