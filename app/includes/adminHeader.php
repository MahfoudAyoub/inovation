<div class="navbar">
    <div class="navbar_left">
        <div class="logo">
            <a href="<?php echo BASE_URL . '/index.php' ?>">ART-MODE</a>
        </div>
    </div>

    <div class="navbar_right">
        <div class="notifications">
            <a href="<?php echo BASE_URL . '/chatRoom/admin/index.php' ?>">
                <div class="icon_wrap"><i class="fas fa-comments"></i></div>
            </a>
        </div>


        <div class="profile">
            <div class="icon_wrap">
                <img style="max-width: 100%;border-radius: 50%;height:40px; width:40px;" src="<?php if (empty($photo)) {
                                echo BASE_URL . '/assets/images/profile_pic.png';
                            } else {
                                echo BASE_URL . '/chatRoom/' . $photo;
                            } ?>" height="30px;" width="30px;" alt="profile_pic">
                <span class="name"><?php echo $_SESSION['username']; ?></span>
                <i class="fas fa-chevron-down"></i>
            </div>

            <div class="profile_dd">
                <ul class="profile_ul">
                    <li><a class="settings" href="<?php echo BASE_URL . '/admin/dashboard.php' ?>"><span class="picon"><i class="fas fa-cog"></i></span>Setting</a></li>
                    <li class="profile_li"><a class="profile" href="<?php echo BASE_URL . '/profile.php' ?>"><span class="picon"><i class="fas fa-user-alt"></i>
                            </span>Profile</a>
                    </li>
                    <li><a class="logout" href="<?php echo BASE_URL . '/logout.php' ?>"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>