<?php

require_once '../../../includes/config.session.inc.php';
require_once '../../../includes/authenticate.inc.php';
grantPermission('super_admin');


function isActive($page)
{
    return basename($_SERVER['PHP_SELF']) == $page;
}

$page_titles = array(
    'accounts.php' => 'Accounts',
    'account_list.php' => 'Account List',
);

$current_page = basename($_SERVER['PHP_SELF']);
$title = isset($page_titles[$current_page]) ? $page_titles[$current_page] : 'SeQRity Gate';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" type="image/png" href="../../images/logos/small_san_lorenzo_logo.png" />
    <link rel="stylesheet" href="../../css/styles.min.css" />
    <link rel="stylesheet" href="../../css/custom_layout.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-center">
                    <a href="accounts.php" class="text-nowrap logo-img">
                        <img src="../../images/logos/san_lorenzo_logo.svg" width="150" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer ml-3" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>

                <div class="container-fluid">
                    <h3 class="text-center fw-bolder">San Lorenzo South Phase 1</h3>
                </div>

                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">

                        <hr class="text text-primary">

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Accounts</span>
                        </li>
                        <li class="sidebar-item <?php echo isActive('accounts.php') ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('accounts.php'); ?>" href="accounts.php" aria-expanded="false">
                                <span>
                                    <i class="fa fa-user-plus"></i>
                                </span>
                                <span class="hide-menu">Create Account</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php echo isActive('account_list.php') ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('account_list.php'); ?>" href="account_list.php" aria-expanded="false">
                                <span>
                                    <i class="fa fa-users"></i>
                                </span>
                                <span class="hide-menu">Account List</span>
                            </a>
                        </li>

                        <hr class="text text-primary">

                        <!-- <div class="d-flex">
                            <button class="btn btn-primary w-100">Log out</button>
                        </div> -->
                        <a class="sidebar-link" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <div class="d-flex">
                                <button class="btn btn-outline-primary w-100"><i class="fa fa-chevron-left"></i>
                                    Log out</button>
                                    
                            </div>
                        </a>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>