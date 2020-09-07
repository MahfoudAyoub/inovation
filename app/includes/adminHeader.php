<div class="navbar">
    <div class="navbar_left">
        <div class="logo">
            <a href="<?php echo BASE_URL . '/index.php' ?>">ART-MODE</a>
        </div>
    </div>

    <div class="navbar_right">
        <div class="notifications">
            <div class="icon_wrap"><i class="far fa-bell"></i></div>
        </div>


        <div class="profile">
            <div class="icon_wrap">
                <img src="<?php echo BASE_URL . '/assets/images/profile_pic.png' ?>" alt="profile_pic">
                <span class="name"><?php echo $_SESSION['username']; ?></span>
                <i class="fas fa-chevron-down"></i>
            </div>

            <div class="profile_dd">
                <ul class="profile_ul">
                    <li><a class="settings" href="<?php echo BASE_URL . '/admin/dashboard.php' ?>"><span class="picon"><i class="fas fa-cog"></i></span>Setting</a></li>
                    <li class="profile_li"><a class="profile" href="#"><span class="picon"><i class="fas fa-user-alt"></i>
                            </span>Profile</a>
                    </li>
                    <li><a class="logout" href="<?php echo BASE_URL . '/logout.php' ?>"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>