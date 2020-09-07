<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/topics.php");


$posts = array();
$postTitle = 'Recent Posts';

//fetching posts by topic
if (isset($_GET['t_id'])) {
    $posts = getPostByTopicId($_GET['t_id']);
    $postTitle = "You Searched For Posts under '" . $_GET['name'] . "' :";
}
//searching
else if (isset($_POST['search-term'])) {
    $postTitle = "You Searched For '" . $_POST['search-term'] . "' :";
    $posts = searchPosts($_POST['search-term']);
}
//get all published posts from database 
else {
    $posts = getPublishedPost();
}
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
    <link rel="stylesheet" href="assets/css/Style1.css">
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

</head>

<body>

    <!-- ----------------------------  Navigation ---------------------------------------------- -->

    <?php include(ROOT_PATH . "/app/includes/homeHeader.php"); ?>

    <!-- ------------x---------------  Navigation --------------------------x------------------- -->

    <!----------------------------- Main Site Section ------------------------------>

    <main>

        <!------------------------ Site Title ---------------------->

        <section class="site-title" style="background-image: url('assets/images/back2.jpg');">
            <div class="site-background" data-aos="fade-up" data-aos-delay="100">
                <h3>ART & DESIGN</h3>
                <h1>Amazing Place on Degital Word</h1>
            </div>
        </section>

        <!------------x----------- Site Title ----------x----------->

        <!-- --------------------- Blog Carousel ----------------- -->

        <section style="background-image: url('assets/images/Abract01.png');background-size: cover;background-position: center;">

            <div class="blog">
                <div class="container">

                    <div class="owl-carousel owl-theme blog-post">
                        <?php foreach ($posts as $post) : ?>
                            <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                                <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="">
                                <div class="blog-title">
                                    <h3><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo html_entity_decode(substr($post['title'], 0, 30) . '...'); ?></a></h3>
                                    <button class="btn btn-blog"><a href="single.php?id=<?php echo $post['id']; ?>">More</a></button>
                                    <span><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="owl-navigation">
                        <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                        <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ----------x---------- Blog Carousel --------x-------- -->

        <!-- ---------------------- Site Content -------------------------->

        <section class="container" style="background-image: url('assets/images/.jpg'); ">
            <h2><?php echo $postTitle; ?></h2>
            <div class="site-content">
                <div class="posts">
                    <?php foreach ($posts as $post) : ?>
                        <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                            <div class="post-image">
                                <div>
                                    <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img" style="height: 400px; width: 100%; border-top-left-radius: 5px; border-top-right-radius: 5px;" alt="">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-user text-gray"></i><?php echo $post['username']; ?></span>
                                    <span><i class="fas fa-calendar-alt text-gray"></i><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                                    <span>2 Commets</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
                                <p><?php echo  html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
                                </p>
                                <button class="btn post-btn"><a href="single.php?id=<?php echo $post['id']; ?>">Read More </a> <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; ?>


                    <div class="pagination flex-row">
                        <a href="#"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="pages">1</a>
                        <a href="#" class="pages">2</a>
                        <a href="#" class="pages">3</a>
                        <a href="#"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>


                <aside class="sidebar">
                    <!-- Search -->
                    <div class="search-div">
                        <h2>Search</h2>
                        <form action="index.php" method="post" >
                            <input type="text" name="search-term" class="fas fa-chevron-right" class="text-input" placeholder="Search...">
                        </form>
                    </div>
                    <!-- // Search -->

                    <div class="category">
                        <h2>Category</h2>
                        <ul class="category-list">
                            <?php foreach ($topics as $key => $topic) : ?>
                                <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                                    <a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="popular-post">
                        <h2>Popular Post</h2>

                        <?php foreach ($posts as $post) : ?>
                            <div class="post-content" data-aos="flip-up" data-aos-delay="200">
                                <div class="post-image">
                                    <div>
                                        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img" alt="blog1">
                                    </div>
                                    <div class="post-info flex-row">
                                        <span><i class="fas fa-calendar-alt text-gray"></i><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                                        <span>2 Commets</span>
                                    </div>
                                </div>
                                <div class="post-title">
                                    <a href="single.php?id=<?php echo $post['id']; ?>"><?php echo html_entity_decode(substr($post['title'], 0, 50) . '...'); ?></a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="popular-tags">
                        <h2>Popular Tags</h2>
                        <div class="tags flex-row">

                            <?php foreach ($topics as $key => $topic) : ?>
                                <span class="tag" data-aos="flip-up" data-aos-delay="100"><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></span>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </aside>
            </div>
        </section>

        <!-- -----------x---------- Site Content -------------x------------>

    </main>

    <!---------------x------------- Main Site Section ---------------x-------------->


    <!-- --------------------------- Footer ---------------------------------------- -->

    <footer class="footer">
        <div class="container">
            <div class="about-us" data-aos="fade-right" data-aos-delay="200">
                <h2>About us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quia atque nemo ad modi officiis
                    iure, autem nulla tenetur repellendus.</p>
            </div>
            <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
                <h2>Newsletter</h2>
                <p>Stay update with our latest</p>
                <div class="form-element">
                    <input type="text" placeholder="Email"><span><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>
            <div class="instagram" data-aos="fade-left" data-aos-delay="200">
                <h2>Instagram</h2>
                <div class="flex-row">
                    <img src="assets/images/instagram/thumb-card3.png" alt="insta1">
                    <img src="assets/images/instagram/thumb-card4.png" alt="insta2">
                    <img src="assets/images/instagram/thumb-card5.png" alt="insta3">
                </div>
                <div class="flex-row">
                    <img src="assets/images/instagram/thumb-card6.png" alt="insta4">
                    <img src="assets/images/instagram/thumb-card7.png" alt="insta5">
                    <img src="assets/images/instagram/thumb-card8.png" alt="insta6">
                </div>
            </div>
            <div class="follow" data-aos="fade-left" data-aos-delay="200">
                <h2>Follow us</h2>
                <p>Let us be Social</p>
                <div>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="rights flex-row">
            <h4 class="text-gray">
                Copyright ©2019 All rights reserved | made by
                <a href="www.youtube.com/c/dailytuition" target="_black">Daily Tuition <i class="fab fa-youtube"></i>
                    Channel</a>
            </h4>
        </div>
        <div class="move-up">
            <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
        </div>
    </footer>

    <!-- -------------x------------- Footer --------------------x------------------- -->

    <!-- Jquery Library file -->
    <script src="assets/js/Jquery3.4.1.min.js"></script>

    <!-- --------- Owl-Carousel js ------------------->
    <script src="assets/js/owl.carousel.min.js"></script>

    <!-- ------------ AOS js Library  ------------------------- -->
    <script src="assets/js/aos.js"></script>

    <!-- Custom Javascript file -->
    <script src="assets/js/main.js"></script>
</body>

</html>