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

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- Custom Styles -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title>ART-MODE</title>
</head>

<body>

  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>



  <!-- Page wrapper -->
  <div class="page-wrapper">

    <!-- Posts Slider -->
    <div class="posts-slider">
      <h1 class="slider-title">Trending Posts</h1>
      <i class="fa fa-chevron-right next"></i>
      <i class="fa fa-chevron-left prev"></i>

      <div class="posts-wrapper">

        <?php foreach ($posts as $post) : ?>
          <div class="post">
            <div class="inner-post">
              <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" style="height: 200px; width: 100%; border-top-left-radius: 5px; border-top-right-radius: 5px;">
              <div class="post-info">
                <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>
                  <div>
                    <i class="fa fa-user-o"></i> <?php echo $post['username']; ?>
                    &nbsp;
                    <i class="fa fa-calendar"></i> <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                  </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
    <!-- // Posts Slider -->

    <!-- content -->
    <div class="content clearfix">
      <div class="page-content">
        <h1 class="recent-posts-title"><?php echo $postTitle; ?></h1>

        <?php foreach ($posts as $post) : ?>
          <div class="post clearfix">
            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="post-image" alt="">
            <div class="post-content">

              <h2 class="post-title"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>

              <div class="post-info">
                <i class="fa fa-user-o"></i> <?php echo $post['username']; ?>
                &nbsp;
                <i class="fa fa-calendar"></i> <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
              </div>
              <p class="post-body"><?php echo  html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
              </p>
              <a href="single.php?id=<?php echo $post['id']; ?>" class="read-more">Read More</a>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
      <div class="sidebar">
        <!-- Search -->
        <div class="search-div">
          <form action="index.php" method="post">
            <input type="text" name="search-term" class="text-input" placeholder="Search...">
          </form>
        </div>
        <!-- // Search -->

        <!-- topics -->
        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>
            <?php foreach ($topics as $key => $topic) : ?>
              <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
            <?php endforeach; ?>

          </ul>
        </div>
        <!-- // topics -->

      </div>
    </div>
    <!-- // content -->

  </div>
  <!-- // page wrapper -->

  <!-- FOOTER -->
  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
  <!-- // FOOTER -->


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick JS -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <script src="assets/js/scripts.js"></script>

</body>

</html>