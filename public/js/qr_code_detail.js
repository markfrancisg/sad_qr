$(document).ready(function() {
    $('.pay-option').click(function() {
        var qr_id = $(this).data('qr'); // Assuming the data attribute is 'data-qr'
        $('#pay-link').attr('href', '../../../includes/admin/balance_pay.inc.php?qr_id=' + qr_id);
    });
});


//for the payment success notification
document.addEventListener("DOMContentLoaded", function() {
    var toastElement = document.getElementById('liveToast');
    if (toastElement) {
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
    }
});
