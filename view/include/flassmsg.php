
<?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) { ?>

  <div class="alert z-3 alert-danger mt-2 col-6 alert-dismissible fade show offset-3 " style="position: absolute;">
    <?php echo $_SESSION['error'];
    unset($_SESSION['error']); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php } ?>

<?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])) { ?>

  <div class="alert z-3 alert-success col-6 mt-2 alert-dismissible fade show offset-3" style="position: absolute;" >
    <?php echo ($_SESSION['success']);
    unset($_SESSION['success']); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>