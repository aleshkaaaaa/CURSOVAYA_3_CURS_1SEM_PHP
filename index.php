<!DOCTYPE html>
<?php
include 'constants.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo @$title; ?></title>
    <link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/color/themecolor.css">
</head>

<body>

    <div class="preloader">

        <div class="loader theme_background_color">

            <span></span>


        </div>
    </div>
    <div class="wrapper">

        <nav class=" nim-menu navbar navbar-default navbar-fixed-top">

            <div class="container">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                    </button>

                    <a class="navbar-brand" href="index.php"><span class="themecolor">Билеты онлайн</span></a>

                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="#home" class="page-scroll">
                                <h3>Главная страница</h3>
                            </a></li>

                        <li><a href="#two" class="page-scroll">
                                <h3>О Проекте</h3>
                            </a></li>

                        <li><a href="pro/signin.php" class="page-scroll">
                                <h3>Вход для пользователей</h3>
                            </a></li>

                        <li><a href="pro/adminsignin.php" class="page-scroll">
                                <h3>Администратор</h3>
                            </a></li>
                    </ul>

                </div>

            </div>

        </nav>

        <section class="main-heading" id="home">

            <div class="overlay">

                <div class="container">

                    <div class="row">

                        <div class="main-heading-content col-md-12 col-sm-12 text-center">

                            <h1 class="main-heading-title"><span class="main-element themecolor"
                                    data-elements=" Забронируй"></span></h1>

                            <h1 class="main-heading-title"><span class="main-element themecolor"
                                    data-elements=" билеты онлайн!"></span>
                            </h1>

                            <p class="main-heading-text">Добро пожаловать на сайт<br />бронирования билетов онлайн</p>

                            <div class="btn-bar">

                                <a href="pro/signin.php" class="btn btn-custom theme_background_color">Забронировать билеты</a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </section>

        <section class="aboutus white-background black" id="two">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 text-center black">

                        <h3 class="title">О <span class="themecolor">Проекте</span></h3>

                        <p class="a-slog">Проект разработал <?php echo $developer_name; ?> (<?php echo $developer_matric; ?>)

                    </div>

                </div>

                <div class="gap">


                </div>


                <div class="row about-box">

                    <div class="col-sm-4 text-center">

                        <div class="margin-bottom">

                            <i class="fa fa-newspaper-o"></i>

                            <h4>Получите билеты на поезд, не выходя из дома</h4>

                            <p class="black">Бронируйте билеты на поезд из любой точки мира, используя надежную платформу бронирования билетов
                                построен исключительно для того, чтобы предоставить пассажирам приятные впечатления от бронирования билетов. </p>

                        </div>

                    </div>

                    <div class="col-sm-4 about-line text-center">

                        <div class="margin-bottom">

                            <i class="fa fa-diamond"></i>

                            <h4>Информация о поездах и билетах у вас под рукой</h4>

                            <p class="black">Проверка доступных мест, информация о маршруте, информация о тарифах в режиме реального времени.</p>

                        </div>

                    </div>

                    <div class="col-sm-4 text-center">

                        <div class="margin-bottom">

                            <i class="fa fa-dollar"></i>

                            <h4>Низкие цены</h4>

                            <p class="black">Самые дешевые билеты во всем МИРЭА</p>

                        </div>

                    </div>

                </div>

            </div>
        </section>



        <footer class="site-footer section-spacing text-center " id="eight">


            <div class="container">

                <div class="row">

                    <div class="col-md-4">

                        <p class="footer-links"><a href="#">Все права защищены</a> <a href="#">мной</a></p>

                    </div>

                    <div class="col-md-4"> <small>&copy; <?php echo date('Y'); ?>, Проект разработал <?php echo $developer_name; ?> </small></div>

                    <div class="col-md-4">

                    </div>

                </div>

            </div>

        </footer>

    </div>

    <script src="library/modernizr.custom.97074.js"></script>

    <script src="library/jquery-1.11.3.min.js"></script>

    <script src="library/bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

    <script src="library/vegas/vegas.min.js"></script>

    <script src="js/plugins.js"></script>

    <script src="js/typed.js"></script>

    <script src="js/fappear.js"></script>

    <script src="js/jquery.countTo.js"></script>

    <script src="js/owl.carousel.js"></script>

    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="js/SmoothScroll.js"></script>

    <script src="js/common.js"></script>

</body>


</html>
