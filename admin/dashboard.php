<?php
include("../path.php");
include(ROOT_PATH . "/app/controllers/posts.php");
adminOnly();

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
    <title>ART | DESIGN | admin</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Custom Styles -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/headerStyle.css">
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


    <title>Admin - Dashboard</title>
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
        <div class="admin-content clearfix" style="background-image: url('../assets/images/amin.jpeg');">
            <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
            <div class="">
                <div class="site-background" data-aos="fade-up" data-aos-delay="100">
                    <h3 style="color: wheat; font:italic;background-size: cover;height: 110vh;display: flex;">welcome
                        Admin</h3>
                </div>
            </div>
        </div>
        <!-- // Admin Content -->

    </div>


    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

    <!-- Custome Scripts -->
    <script src="../assets/js/scripts.js"></script>

</body>

</html>