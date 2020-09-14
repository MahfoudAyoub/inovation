<?php
include('../conn.php');
if (isset($_POST['fetch'])) {
    $id = $_POST['id'];

    $query = mysqli_query($conn, "select * from `chat` left join `users` on users.id=chat.userid where chatroomid='$id' order by chat_date asc") or die(mysqli_error());
    while ($row = mysqli_fetch_array($query)) {
?>
        <div>
            <img src="../<?php if (empty($row['photo'])) {
                                echo "upload/profile.jpg";
                            } else {
                                echo $row['photo'];
                            } ?>" style="height:30px; width:30px; position:relative; top:15px; left:10px;">
            <span style="font-size:12px; font:bold; position:relative; top:7px; left:15px;"><i><?php echo date('M-d-Y h:i A', strtotime($row['chat_date'])); ?></i></span><br>
            <span style="font-size:12px; font:message-box; color:darkmagenta; position:relative; top:-2px; left:50px;"><strong><?php echo $row['uname']; ?></strong> <strong style="font:xx-large; color:black">: <?php echo $row['message']; ?></strong></span>
        </div>
<?php
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/chatStyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<div id="container">
    <main>
        <ul id="chat">
            <?php if ($_SESSION['id'] == $row['userid']) : ?>
                <li class="me">
                    <div class="entete">
                        <h3><?php echo date('M-d-Y h:i A', strtotime($row['chat_date'])); ?></h3>
                        <h2><?php echo $row['uname']; ?></h2>
                        <span class="status blue"></span>
                    </div>
                    <div class="triangle"></div>
                    <div class="message">
                        <?php echo $row['message']; ?>
                    </div>
                </li>
            <?php else : ?>
                <li class="you">
                <div class="entete">
                        <h3><?php echo date('M-d-Y h:i A', strtotime($row['chat_date'])); ?></h3>
                        <h2><?php echo $row['uname']; ?></h2>
                        <span class="status blue"></span>
                    </div>
                    <div class="triangle"></div>
                    <div class="message">
                        <?php echo $row['message']; ?>
                    </div>
                </li>
            <?php endif; ?>
            <li class="me">
                <div class="entete">
                    <h3>10:12AM, Today</h3>
                    <h2>Vincent</h2>
                    <span class="status blue"></span>
                </div>
                <div class="triangle"></div>
                <div class="message">
                    OK
                </div>
            </li>
            <li class="you">
                <div class="entete">
                    <span class="status green"></span>
                    <h2>Vincent</h2>
                    <h3>10:12AM, Today</h3>
                </div>
                <div class="triangle"></div>
                <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                </div>
            </li>
            <li class="me">
                <div class="entete">
                    <h3>10:12AM, Today</h3>
                    <h2>Vincent</h2>
                    <span class="status blue"></span>
                </div>
                <div class="triangle"></div>
                <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                </div>
            </li>
            <li class="me">
                <div class="entete">
                    <h3>10:12AM, Today</h3>
                    <h2>Vincent</h2>
                    <span class="status blue"></span>
                </div>
                <div class="triangle"></div>
                <div class="message">
                    OK
                </div>
            </li>
        </ul>
        <footer>
            <textarea placeholder="Type your message"></textarea>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_picture.png" alt="">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_file.png" alt="">
            <a href="#">Send</a>
        </footer>
    </main>
</div>

</body>

</html>