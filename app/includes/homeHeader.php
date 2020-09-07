<div class="navbar">
    <div class="navbar_left">
        <div class="logo">
            <a href="<?php echo BASE_URL . '/index.php' ?>">ART-MODE</a>
        </div>
    </div>
    <div>
        <ul class="nav-items">
            <li class="nav-link">
                <a href="<?php echo BASE_URL . '/index.php' ?>">Home</a>
            </li>
            <li class="nav-link">
                <a href="#">Category</a>
            </li>
            <li class="nav-link">
                <a href="#">Archive</a>
            </li>
            <li class="nav-link">
                <a href="#">Pages</a>
            </li>
            <li class="nav-link">
                <a href="#">Contact Us</a>
            </li>
        </ul>
    </div>

    <div class="navbar_right">
        <div class="notifications">
            <div class="icon_wrap"><i class="far fa-bell"></i></div>
            <div class="notification_dd">
                <ul class="notification_ul">
                    <li class="starbucks success">
                        <div class="notify_icon">
                            <span class="icon"></span>
                        </div>
                        <div class="notify_data">
                            <div class="title">
                                Lorem, ipsum dolor.
                            </div>
                            <div class="sub_title">
                                Lorem ipsum dolor sit amet consectetur.
                            </div>
                        </div>
                        <div class="notify_status">
                            <p>Success</p>
                        </div>
                    </li>
                    <li class="baskin_robbins failed">
                        <div class="notify_icon">
                            <span class="icon"></span>
                        </div>
                        <div class="notify_data">
                            <div class="title">
                                Lorem, ipsum dolor.
                            </div>
                            <div class="sub_title">
                                Lorem ipsum dolor sit amet consectetur.
                            </div>
                        </div>
                        <div class="notify_status">
                            <p>Failed</p>
                        </div>
                    </li>
                    <li class="mcd success">
                        <div class="notify_icon">
                            <span class="icon"></span>
                        </div>
                        <div class="notify_data">
                            <div class="title">
                                Lorem, ipsum dolor.
                            </div>
                            <div class="sub_title">
                                Lorem ipsum dolor sit amet consectetur.
                            </div>
                        </div>
                        <div class="notify_status">
                            <p>Success</p>
                        </div>
                    </li>
                    <li class="pizzahut failed">
                        <div class="notify_icon">
                            <span class="icon"></span>
                        </div>
                        <div class="notify_data">
                            <div class="title">
                                Lorem, ipsum dolor.
                            </div>
                            <div class="sub_title">
                                Lorem ipsum dolor sit amet consectetur.
                            </div>
                        </div>
                        <div class="notify_status">
                            <p>Failed</p>
                        </div>
                    </li>
                    <li class="kfc success">
                        <div class="notify_icon">
                            <span class="icon"></span>
                        </div>
                        <div class="notify_data">
                            <div class="title">
                                Lorem, ipsum dolor.
                            </div>
                            <div class="sub_title">
                                Lorem ipsum dolor sit amet consectetur.
                            </div>
                        </div>
                        <div class="notify_status">
                            <p>Success</p>
                        </div>
                    </li>
                    <li class="show_all">
                        <p class="link">Show All Activities</p>
                    </li>
                </ul>
            </div>

        </div>

        <?php if (isset($_SESSION['id'])) : ?>
            <div class="profile">
                <div class="icon_wrap">
                    <img src="<?php echo BASE_URL . '/assets/images/profile_pic.png' ?>" alt="profile_pic">
                    <span class="name"><?php echo $_SESSION['username']; ?></span>
                    <i class="fas fa-chevron-down"></i>
                </div>

                <div class="profile_dd">
                    <ul class="profile_ul">
                        <?php if ($_SESSION['admin']) : ?>
                            <li><a class="settings" href="<?php echo BASE_URL . '/admin/dashboard.php' ?>"><span class="picon"><i class="fas fa-cog"></i></span>Dashboard</a></li>
                        <?php endif; ?>
                        <li class="profile_li"><a class="profile" href="#"><span class="picon"><i class="fas fa-user-alt"></i>
                                </span>Profile</a>
                            <div class="btn">My Account</div>
                        </li>
                        <li><a class="logout" href="<?php echo BASE_URL . '/logout.php' ?>"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
                    </ul>
                </div>
            </div>
        <?php else : ?>
            <div class="profile">
                <div class="icon_wrap">
                    <span class="name">JOIN US</span>
                    <i class="fas fa-chevron-down"></i>
                </div>

                <div class="profile_dd">
                    <ul class="profile_ul">
                        <li><a class="settings" href="<?php echo BASE_URL . '/login.php' ?>"><span class="picon"><i class="fas fa-sign-in-alt"></i></i></span>Login</a></li>
                        <li><a class="logout" href="<?php echo BASE_URL . '/register.php' ?>"><span class="picon"><i class="fas fa-user-plus"></i></i></span>Sign up</a></li>
                    </ul>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>