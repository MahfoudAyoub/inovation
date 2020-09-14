<div class="navbar" id="navbar">

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
                <a href="#home">Category</a>
            </li>
            <li class="nav-link">
                <a href="<?php echo BASE_URL . '/Posts.php' ?>">Posts</a>
            </li>
            <li class="nav-link">
                <a href="<?php echo BASE_URL . '/about.php' ?>">About</a>
            </li>
            <li class="nav-link">
                <a href="#">Contact Us</a>
            </li>
        </ul>
    </div>

    <?php if (isset($_SESSION['id'])) : ?>
        <div class="navbar_right">
            <div class="notifications">
                <?php if ($_SESSION['access']==1) : ?>
                    <a href="<?php echo BASE_URL . '/chatRoom/admin/index.php' ?>">
                        <div class="icon_wrap"><i class="fas fa-comments"></i></div>
                    </a>
                <?php else : ?>
                    <a href="<?php echo BASE_URL . '/chatRoom/user/index.php' ?>">
                        <div class="icon_wrap"><i class="fas fa-comments"></i></div>
                    </a>
                <?php endif; ?>
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
                        <?php if ($_SESSION['access']==1) : ?>
                            <li><a class="settings" href="<?php echo BASE_URL . '/admin/dashboard.php' ?>"><span class="picon"><i class="fas fa-cog"></i></span>Dashboard</a></li>
                        <?php endif; ?>
                        <li class="profile_li"><a class="profile" href="<?php echo BASE_URL . '/profile.php' ?>"><span class="picon"><i class="fas fa-user-alt"></i>
                                </span>Profile</a>

                        </li>
                        <?php if ($_SESSION['access']==1) : ?>
                            <li class="profile_li"><a class="profile" href="<?php echo BASE_URL . '/chatRoom/admin/index.php' ?>"><span class="picon"><i class="fas fa-comments"></i>
                                    </span>Join Rooms</a>

                            </li>
                        <?php else : ?>
                            <li class="profile_li"><a class="profile" href="<?php echo BASE_URL . '/chatRoom/user/index.php' ?>"><span class="picon"><i class="fas fa-comments"></i>
                                    </span>Join Rooms</a>

                            </li>
                        <?php endif; ?>
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