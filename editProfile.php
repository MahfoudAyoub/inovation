<?php
include("path.php");
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
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="assets/css/admin.css">
  <link rel="stylesheet" href="assets/css/headerStyle.css">
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

  <title>Profile</title>
</head>

<body>

  <!-- header -->
  <?php include(ROOT_PATH . "/app/includes/homeHeader.php"); ?>
  <!-- // header -->

  <div class="profile-card">
    <div class="image-container">
        <img src="<?php echo BASE_URL . '/assets/images/profile-pic.png'?>" style="width : 100%"> 
        <div class="title">
            <h2>Username</h2>
        </div>
    </div>
  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CKEditor 5 -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  <!-- Custome Scripts -->
  <script src="assets/js/scripts.js"></script>

</body>

</html>