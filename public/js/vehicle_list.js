// $(document).ready(function() {
//     $('.delete-btn').click(function() {
//         var email = $(this).data('email');
//         $('#delete-link').attr('href', '../../../includes/admin/qr_list.inc.php?email=' + email);
//     });
// });

document.addEventListener("DOMContentLoaded", function() {
    var toastElement = document.getElementById('liveToastEdit');
    if (toastElement) {
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
    }
});

$(document).ready(function() {
    $('#delete_all').click(function() {
        var checkbox = $('.input_checkbox:checked');
        if (checkbox.length > 0) {
            $('#confirmModal').modal('show');
        }
    });

    $('#confirmDelete').click(function() {
        var checkbox = $('.input_checkbox:checked');
        var checkbox_value = [];
        $(checkbox).each(function() {
            checkbox_value.push($(this).val());
        });

        $.ajax({
            url: "../../../includes/admin/qr_list.inc.php",
            method: "POST",
            data: {
                checkbox_value: checkbox_value
            },
            success: function(response) {
                $('#confirmModal').modal('hide');
                window.location.href = window.location.pathname + "?delete=success"; // Refresh the page with the parameter
            }
        });
    });

});

$(document).ready(function() {
    $('#edit').click(function() {
        var selectedQr = $('.input_checkbox:checked').closest('tr').attr('id').split('_')[1];
        window.location.href = '../admin/edit_vehicle.php?qr_id=' + encodeURIComponent(selectedQr);
    });
});

$(document).on('change', '.input_checkbox', function() {
    var checkedRows = $('.input_checkbox:checked');
    var editButton = $('#edit');
    var deleteButton = $('#delete_all');

    if (checkedRows.length === 0) {
        editButton.prop('disabled', true);
        deleteButton.prop('disabled', true);
    } else if (checkedRows.length === 1) {
        editButton.prop('disabled', false);
        deleteButton.prop('disabled', false);
    } else {
        editButton.prop('disabled', true);
        deleteButton.prop('disabled', false);
    }
});


// If search is empty, prevent submit
document.getElementById('searchForm').addEventListener('submit', function(event) {
    var searchInput = document.getElementById('searchInput').value.trim();
    if (searchInput === '') {
        event.preventDefault(); // Prevent form submission
    }
});

function restrictInput(event) {
    const inputField = event.target;
    // Allow only letters and hyphens
    inputField.value = inputField.value.replace(/[^A-Za-z0-9-]/g, '');
        // Convert to uppercase
    inputField.value = inputField.value.toUpperCase();
}
