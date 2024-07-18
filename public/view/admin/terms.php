<?php
include_once 'header.php';
?>


<!--  Header End -->
<div class="container-fluid">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Terms and Conditions</li>
            </ol>
        </nav>

        <?php if ($_SESSION["role_description"] == "admin") : ?>
            <div class="card border">
                <div class="card-body">
                    <h2 class="fw-semibold mb-4 text-center bg-primary text-white py-4" style="font-family: Arial, sans-serif; font-size: 24px; border-bottom: 1px solid #dee2e6;">Terms and Conditions</h2>
                    <div class="container">
                        <div style="font-family: Arial, sans-serif; text-align: justify;">
                            <p style="font-size: 16px;" class="text-primary">
                                As an admin of the San Lorenzo Phase 1 Subdivision SeQRity system, you agree to the following terms and conditions to ensure the safety and privacy of homeowners' data:
                            </p>
                            <ul style="font-size: 14px;">
                                <li class="mb-1">The data collected, including vehicle plate numbers, entry and exit times, and other related information, will be used solely for monitoring and tracking purposes.</li>
                                <li class="mb-1">You are responsible for ensuring that all collected data is stored securely and protected from unauthorized access.</li>
                                <li class="mb-1">Under no circumstances will the data be shared with third parties without the explicit consent of the homeowners, except as required by law.</li>
                                <li class="mb-1">You will comply with all relevant data protection and privacy laws to maintain the confidentiality and integrity of the data.</li>
                                <li class="mb-1">In the event of a data breach or security incident, you must promptly notify the homeowners association and take appropriate measures to mitigate any potential harm.</li>
                            </ul>
                            <p style="font-size: 16px;" class="text-primary">
                                By accepting these terms, you commit to upholding the highest standards of data security and privacy for the benefit of the homeowners of San Lorenzo Phase 1 Subdivision.
                            </p>
                        </div>

                        <div class="form-check mt-4 d-flex justify-content-center">
                            <input class="form-check-input mr-5" type="checkbox" value="" id="termsCheck" checked disabled>
                            <label class="form-check-label text-center" for="termsCheck">
                                I have read and agree to the terms and conditions
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($_SESSION["role_description"] == "super_admin") : ?>
            <div class="card border">
                <div class="card-body">
                    <h2 class="fw-semibold mb-4 text-center bg-primary text-white py-4" style="font-family: Arial, sans-serif; font-size: 24px; border-bottom: 1px solid #dee2e6;">Terms and Conditions</h2>
                    <div class="container">
                        <div style="font-family: Arial, sans-serif; text-align: justify;">
                            <p style="font-size: 16px;" class="text-primary">
                                As the Super Admin of the San Lorenzo Phase 1 Subdivision SeQRity system, you agree to the following terms and conditions to ensure the safety and privacy of admins' and guards' data:
                            </p>
                            <ul style="font-size: 14px;">
                                <li class="mb-1">The data collected, including personal information and other related details, will be used solely for the management and operation of the SeQRity system.</li>
                                <li class="mb-1">You are responsible for ensuring that all collected data is stored securely and protected from unauthorized access.</li>
                                <li class="mb-1">Under no circumstances will the data be shared with third parties without the explicit consent of the individuals concerned, except as required by law.</li>
                                <li class="mb-1">You will comply with all relevant data protection and privacy laws to maintain the confidentiality and integrity of the data.</li>
                                <li class="mb-1">In the event of a data breach or security incident, you must promptly notify the affected individuals and take appropriate measures to mitigate any potential harm.</li>
                            </ul>
                            <p style="font-size: 16px;" class="text-primary">
                                By accepting these terms, you commit to upholding the highest standards of data security and privacy for the benefit of the admins and guards of San Lorenzo Phase 1 Subdivision.
                            </p>
                        </div>

                        <div class="form-check mt-4 d-flex justify-content-center">
                            <input class="form-check-input mr-5" type="checkbox" value="" id="termsCheck" checked disabled>
                            <label class="form-check-label text-center" for="termsCheck">
                                I have read and agree to the terms and conditions
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>




    </div>
</div>


<?php
include_once 'footer.php';
?>