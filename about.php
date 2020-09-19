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
    <link rel="stylesheet" href="assets/css/profileStyle.scss">
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

<body>

    <!-- ----------------------------  Navigation ---------------------------------------------- -->
    <nav>
        <?php include(ROOT_PATH . "/app/includes/homeHeader.php"); ?>
    </nav>

    <!-- ------------x---------------  Navigation --------------------------x------------------- -->

    <!----------------------------- Main Site Section ------------------------------>

    <main>
        <section id="home" class="site-title" style="background-image: url('assets/images/back7.jpg');">
            <div class="site-background" data-aos="fade-up" data-aos-delay="100">
                <h3>ART & DESIGN</h3>
                <h2>technological innovation platform dedicated to art-fashion with </h2>
                <h2> advice,support in innovation, design, process, etc.</h2>
                <h2> especially through digital.</h2>
            </div>
        </section>

        <section
            style="background-image: url('assets/images/Abract01.png');background-repeat: no-repeat;background-position: right;height: 100vh;width: 100%;background-size: 65%;">
            <h2 style="margin: 20px;">Developed By : </h2>
            <div class="profile-card">
                <div class="image-container">
                    <img src="<?php if (empty($photo)) {
                      echo BASE_URL . "/chatRoom/upload/profile.jpg";
                    } else {
                      echo BASE_URL . '/assets/images/ayoub.jpg';
                    } ?>" style="width : 90% ;height:370px; margin-top:20px; margin-left:20px">
                    <div style="margin: 10px;" class="title">
                        <hr style="margin-top: 10px;">
                    </div>
                </div>
                <div class="main-container">
                    <p><i class="fas fa-user-tie info"></i> MAHFOUD Ayoub</p>
                    <p style="margin-top: 10px;"><i class="fa fa-envelope info"></i> mahfoud.ayb@gmail.com</p>
                    <p style="margin-top: 10px;"><i class="fa fa-phone info"></i> 0638271849</p>
                    <p style="margin-top: 10px;"><i class="fa fa-school info"></i> Software engineering at ENSIAS</p>
                    <hr style="margin-top: 10px;">
                </div>
            </div>
            <div class="profile-card">
                <div class="image-container">
                    <img src="<?php if (empty($photo)) {
                      echo BASE_URL . "/chatRoom/upload/profile.jpg";
                    } else {
                      echo BASE_URL . '/assets/images/anas.jpg';
                    } ?>" style="width : 90% ;height:370px;margin-top:20px; margin-left:20px">
                    <div style="margin: 10px;" class="title">
                        <hr style="margin-top: 10px;">
                    </div>
                </div>
                <div class="main-container">
                    <p><i class="fas fa-user-tie info"></i> AL-KOURAICHI Anas</p>
                    <p style="margin-top: 10px;"><i class="fa fa-envelope info"></i> anasalkouraichi@gmail.com</p>
                    <p style="margin-top: 10px;"><i class="fa fa-phone info"></i> 0766415839</p>
                    <p style="margin-top: 10px;"><i class="fa fa-school info"></i> Software engineering at ENSIAS</p>
                    <hr style="margin-top: 10px;">
                </div>
            </div>

        </section>

        <!-- --------------------- about content ----------------- -->


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