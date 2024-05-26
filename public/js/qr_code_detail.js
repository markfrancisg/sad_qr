$(document).ready(function() {
    $('.pay-option').click(function() {
        var qr_id = $(this).data('qr'); // Assuming the data attribute is 'data-qr'
        $('#pay-link').attr('href', '../../../includes/admin/balance_pay.inc.php?qr_id=' + qr_id);
    });
});