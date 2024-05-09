<?php

require_once 'header.php';
include_once '../../../includes/Visitor_model.inc.php';
require_once '../../../includes/dbh.inc.php';
include_once '../../../includes/guard/visitor_view.inc.php';



$results = get_visitor_list($pdo);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="ml-4 mt-4 mb-4">
                    <div class="row">
                        <div class="col text-center">
                            <h1 class="h3 mb-0 text-gray-800">Hello</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <h1 class="h5 mb-0 text-gray-800">Please state the purpose of your visit</h1>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <?php visitor_message(); ?>
                    <form class="user" method="post" action="../../../includes/guard/visitor.inc.php" id="visitorForm">
                        <div>
                            <?php
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-3 homeowner-field">
                                <input type="text" class="form-control form-control-user form-control-color" id="first_name" name="first_name" placeholder="First Name" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-3 homeowner-field">
                                <input type="text" class="form-control form-control-user form-control-color" id="last_name" name="last_name" placeholder="Last Name" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12  mb-3 homeowner-field">
                                <input type="text" class="form-control form-control-user form-control-color" id="purpose" name="purpose" placeholder="Purpose of Visit" required>
                                <div class="error-container"> <span class="error"></span></div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center"> <!-- Center the button horizontally within its parent container -->
                            <button type="submit" class="btn custom-btn btn-user col-sm-3 mb-2 mb-sm-0" id="submitButton">
                                Done
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4" id="visitorList">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-8 smallscreen-card">
                <div class="d-sm-flex align-items-center justify-content-between ml-4 mt-4">
                    <h6 class="h3 text-gray-800 smallscreen-h6-text">Visitor List</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <?php if (empty($results)) : ?>
                            <p class="text-center">No visitors available.</p>
                        <?php else : ?>
                            <div class="d-sm-flex justify-content-end mr-5 mb-3">
                                <div class="filter-border">
                                    <p>Filter <i class="fas fa-filter"></i></p>
                                </div>
                            </div>
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Purpose of Visit</th>
                                        <th>Time and Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($results as $row) : ?>
                                        <tr>
                                            <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                                            <td><?php echo $row['purpose']; ?></td>
                                            <td><?php echo $row['date_time']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>



</div>


<script src="../../js/visitor.js"></script>
<?php
require_once 'footer.php';
?>