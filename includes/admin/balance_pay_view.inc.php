<?php

declare(strict_types=1);

function payment_success()
{

    if (isset($_GET['payment']) && $_GET['payment'] === 'success' && isset($_GET['name'])) {
        $name = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
        echo '
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-primary">
                    <img src="../../../public/images/logos/san_lorenzo_logo.svg" width="30" class="rounded me-2" alt="...">
                    <strong class="me-auto text-light">Payment Successful</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    QR Code Generated for ' . '<b>' . $name . '</b>
                </div>
            </div>
        </div>';
    }
}
