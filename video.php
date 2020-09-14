<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/topics.php");
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

        <!------------------------ Site Title ---------------------->


        <section id="posts" class="container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLOGi5" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </section>

        <!-- -----------x---------- Site Content -------------x------------>

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