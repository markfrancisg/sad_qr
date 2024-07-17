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
    'account_list_verified.php' => 'Account List',
    'account_list_unverified.php' => 'Account List',
    'edit_account.php' => 'Edit Account',
    'terms.php' => 'Terms and Conditions'

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
    <link rel="shortcut icon" type="image/png" href="../../images/logos/san_lorenzo_logo.svg" />
    <link rel="stylesheet" href="../../css/styles.min.css" />
    <link rel="stylesheet" href="../../css/custom_layout.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

    <!-- SPINNER -->
    <div class="spinner-wrapper">
        <div class="spinner-border" role="status">
        </div>
    </div>

    <script>
        const spinnerWrapperEl = document.querySelector('.spinner-wrapper');
        if (spinnerWrapperEl) {
            window.addEventListener('load', () => {
                spinnerWrapperEl.style.opacity = '0';
                setTimeout(() => {
                    spinnerWrapperEl.style.display = 'none';
                }, 200);
            });
        } else {
            console.warn("Element with class 'spinner-wrapper' not found.");
        }
    </script>

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
                        <li class="sidebar-item <?php echo isActive('account_list.php') || isActive('account_list_verified.php') || isActive('account_list_unverified.php') || isActive('edit_account.php') ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('account_list.php') || isActive('account_list_verified.php') || isActive('account_list_unverified.php') || isActive('edit_account.php'); ?>" href="account_list.php" aria-expanded="false">
                                <span>
                                    <i class="fa fa-users"></i>
                                </span>
                                <span class="hide-menu">Account List</span>
                            </a>
                        </li>

                        <hr class="text text-primary mb-0">


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

                    <div class="navbar-text d-flex justify-content-sm-start justify-content-md-center justify-content-lg-center w-100">
                        <!-- Added greeting message -->
                        <span class="navbar-text text-primary">
                            <?php
                            $role_description = isset($_SESSION["role_description"]) ? strtoupper(str_replace('_', ' ', $_SESSION["role_description"])) : '';
                            $account_full_name = isset($_SESSION["account_full_name"]) ? $_SESSION["account_full_name"] : '';
                            echo $role_description . " | " . $account_full_name;
                            ?>
                        </span>
                    </div>

                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-user rounded-circle"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="terms.php" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="fas fa-file-alt fs-6"></i>
                                            <p class="mb-0 fs-3">Terms and Conditions</p>
                                        </a>
                                        <a data-bs-toggle="modal" data-bs-target="#logoutModal" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>