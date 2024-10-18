<?php
include ('../include/header.php');
?>
<link rel="stylesheet" href="../../css/SingUp.css">
<div class="col-6 card offset-3 mt-5 p-3 ">
    <h1>Sing Up</h1>
    <form action="../../route.php" method="post" class="needs-validation" novalidate>
        <input type="hidden" name="action" value="singup">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Name</label>
            <input type="text" required name="name" class="form-control" id="exampleInputEmail1">
            <div class="invalid-feedback"> Give a Name</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" required name="email" class="form-control" id="exampleInputEmail1">
            <div class="invalid-feedback"> Give a valid Email</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" required name="password" class="form-control" id="exampleInputEmail1">
            <div class="invalid-feedback"> Give a valid Password</div>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="validationFormCheck1" required>
            <label class="form-check-label" for="validationFormCheck1">Accept terms and conditions</label>
            <div class="invalid-feedback">Please accept the terms and conditions.</div>
        </div>
        <button type="submit" class="btn btn-outline-secondary mb-3">Submit</button>
    </form>
</div>
<?php
include ('../include/footer.php');
?>