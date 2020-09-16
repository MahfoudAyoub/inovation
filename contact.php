<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/topics.php");
if (isset($_SESSION['id'])) {
  $sq = mysqli_query($conn, "select * from `users` where id='" . $_SESSION['id'] . "'");
  $srow = mysqli_fetch_array($sq);
  $photo = $srow['photo'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ART | DESIGN</title>

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

<body data-spy="scroll" data-target=".navbar" data-offset="60">

  <!-- ----------------------------  Navigation ---------------------------------------------- -->
  <nav>
    <?php include(ROOT_PATH . "/app/includes/homeHeader.php"); ?>
  </nav>

  <!-- ------------x---------------  Navigation --------------------------x------------------- -->

  <!----------------------------- Main Site Section ------------------------------>

  <main>
  <h2 style="margin-top: 50px;margin-left:20px;">Our Managers :</h2>
    <section id="blogs">
      <div class="blog">
        <div class="container">
          <div class="owl-carousel owl-theme blog-post">
            <?php
            $query = mysqli_query($conn, "select * from `users` WHERE access = 1 order by uname asc");
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                <img style="height: 200px;" src="<?php if (empty($row['photo'])) {
                        echo BASE_URL . "/chatRoom/upload/profile.jpg";
                      } else {
                        echo BASE_URL . '/chatRoom/' . $row['photo'];
                      } ?>" alt="post-1">
                <div class="blog-title">
                <h3><i class="fas fa-user-tie info"></i> <?php echo $row['uname']; ?></a></h3>
                <h3><i class="fas fa-briefcase info"></i> <?php echo $row['job']; ?></a></h3>
                <h3><i class="fa fa-envelope info"></i> <?php echo $row['email']; ?></a></h3>
                <h3><i class="fa fa-phone info"></i> <?php echo $row['phone']; ?></a></h3>
                <h3><i class="fa fa-home info"></i> <?php echo $row['address']; ?></a></h3>
                </div>
              </div>
            <?php
            }
            ?>
          </div>

          <div class="owl-navigation">
            <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
            <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
          </div>

        </div>
      </div>
    </section>

  </main>

  <!---------------x------------- Main Site Section ---------------x-------------->


  <!-- --------------------------- Footer ---------------------------------------- -->

  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

  <!-- -------------x------------- Footer --------------------x------------------- -->

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