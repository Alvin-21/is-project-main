<?php
session_start();

if (!isset($_SESSION['is_logged_in'])) {
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
    <title>CMS | Home</title>

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
                            <h1 class="text-white">CMS Home</h1>
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
                            <?php

                            if ($_SESSION['user_details']['user_type'] == 'admin') {

                            ?>
                                <li>
                                    <a href="admin-page.php" class="font-size">
                                        <i class="fas fa-user-shield"></i>Admin Panel
                                        <span class="bot-line"></span>
                                    </a>
                                </li>
                            <?php } ?>
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
                            <h2 class="text-white">CMS Home</h2>
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
                        <?php

                        if ($_SESSION['user_details']['user_type'] == 'admin') {

                        ?>
                            <li>
                                <a class="js-arrow" href="admin-page.php">
                                    <i class="fas fa-user-shield"></i>Admin Panel</a>
                            </li>
                        <?php } ?>
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
                                        <li class="list-inline-item active">Home</li>
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

            <!-- SEARCH BOX -->
            <section class="ftco-section mt-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="au-breadcrumb-content">
                                <form method="get" action="search.php" class="au-form-icon--sm">
                                    <div class="form-group mb-3">
                                        <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for case file" name="query">
                                        <button class="au-btn--submit2" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <?php

                if (($_SESSION['user_details']['user_type'] == 'admin') || ($_SESSION['occupation'] == 'record_officer')) {

                ?>
                    <div class="pt-3">
                        <a href="case-file.php" class="text-white btn btn-primary btn-custom rounded px-3 ml-4 mb-3">
                            <i class="fas fa-file-upload"></i> Upload case file
                        </a>
                    </div>
                <?php } ?>
            </section>

            <!-- CARDS FOR CASE FILES -->
            <section class="mx-3">
                <?php

                require_once("connection.php");
                $query = "select * from case_file where is_deleted = 0";
                $result = mysqli_query($db, $query);

                ?>
                <div class="row">
                    <?php

                    while ($row = mysqli_fetch_assoc($result)) {
                        $file_id = $row['file_id'];
                        $user_id = $row['user_id'];
                        $case_number = $row['case_number'];
                        $file_name = $row['file_name'];
                        $description = $row['description'];

                        $user_query = "select * from user where user_id = $user_id";
                        $user_query_result = mysqli_query($db, $user_query);
                        $user = mysqli_fetch_assoc($user_query_result);

                    ?>
                        <div class="col-4">
                            <div class="card-deck mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo $file_name ?>
                                            <?php

                                            if (($_SESSION['user_details']['user_type'] == 'admin') || ($_SESSION['occupation'] == 'record_officer')) {

                                            ?>
                                                <a href="case-file-edit.php?fileID=<?php echo $file_id ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="case-file-delete.php?fileID=<?php echo $file_id ?>">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </a>
                                            <?php } ?>
                                        </h5>
                                        <p class="card-text">Case Number: <?php echo $case_number ?></p>
                                        <p class="card-text"><?php echo $description ?></p>
                                        <p>
                                            <a href="download.php?id=<?php echo $file_id ?>" target="_blank">
                                                <i class="fas fa-file"></i>
                                                View file
                                            </a>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Uploaded by: <?php echo $user['f_name'] ?> <?php echo $user['l_name'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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

</body>

</html>