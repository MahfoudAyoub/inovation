<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/posts.php");


if (isset($_GET['id'])) {
  $post = selectOne('posts', ['id' => $_GET['id']]);
  $username = $_GET['username'];
  $postID = $_GET['id'];
  $sqlNumComments = $conn->query("SELECT comments.id,postID, username, comment, DATE_FORMAT(comments.createdOn, '%Y-%m-%d') AS createdOn FROM comments INNER JOIN users ON comments.userID = users.id WHERE postID = $postID");
  $numComments = $sqlNumComments->num_rows;
}

$posts = selectAll('posts', ['published' => 1]);
$topics = selectAll('topics');
function createCommentRow($data)
{
  global $conn;
  //$postID = $_GET['id'];
  $response = '
          <div class="comment">
              <div class="user">' . $data['username'] . ' <span class="time">' . $data['createdOn'] . '</span></div>
              <div class="userComment">' . $data['comment'] . '</div>
              <div class="reply"><a href="javascript:void(0)" data-commentID="' . $data['id'] . '" onclick="reply(this)">Replay</a></div>
              <div class="replies">';

  $sql = $conn->query("SELECT replies.id, username, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn FROM replies INNER JOIN users ON replies.userID = users.id WHERE replies.commentID = '" . $data['id'] . "' ORDER BY replies.id DESC LIMIT 1");
  while ($dataR = $sql->fetch_assoc())
    $response .= createCommentRow($dataR);

  $response .= '
                      </div>
          </div>
      ';

  return $response;
}

if (isset($_POST['getAllComments'])) {
  $start = $conn->real_escape_string($_POST['start']);
  $postID = $_POST['postID'];
  $response = "";
  $sql = $conn->query("SELECT comments.id,postID, username, comment, DATE_FORMAT(comments.createdOn, '%Y-%m-%d') AS createdOn FROM comments INNER JOIN users ON comments.userID = users.id WHERE postID = $postID   ORDER BY comments.id DESC LIMIT $start, 20");
  while ($data = $sql->fetch_assoc())
    $response .= createCommentRow($data);

  exit($response);
}

//echo $postID;
if (isset($_POST['addComment'])) {
  global $conn;
  unset($_POST['addComment']);
  $comment = $conn->real_escape_string($_POST['comment']);
  $isReply = $conn->real_escape_string($_POST['isReply']);
  $commentID = $conn->real_escape_string($_POST['commentID']);
  $_POST['userID'] = $_SESSION['id'];
  $postID = $_POST['postID'];

  if ($isReply != 'false') {
    $conn->query("INSERT INTO replies (comment, commentID, userID, postID, createdOn) VALUES ('$comment', '$commentID', '" . $_SESSION['id'] . "', $postID, NOW())");
    $sql = $conn->query("SELECT replies.id,postID, username, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn FROM replies INNER JOIN users ON replies.userID = users.id WHERE postID = $postID ORDER BY replies.id DESC LIMIT 1");
  } else {

    $commenID = create('comments', $_POST);
    $sql = $conn->query("SELECT comments.id,postID, username, comment, DATE_FORMAT(comments.createdOn, '%Y-%m-%d') AS createdOn FROM comments INNER JOIN users ON comments.userID = users.id WHERE postID = $postID  ORDER BY comments.id DESC LIMIT 1");
  }
  //$_POST['postID'] = $postID;
  $data = $sql->fetch_assoc();
  exit(createCommentRow($data));
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

<body>

  <!-- ----------------------------  Navigation ---------------------------------------------- -->
  <nav>
    <?php include(ROOT_PATH . "/app/includes/homeHeader.php"); ?>
  </nav>

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
                <span><i class="fas fa-user text-gray"></i><?php echo $username; ?></span>
                <span><i class="fas fa-calendar-alt text-gray"></i><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                <span>2 Commets</span>
              </div>
            </div>
            <div class="post-title">
              <a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
              <p><?php echo  html_entity_decode(nl2br($post['body'])); ?>
              </p>
            </div>
          </div>
          <hr>
          <h2>comments</h2>

          <?php include(ROOT_PATH . "/comments.php"); ?>

        </div>

        <aside class="sidebar">
          <!-- Search -->
          <div class="category">
            <ul class="search-div">
              <h2>Search</h2>
              <form action="index.php" method="post">
                <input type="text" name="search-term" class="text-input" placeholder="Search...">
              </form>
            </ul>
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

  <script type="text/javascript">
    var isReply = false,
      commentID = 0,
      max = <?php echo $numComments ?>;

    $(document).ready(function() {

      $("#addComment, #addReply").on('click', function() {
        var comment;
        var postID = '<?php echo $_GET['id']; ?>';
        if (!isReply)
          comment = $("#mainComment").val();
        else
          comment = $("#replyComment").val();
        //console.log(postID);
        if (comment.length > 5) {
          $.ajax({
            url: 'single.php',
            method: 'POST',
            dataType: 'html',
            data: {
              addComment: 1,
              comment: comment,
              isReply: isReply,
              commentID: commentID,
              postID: postID
            },
            success: function(response) {
              max++;
              $("#numComments").text(max + " Comments");
              if (!isReply) {
                $(".userComments").prepend(response);
                $("#mainComment").val("");
              } else {
                commentID = 0;
                $("#replyComment").val("");
                $(".replyRow").hide();
                $('.replyRow').parent().next().append(response);
              }
            }
          });

        } else
          alert('Please Check Your Inputs');

      });
      var postID = '<?php echo $_GET['id']; ?>';
      getAllComments(postID, 0, max);
    });

    function reply(caller) {
      commentID = $(caller).attr('data-commentID');
      $(".replyRow").insertAfter($(caller));
      $('.replyRow').show();
    }

    function getAllComments(postID, start, max) {
      if (start > max) {
        return;
      }

      $.ajax({
        url: 'single.php',
        method: 'POST',
        dataType: 'text',
        data: {
          getAllComments: 1,
          postID: postID,
          start: start
        },
        success: function(response) {
          $(".userComments").append(response);
          getAllComments(postID, (start + 20), max);
        }
      });
    }
  </script>
</body>

</html>