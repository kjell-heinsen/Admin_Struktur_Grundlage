<?php

use DEFAULTNAMESPACE\app\core\masterload;
use DEFAULTNAMESPACE\app\core\navigation;
use DEFAULTNAMESPACE\app\helpers\url;
use DEFAULTNAMESPACE\app\models\login;
use DEFAULTNAMESPACE\app\core\csrf;
use DEFAULTNAMESPACE\app\core\sec;

/*
if (Sec::logged()) {
    $loginmodel = new Login_Model();
    $userid = $loginmodel->GetIDByName(SESSION::get('login'));
    $global_userdata = get_userdata($userid);
}
else
{
    Sec::ToLogin();
} */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="X-CSRF-Token" content="<?= csrf::getToken() ?>">
    <title><?= SITETITLE . ' - ' . $data['title'] ?></title>

    <!-- Google Font: Source Sans Pro -->
  <?php /*  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> */ ?>
    <!-- Font Awesome -->
    <script src="<?= url::JScript('plugins/jquery/jquery.min') ?>"></script>
    <script src="<?= url::JScript('dist/js/main') ?>"></script>
    <link rel="stylesheet" href="<?= url::STYLES('plugins/fontawesome-free/css/all.min') ?>">


    <link rel="stylesheet" href="<?= url::STYLES('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min') ?>">

    <link rel="stylesheet" href="<?= url::STYLES('plugins/toastr/toastr.min') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= url::STYLES('dist/css/adminlte.min') ?>">
    <link rel="stylesheet" href="<?= url::STYLES('dist/css/myapp') ?>">
    <?= sec::AntiSpamCSS() ?>
    <?php masterload::AJAXfiles(); ?>
    <script type="text/javascript">
        var csrf_token = $('meta[name="X-CSRF-Token"]').attr('content');
        $.ajaxPrefilter(function(options, originalOptions, jqXHR){
            if (options.type.toLowerCase() === "post") {
                // initialize `data` to empty string if it does not exist
                options.data = options.data || "";

                // add leading ampersand if `data` is non-empty
                options.data += options.data?"&":"";

                // add _token entry
                options.data += "csrf_token=" + encodeURIComponent(csrf_token);
            }
        });

    </script>


</head>
<?php
$darkmode = false;
if($darkmode){
    $data['darkmode']['body'] = 'dark-mode';
    $data['darkmode']['nav'] = 'navbar-dark navbar-light';
    $data['darkmode']['sidebar'] = '';
} else{
    $data['darkmode']['body'] = '';
    $data['darkmode']['nav'] = 'navbar-primary navbar-dark';//'navbar-dark navbar-light';
    $data['darkmode']['sidebar'] = 'navbar-primary';
}


?>
<body class="hold-transition sidebar-mini layout-footer-fixed text-sm <?= $data['darkmode']['body'] ?>">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand <?= $data['darkmode']['nav'] ?>">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
          <?php /*  <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li> */ ?>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <?php /*         <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
           <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div> */ ?>
            </li>

       <?php /*     <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li> */ ?>
        <?php /*    <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?= url::IMAGES('/dist/img/emptyuser','static/','.png') ?>" class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline"><?= $global_userdata->user_login ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">

                    <li class="user-header bg-primary">
                        <img src="<?= url::IMAGES('/dist/img/emptyuser','static/','.png') ?>" class="img-circle elevation-2" alt="User Image">
                        <p>
                           <?= $global_userdata->user_login ?>
                            <small></small>
                        </p>
                    </li>



                    <li class="user-footer">
                        <a href="<?= url::LINK('profil/')  ?>" class="btn btn-default btn-flat">Profil</a>
                        <a href="<?= url::LINK('logout/')  ?>" class="btn btn-default btn-flat float-right">Logout</a>
                    </li>
                </ul>
            </li> */ ?>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        <?php /*    <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li> */ ?>
        </ul>
    </nav>
    <!-- /.navbar -->



    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link  <?= $data['darkmode']['sidebar'] ?>">
            <span class="brand-text font-weight-light"><?= SITETITLE ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
    <?php navigation::showMainNav(); ?>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?= $data['pt'] ?></h1>    <small><?= $data['pst'] ?></small>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><?= $data['firstlvl'] ?></a></li>
                            <?php if (isset($data['secondlvl']) OR ! empty($data['secondlvl'])) {
                                ?>
                                <li class="breadcrumb-item"><a href="#"><?= $data['secondlvl'] ?></a></li>
                                <?php
                            } else {
                                ?>
                                <li class="breadcrumb-item"><a href="#"><?= $data['firstlvl'] ?></a></li>
                            <?php }
                            ?>
                            <?php if (isset($data['lvl']) OR ! empty($data['lvl'])) {
                                ?>
                                <li class="breadcrumb-item active"><?= $data['lvl'] ?></li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
