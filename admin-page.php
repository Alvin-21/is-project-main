<?php
session_start();

if ((!isset($_SESSION['is_admin']))) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>CMS | Admin Panel</title>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha512-rRQtF4V2wtAvXsou4iUAs2kXHi3Lj9NE7xJR77DE7GHsxgY9RTWy93dzMXgDIG8ToiRTD45VsDNdTiUagOFeZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <style>
        <?php include "css/theme.css" ?><?php include "css/style.css" ?>
    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <div>
                            <h1 class="text-white">CMS Admin</h1>
                        </div>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#" class="font-size">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#user-table" class="font-size">
                                    <i class="fas fa-users"></i>
                                    <span class="bot-line"></span>User Table</a>
                            </li>
                            <li>
                                <a href="index.php" class="font-size">
                                    <i class="fa fa-file"></i>
                                    <span class="bot-line"></span>Case Files</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="images/user.png" alt="John Doe" />
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix" style="cursor: default;">
                                        <figure class="image">
                                            <img src="images/user.png" alt="John Doe" />
                                        </figure>
                                        <div class="content">
                                            <h5 class="name"><?php echo $_SESSION['user_details']['f_name']; ?> <?php echo $_SESSION['user_details']['l_name']; ?></h5>
                                            <span class="email"><?php echo $_SESSION['user_details']['email']; ?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="account.php">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="logout.php">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <div>
                            <h2 class="text-white">CMS Admin</h2>
                        </div>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="#user-table">
                                <i class="fas fa-users"></i>User Table</a>
                        </li>
                        <li>
                            <a href="index.php">
                                <i class="fas fa-file"></i>Case Files</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="images/user.png" alt="John Doe" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['user_details']['f_name']; ?> <?php echo $_SESSION['user_details']['l_name']; ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix" style="cursor: default;">
                                <figure class="image">
                                    <img src="images/user.png" alt="John Doe" />
                                </figure>
                                <div class="content">
                                    <h5 class="name"><?php echo $_SESSION['user_details']['f_name']; ?> <?php echo $_SESSION['user_details']['l_name']; ?></h5>
                                    <span class="email"><?php echo $_SESSION['user_details']['email']; ?></span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="account.php">
                                        <i class="zmdi zmdi-account"></i>Account</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="logout.php">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">Admin Panel</li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome
                                <span><?php echo $_SESSION['user_details']['f_name']; ?>!</span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- USER TABLE -->
            <section>
                <?php

                require_once("connection.php");
                $query = "select * from user where is_deleted = 0";
                $result = mysqli_query($db, $query);
                $deleted_users = "select * from user where is_deleted = 1";
                $deleted_users_result = mysqli_query($db, $deleted_users);

                ?>
                <div id="user-table" class="pt-3">
                    <a href="register.php" class="text-white btn btn-primary btn-custom rounded px-3 ml-4 mb-3">
                        <i class="fas fa-user-plus"></i> Add user
                    </a>
                    <button id="show-deleted" class="btn btn-danger rounded px-3 ml-4 mb-3">
                        <i class="fas fa-user-minus"></i> View deleted users
                    </button>
                    <button id="show-current" class="btn btn-primary rounded px-3 ml-4 mb-3">
                        <i class="fas fa-user"></i> View current users
                    </button>
                </div>


                <!-- CURRENT USER TABLE -->
                <div class="table-responsive px-4">
                    <table id="current-users" class="table">
                        <thead>
                            <tr>
                                <th scope="col" colspan="9" class="text-center">Current Users</th>
                            </tr>
                            <tr>
                                <th scope="col">User ID</th>
                                <th scope="col">User Type</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($row = mysqli_fetch_assoc($result)) {
                                $user_id = $row['user_id'];
                                $user_type = $row['user_type'];
                                $f_name = $row['f_name'];
                                $l_name = $row['l_name'];
                                $username = $row['username'];
                                $phone_number = $row['phone_number'];
                                $email = $row['email'];
                            ?>

                                <tr>
                                    <td><?php echo $user_id ?></td>
                                    <td><?php echo $user_type ?></td>
                                    <td><?php echo $f_name ?></td>
                                    <td><?php echo $l_name ?></td>
                                    <td><?php echo $username ?></td>
                                    <td><?php echo $phone_number ?></td>
                                    <td><?php echo $email ?></td>
                                    <td>
                                        <a href="user-edit.php?userID=<?php echo $user_id ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="user-delete.php?userID=<?php echo $user_id ?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- DELETED USER TABLE -->
                <div class="table-responsive px-4">
                    <table id="deleted-users" class="table" style="display: none;">
                        <thead>
                            <tr>
                                <th scope="col" colspan="9" class="text-center">Deleted Users</th>
                            </tr>
                            <tr>
                                <th scope="col">User ID</th>
                                <th scope="col">User Type</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($deleted_user_row = mysqli_fetch_assoc($deleted_users_result)) {
                                $deleted_user_id = $deleted_user_row['user_id'];
                                $deleted_user_type = $deleted_user_row['user_type'];
                                $deleted_f_name = $deleted_user_row['f_name'];
                                $deleted_l_name = $deleted_user_row['l_name'];
                                $deleted_username = $deleted_user_row['username'];
                                $deleted_phone_number = $deleted_user_row['phone_number'];
                                $deleted_email = $deleted_user_row['email'];
                            ?>

                                <tr>
                                    <td><?php echo $deleted_user_id ?></td>
                                    <td><?php echo $deleted_user_type ?></td>
                                    <td><?php echo $deleted_f_name ?></td>
                                    <td><?php echo $deleted_l_name ?></td>
                                    <td><?php echo $deleted_username ?></td>
                                    <td><?php echo $deleted_phone_number ?></td>
                                    <td><?php echo $deleted_email ?></td>
                                    <td>
                                        <a href="user-edit.php?userID=<?php echo $deleted_user_id ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="user-delete.php?userID=<?php echo $deleted_user_id ?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2022 CMS. All rights reserved. Alvin Awuor.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Vendor JS       -->
    <script src="vendor/animsition/animsition.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <!-- Main JS-->
    <script src="js/script.js"></script>

</body>

</html>