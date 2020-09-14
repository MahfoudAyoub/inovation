<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/users.php");

$id = "";
$username = "";
$email    = "";
$photo    = "";
$address    = "please add your address";
$phone    = "please add your address";
$admin    = "";
$password = "";
$passwordConf = "";
$table = 'users';
$errors = array();
if (isset($_SESSION['id'])) {
  $sq = mysqli_query($conn, "select * from `users` where id='" . $_SESSION['id'] . "'");
  $srow = mysqli_fetch_array($sq);
  $photo = $srow['photo'];
  $name = $srow['uname'];
}
$user = selectOne($table, ['id' => $_SESSION['id']]);
if (!empty($user)) {
  $id = $user['id'];
  $username = $user['uname'];
  $photo = $user['photo'];
  $admin = $user['admin'];
  $email = $user['email'];
  $address = $user['address'];
  $phone = $user['phone'];
}


//$sqlNumComments = $conn->query("SELECT id , username, email, address, phone FROM users WHERE id = " . $_SESSION['userID'] . "");


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blooger</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/css/all.css">


  <!-- --------- Owl-Carousel ------------------->
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

  <!-- ------------ AOS Library ------------------------- -->
  <link rel="stylesheet" href="assets/css/aos.css">

  <!-- Custom Style   -->
  <link rel="stylesheet" href="assets/css/Style1.scss">
  <link rel="stylesheet" href="assets/css/headerStyle.css">
  <link rel="stylesheet" href="assets/css/profileStyle.scss">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

</head>

<body>

  <!-- ----------------------------  Navigation ---------------------------------------------- -->
  <nav>
    <?php include(ROOT_PATH . "/app/includes/homeHeader.php"); ?>
  </nav>

  <!-- ------------x---------------  Navigation --------------------------x------------------- -->

  <!----------------------------- Main Site Section ------------------------------>
  <div class="profile-card">
    <div class="image-container">
      <img src="<?php if (empty($photo)) {
                  echo BASE_URL . "/chatRoom/upload/profile.jpg";
                } else {
                  echo BASE_URL . '/chatRoom/' . $photo;
                } ?>" style="width : 100%">
      <div style="margin: 10px;" class="title">
      </div>
    </div>
    <div class="main-container">
    <p style="margin-top: 10px;"><i class="fas fa-user-tie info"></i> <?php echo $username; ?></p>
      <p style="margin-top: 10px;"><i class="fa fa-envelope info"></i> <?php echo $email; ?></p>
      <p style="margin-top: 10px;"><i class="fa fa-phone info"></i> <?php echo $phone; ?></p>
      <p style="margin-top: 10px;"><i class="fa fa-home info"></i> <?php echo $address; ?></p>
      <hr style="margin-top: 10px;">
    </div>
  </div>



  <!-- Jquery Library file -->
  <script src="assets/js/Jquery3.4.1.min.js"></script>
  <script src="assets/js/scripts.js"></script>

  <!-- --------- Owl-Carousel js ------------------->
  <script src="assets/js/owl.carousel.min.js"></script>

  <!-- ------------ AOS js Library  ------------------------- -->
  <script src="assets/js/aos.js"></script>

  <!-- Custom Javascript file -->
  <script src="assets/js/main.js"></script>
</body>

</html>