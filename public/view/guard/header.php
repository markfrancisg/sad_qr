<?php

require_once '../../../includes/config.session.inc.php';
require_once '../../../includes/authenticate.inc.php';
grantPermission('guard');

function isActive($page)
{
    return basename($_SERVER['PHP_SELF']) == $page ? 'active' : '';
}

// Define page titles for each page
$page_titles = array(
    'guard.dashboard.php' => 'Dashboard',
    'homeowners.php' => 'Homeowners',
    'qr_code.php' => 'QR Code',
    'balance.php' => 'Balance',
    'accounts.php' => 'Accounts',
    'logs.php' => 'Records Logs'
);

$current_page = basename($_SERVER['PHP_SELF']);
$title = isset($page_titles[$current_page]) ? $page_titles[$current_page] : 'San Lorenzo South SeQRity';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?php echo $title; ?></title>

    <!-- LOGO FOUND IN THE BROWSER TAB -->
    <link rel="icon" type="image/png" href="../../../entrance_pic.jpg">

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="../../css/style1.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body id="page-top">
    <div class="spinner-wrapper">
        <div class="spinner-border" role="status">
        </div>
    </div>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav custom-gradient sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="guard.dashboard.php">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-4">San Lorenzo South Phase 1</div>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item sidebar-nav <?php echo isActive('guard.dashboard.php'); ?>">
                <a class="nav-link" href="guard.dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Scan</span></a>
            </li>

            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item sidebar-nav <?php echo isActive('records.php'); ?>">
                <a class="nav-link " href="homeowners.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Record Logs</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <li class="nav-item sidebar-nav <?php echo isActive('visitor.php'); ?>">
                <a class="nav-link " href="balance.php">
                    <i class="fas fa-fw fa-money-check"></i>
                    <span>Visitor</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" class="smallscreen-bg">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light smallscreen-bg bg-light topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none mr-2 button-bar-icon">
                        <i class="fa fa-bars bar-icon"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                            <div class="input-group-append">
                                <button class="btn btn-light" type="button">
                                    <i class="fas fa-search search-icon fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search search-icon fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="button">
                                                <i class="fas fa-search search-icon fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['account_email']; ?> </span>
                                <i class="fas fa-user-circle fa-fw mr-2 text-gray-400 profile-icon"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu user-profile-option dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item text-center" href="profile.php">
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-center" href="#" data-toggle="modal" data-target="#logoutModal">
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>


                <!-- End of Topbar -->