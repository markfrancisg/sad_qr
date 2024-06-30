<?php
include_once 'header.php';
?>

<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Plate Number Search</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">

                <h2 class="fw-semibold mb-2 text-center">Plate Number Search</h2>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <br>
                            <input type="text" name="search_text" id="search_text" placeholder="Search by Vehicle Plate Number" class="form-control p-3 text-center" maxlength="8">
                        </div>
                    </div>
                    <br>
                    <div id="result"></div>
                </div>
                <div style="clear:both"></div>

            </div>
        </div>
    </div>
</div>

<script src="../../js/manual_search.js"></script>

<?php
include_once 'footer.php';
?>