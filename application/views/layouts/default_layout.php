<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/app/Connection.js"></script>
<!--    <link rel="stylesheet" href="--><?php //echo base_url();?><!--assets/font-awesome/4.2.0/css/font-awesome.min.css" />-->
<!--    <link rel="stylesheet" href="--><?php //echo base_url();?><!--assets/css/theme.min.css" class="theme-stylesheet" id="theme-style" />-->

    <title><?php echo $title;?></title>
</head>
<body>
    <div class="header">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
    </div>

    <?php echo $contents;?>

    <div class="footer">
        <div class="footer-inner">
            <div class="footer-content">
                <span class="bigger-120">
                    Copyright © js-tutorials.com. All rights reserved.
                </span>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url();?>assets/javascript/bootstrap.min.js"></script>
</body>
</html>