<?php
include("../../path.php");
include(ROOT_PATH . "/app/controllers/posts.php");
include(ROOT_PATH . "/app/helpers/midleware.php");
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
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="../../assets/css/admin.css">

  <title>Admin - Edit Post</title>
</head>

<body>

  <!-- header -->
  <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
  <!-- // header -->

  <div class="admin-wrapper clearfix">
    <!-- Left Sidebar -->
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
    <!-- // Left Sidebar -->

    <!-- Admin Content -->
    <div class="admin-content clearfix">
      <div class="button-group">
        <a href="create.php" class="btn btn-sm">Add Post</a>
        <a href="index.php" class="btn btn-sm">Manage Posts</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Edit Post</h2>
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

        <form action="edit.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $id; ?>">

          <div class="input-group">
            <label>Title</label>
            <input type="text" name="title" value="<?php echo $title; ?>" class="text-input">
          </div>

          <div>
            <label>Body</label>
            <textarea name="body" id="body"><?php echo $body; ?></textarea>
          </div>

          <div>
            <label>Image</label>
            <input type="file" name="image" class="text-input">
          </div>

          <div>
            <label>Topic</label>
            <select class="text-input" name="topic_id">
              <!-- // looping for topics -->
              <option value="">Please select a topic</option>
              <?php foreach ($topics as $key => $topic) : ?>

                <?php if (!empty($topic_id) && $topic_id == $topic['id']) : ?>
                  <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                <?php else : ?>
                  <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                <?php endif; ?>

              <?php endforeach; ?>
            </select>
          </div>

          <div>
            <?php if (empty($published) && $published == 0) : ?>
              <div class="input-group">
                <label>
                  <input type="checkbox" name="published" /> Publish</label>
              </div>
            <?php else : ?>
              <div class="input-group">
                <label>
                  <input type="checkbox" name="published" checked /> Publish</label>
              </div>
            <?php endif; ?>
          </div>
          <div class="input-group">
            <button type="submit" name="update-post" class="btn">Update Post</button>
          </div>
        </form>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CKEditor 5 -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  <!-- Custome Scripts -->
  <script src="../../assets/js/scripts.js"></script>

</body>

</html>