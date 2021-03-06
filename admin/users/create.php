<?php
include("../../path.php");
include(ROOT_PATH . "/app/controllers/users.php");
adminOnly();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- Custom Styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <link rel="stylesheet" href="../../assets/css/headerStyle.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".profile .icon_wrap").click(function() {
        $(this).parent().toggleClass("active");
        $(".notifications").removeClass("active");
      });

      $(".notifications .icon_wrap").click(function() {
        $(this).parent().toggleClass("active");
        $(".profile").removeClass("active");
      });

      $(".show_all .link").click(function() {
        $(".notifications").removeClass("active");
        $(".popup").show();
      });

      $(".close").click(function() {
        $(".popup").hide();
      });
    });
  </script>

  <title>Admin - Create Admin User</title>
</head>

<body>

  <!-- header -->
  <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
  <!-- // header -->

  <div class="admin-wrapper">
    <!-- Left Sidebar -->
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
    <!-- // Left Sidebar -->

    <!-- Admin Content -->
    <div class="admin-content">

      <div class="button-group">
        <a href="create.php" class="btn btn-sm">Add User</a>
        <a href="index.php" class="btn btn-sm">Manage Users</a>
      </div>

      <div>
        <h2 style="text-align: center;">Create User</h2>
        <form action="create.php" method="post">
          <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

          <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
          </div>
          <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
          </div>
          <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password ?>" ; class="text-input">
          </div>
          <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="passwordConf" value="<?php echo $password ?>" ; class="text-input">
          </div>
          <div class="input-group">

            <?php if (isset($admin) && $admin == 1) : ?>
              <label>
                <input type="checkbox" name="admin" checked>Admin
              </label>
            <?php else : ?>
              <label>
                <input type="checkbox" name="admin">Admin
              </label>
            <?php endif; ?>

          </div>
          <div class="input-group">
            <button type="submit" name="create-admin" class="btn">Save User</button>
          </div>
        </form>
      </div>

    </div>
    <!-- // Admin Content -->

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CKEditor 5 -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  <!-- Custome Scripts -->
  <script src="../../assets/js/scripts.js"></script>

</body>

</html>