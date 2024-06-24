<?php

require_once '../../../includes/config.session.inc.php';
require_once '../../../includes/authenticate.inc.php';
grantPermission('admin');

function isActive($page)
{
    return basename($_SERVER['PHP_SELF']) == $page;
}

$page_titles = array(
    'admin.dashboard.php' => 'Dashboard',
    'homeowners.php' => 'Homeowners',
    'edit_homeowner.php' => 'Edit Homeowner',
    'homeowner_list.php' => 'Homeowners',
    'qr_code.php' => 'QR Code',
    'qr_code_detail.php' => 'QR Code',
    'balance.php' => 'Balance',
    'vehicle_list_paid.php' => 'QR Code',
    'vehicle_list_unpaid.php' => 'QR Code',
    'vehicle_list.php' => 'QR Code',
    'logs.php' => 'Records',
    'logs_daily.php' => 'Records',
    'logs_weekly.php' => 'Records'

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

        setTimeout(function() {
            var alertContainer = document.getElementById("alertContainer");
            alertContainer.classList.add("fade-out");
            setTimeout(function() {
                alertContainer.style.display = "none"; // Hide the alert container after it fades out
            }, 1000); // Adjust this delay to match the opacity transition duration
        }, 3000); // 5000 milliseconds = 5 seconds
    </script>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-center">
                    <a href="" class="text-nowrap logo-img">
                        <img src="../../images/logos/san_lorenzo_logo.svg" width="100" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer ml-3" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>

                <div class="container-fluid">
                    <h5 class="text-center fw-bolder mt-1">San Lorenzo South Phase 1</h4>
                </div>

                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">

                        <hr class="text text-primary">
                        <li class="sidebar-item <?php echo isActive('admin.dashboard.php') ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('admin.dashboard.php'); ?>" href="admin.dashboard.php" aria-expanded="false">
                                <span>
                                    <i class="fa fa-house-user"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo isActive('logs.php') || isActive('logs_daily.php') || isActive('logs_weekly.php') ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('logs.php') || isActive('logs_daily.php') || isActive('logs_weekly.php'); ?>" href="logs.php" aria-expanded="false">
                                <span>
                                    <i class="fa fa-file"></i>
                                </span>
                                <span class="hide-menu"> Records</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Homeowners</span>
                        </li>
                        <li class="sidebar-item <?php echo isActive('homeowners.php') ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('homeowners.php'); ?>" href="homeowners.php" aria-expanded="false">
                                <span>
                                    <i class="fa fa-user-plus"></i>
                                </span>
                                <span class="hide-menu">Add Homeowner</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php echo isActive('homeowner_list.php') || isActive('edit_homeowner.php')  ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('homeowner_list.php'); ?>" href="homeowner_list.php" aria-expanded="false">
                                <span>
                                    <i class="fa fa-users"></i>
                                </span>
                                <span class="hide-menu">Homeowner List</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">QR Code</span>
                        </li>
                        <li class="sidebar-item <?php echo isActive('qr_code.php') ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('qr_code.php'); ?>" href="qr_code.php" aria-expanded="false">
                                <span>
                                    <i class="fa fa-car"></i>
                                </span>
                                <span class="hide-menu">Vehicle Registration</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php echo (isActive('vehicle_list.php') || isActive('qr_code_detail.php'))
                                                    || isActive('vehicle_list_paid.php') || isActive('vehicle_list_unpaid.php')  ? 'selected' : ''; ?>">
                            <a class="sidebar-link <?php echo isActive('vehicle_list.php') || isActive('qr_code_detail.php')
                                                        || isActive('vehicle_list_paid.php') || isActive('vehicle_list_unpaid.php') ? 'active' : ''; ?>" href="vehicle_list.php" aria-expanded="false">
                                <span>
                                    <i class="fa fa-id-card"></i>
                                </span>
                                <span class="hide-menu">Vehicle List</span>
                            </a>
                        </li>


                        <hr class="text text-primary">

                        <a class="sidebar-link" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <div class="d-flex">
                                <button class="btn btn-outline-primary w-100"><i class="fa fa-chevron-left"></i>
                                    Log out</button>
                            </div>
                        </a>
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <span>
                                    <i class="fa fa-chevron-left"></i> </span>
                                <span class="hide-menu">Log Out</span>
                            </a>
                        </li> -->
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