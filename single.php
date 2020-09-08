<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/posts.php");

if (isset($_GET['id'])) {
  $post = selectOne('posts', ['id' => $_GET['id']]);
}
$posts = selectAll('posts', ['published' => 1]);
$topics = selectAll('topics');
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
    <!-- ---------------------- Site Content -------------------------->
    <section class="container">
      <div class="site-content">

        <div class="posts">
          <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
            <div class="post-image">
              <div>
                <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img" style="height: 400px; width: 100%; border-top-left-radius: 5px; border-top-right-radius: 5px;" alt="">
              </div>
              <div class="post-info flex-row">
                <span><i class="fas fa-calendar-alt text-gray"></i><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                <span>2 Commets</span>
              </div>
            </div>
            <div class="post-title">
              <a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
              <p><?php echo  html_entity_decode($post['body']); ?>
              </p>
            </div>
          </div>
          <hr>
          <h3>comments</h3>
        </div>


        <aside class="sidebar">
          
        
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