<?php

require_once '../../../includes/config.session.inc.php';
require_once '../../../includes/authenticate.inc.php';
grantPermission('guard');


function isActive($page)
{
    return basename($_SERVER['PHP_SELF']) == $page;
}

$page_titles = array(
    'guard.dashboard.php' => 'Dashboard',
    'record_logs.php' => 'Records',
    'record_logs_daily.php' => 'Records',
    'record_logs_weekly.php' => 'Records',
    'scan_qr.php' => 'Scan',
    'scan_results.php' => 'Scan',
    'visitor.php' => 'Visitor',
    'visitor_list.php' => 'Visitor Logs',
    'visitor_list_daily.php' => 'Visitor Logs',
    'visitor_list_weekly.php' => 'Visitor Logs',

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
                    <a href="#" class="text-nowrap logo-img">
                        <img src="../../images/logos/san_lorenzo_logo.svg" width="80" alt="" />
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
                            <span class="hide-menu">QR Scan</span>
                        </li>
                        <li class="sidebar-item <?php echo isActive('guard.dashboard.php') || isActive('scan_qr.php') || isActive('scan_results.php') ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('guard.dashboard.php') || isActive('scan_qr.php') || isActive('scan_results.php'); ?>" href="guard.dashboard.php" aria-expanded="false">
                                <span>
                                    <i class="fas fa-qrcode"></i>
                                </span>
                                <span class="hide-menu">Scan</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php echo isActive('manual_search.php')  ? 'selected' : '';  ?>">
                            <a class="sidebar-link <?php echo  isActive('manual_search.php');  ?>" href="manual_search.php" aria-expanded="false">
                                <span>
                                    <i class="fa fa-search"></i>
                                </span>
                                <span class="hide-menu">Plate Number Search</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php echo isActive('record_logs.php') || isActive('record_logs_daily.php') || isActive('record_logs_weekly.php')  ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('record_logs.php') || isActive('record_logs_daily.php') || isActive('record_logs_weekly.php'); ?>" href="record_logs.php" aria-expanded="false">
                                <span>
                                    <i class="fa fa-users"></i>
                                </span>
                                <span class="hide-menu">Record Logs</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Visitor Logs</span>
                        </li>
                        <li class="sidebar-item <?php echo isActive('visitor.php') ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('visitor.php'); ?>" href="visitor.php" aria-expanded="false">
                                <span>
                                    <i class="fas fa-user-friends"></i>
                                </span>
                                <span class="hide-menu">Visitor</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php echo isActive('visitor_list.php') || isActive('visitor_list_daily.php') || isActive('visitor_list_weekly.php') ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('visitor_list.php') || isActive('visitor_list_daily.php') || isActive('visitor_list_weekly.php'); ?>" href="visitor_list.php" aria-expanded="false">
                                <span>
                                    <i class="fa fa-user-plus"></i>
                                </span>
                                <span class="hide-menu">Visitor List</span>
                            </a>
                        </li>

                        <hr class="text text-primary mb-0">

                        <li class="sidebar-item <?php echo isActive('terms.php') ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('terms.php'); ?>" href="terms.php" aria-expanded="false">
                                <span>
                                    <i class="fas fa-file-alt"></i>
                                </span>
                                <span class="hide-menu"> Terms & Conditions</span>
                            </a>
                        </li>

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