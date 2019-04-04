<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>

    <style>
        .main-header .logo {
            transition: width 0.3s ease-in-out;
            display: block;
            float: left;
            height: 2.5em;
            font-size: 20px;
            line-height: 50px;
            text-align: center;
            width: 230px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            padding: 0 15px;
            font-weight: 300;
            overflow: hidden;

            background-color: #2acfd2;
            color: #ffffff;
            border-bottom: 0 solid
        }

        .main-header .navbar {
            box-shadow: 0 1px 40px rgba(0,0,0,.1);
        }

        .main-header {
            position: relative;
            max-height: 3.2em;
            z-index: 1030;
        }

        .main-header .navbar .sidebar-toggle {
            color: #333;
        }

        .main-header .sidebar-toggle {
            float: left;
            padding: 5px 5px;
            font-family: fontAwesome;
            color: #337ab7;
            text-decoration: none;
        }

        .navbar-nav > .user-menu .user-image {
            float: left;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin-right: 10px;
            margin-top: -2px;
        }

        .main-header .navbar-custom-menu, .main-header .navbar-right {
            float: right;
        }

        .main-header .navbar-custom-menu .navbar-nav {
            float: left;
            margin: 0;
        }

        .main-header .navbar .nav > li > a {
            color: #333;
        }






        .navbar-custom {
            background-color: #1B232E;
        }
        /* change the brand and text color */
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
            color: rgba(255,255,255,.8);
        }
        /* change the link color */
        .navbar-custom .navbar-nav .nav-link {
            color: rgba(255,255,255,.5);
        }
        /* change the color of active or hovered links */
        .navbar-custom .nav-item.active .nav-link,
        .navbar-custom .nav-item:hover .nav-link {
            color: #ffffff;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .5s ease;
            background-color: #008CBA;
        }

        .overlay-text{
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        tr{
            line-height: 2rem;
        }
    </style>

    <title><?= $title ?></title>
</head>
<body>
    <div class="wrapper sticky-top" style="height: auto;min-height: 100%">
        <header class="main-header shadow">
            <a href="/admin" class="logo">
                <span class="logo-lg"><b>Admin</b> Panel</span>
            </a>

            <nav class="navbar bg-light navbar-static-top navbar-light" style="height: 3.2em">

                <div class="navbar-custom-menu ml-auto">
                    <ul class="nav navbar-nav">
                        <li class="user user-menu">
                            <a href="#">
                                <img src="http://demo.raman.work/adminpro/uploads/users/1.png?1550781913" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $account ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>

    <div style="height: 100vh">
        <div class="row h-100">
<!--            <nav class="col-md-2 d-none d-md-block navbar-custom sidebar pt-3" style="width:230px;height: 100%">-->
<!--                <div class="sidebar-sticky ml-3">-->
<!--                    <ul class="nav flex-column">-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link active" href="/admin/blog">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>-->
<!--                                Blogs-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </nav>-->

            <main role="main" class="col ml-sm-auto px-4">
