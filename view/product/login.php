<?php include('../include/header.php'); ?>
<link rel="stylesheet" href="../../css/login.css">
<div class="col-6 card offset-3 mt-5 p-3">
    <h1>Login</h1>
    <form action="../../route.php" method="post" class="needs-validation" novalidate>

        <input type="hidden" name="action" value="login">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" required name="email" class="form-control" id="exampleInputEmail1">
            <div class="invalid-feedback"> Give a valid Email</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" required name="password" class="form-control" id="exampleInputPassword1">
             <div class="invalid-feedback"> Give a valid Password</div>
             
        </div>
        <button type="submit" class="btn btn-outline-secondary mb-5 mt-4">Login</button>
          <a href="../product/SingUp.php" class="btn a btn-outline-dark mb-5 mt-4">SignIn</a>
        
    </form>
    
</div>
<?php include('../include/footer.php'); ?>