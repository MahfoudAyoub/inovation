<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/topics.php");


$posts = array();
$postTitle = 'Recent Posts';
if (isset($_SESSION['id'])) {
    $sq = mysqli_query($conn, "select * from `users` where id='" . $_SESSION['id'] . "'");
    $srow = mysqli_fetch_array($sq);
    $photo = $srow['photo'];
}

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

        <!------------------------ Site Title ---------------------->

        <section id="home" class="site-title" style="background-image: url('assets/images/back2.jpg');">
            <div class="site-background" data-aos="fade-up" data-aos-delay="100">
                <h3>ART & DESIGN</h3>
                <h1>Amazing Place on Degital Word</h1>
            </div>
        </section>

        <!------------x----------- Site Title ----------x----------->

        <!-- --------------------- Blog Carousel ----------------- -->

        <section id="blogs">

            <div class="blog">
                <div class="container">

                    <div class="owl-carousel owl-theme blog-post">
                        <?php foreach ($posts as $post) : ?>
                            <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                                <img style="height: 200px;" src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="post-1">
                                <div class="blog-title">
                                    <h3><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo html_entity_decode(substr($post['title'], 0, 30) . '...'); ?></a></h3>
                                    <button class="btn btn-blog"><a href="single.php?id=<?php echo $post['id']; ?>&username=<?php echo $post['username']; ?>">More</a></button>
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

        <section id="posts" class="container">
            <div class="site-content">
                <div class="posts">
                    <h2><?php echo $postTitle; ?></h2>
                    <?php foreach ($posts as $post) : ?>
                        <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                            <div class="post-image">
                                <div>
                                    <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img" style="height: 400px; width: 800px; border-top-left-radius: 5px; border-top-right-radius: 5px;" alt="">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-user text-gray"></i><?php echo $post['username']; ?></span>
                                    <span><i class="fas fa-calendar-alt text-gray"></i><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                                    <span>2 Commets</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="single.php?id=<?php echo $post['id']; ?>&username=<?php echo $post['username']; ?>"><?php echo $post['title']; ?></a>
                                <p><?php echo  html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
                                </p>
                                <button style="margin: 20px;" class="btn post-btn"><a href="single.php?id=<?php echo $post['id']; ?>&username=<?php echo $post['username']; ?>">Read More </a> <i class="fas fa-arrow-right"></i></button>
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
                    <div class="category">
                        <ul class="search-div">
                            <h2 style="margin-top: 10px;">Search</h2>
                            <form style="margin-top: 10px;" action="index.php" method="post">
                                <input type="text" name="search-term" class="fas fa-chevron-right" class="text-input" placeholder="Search...">
                            </form>
                        </ul>
                    </div>
                    <!-- // Search -->

                    <div class="category">
                        <h2 style="margin-top: 20px;">Category</h2>
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
                                        <img style="height: 150px;" src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img" alt="blog1">
                                    </div>
                                    <div class="post-info flex-row">
                                        <span><i class="fas fa-calendar-alt text-gray"></i><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                                        <span>2 Commets</span>
                                    </div>
                                </div>
                                <div class="post-title">
                                    <a href="single.php?id=<?php echo $post['id']; ?>&username=<?php echo $post['username']; ?>"><?php echo html_entity_decode(substr($post['title'], 0, 50) . '...'); ?></a>
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