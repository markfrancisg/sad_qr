<?php

function account_edit_success()
{
    if (isset($_GET['account_edit']) && $_GET['account_edit'] === "success") {
        echo '
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-primary">
                    <img src="../../../public/images/logos/san_lorenzo_logo.svg" width="30" class="rounded me-2" alt="...">
                    <strong class="me-auto text-light">Edit Successful</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Account information edited successfully
                </div>
            </div>
        </div>';
    }
}
