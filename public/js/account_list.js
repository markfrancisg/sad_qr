
// ________________________________Toast Update____________________________

document.addEventListener("DOMContentLoaded", function() {
    var toastElement = document.getElementById('liveToast');
    if (toastElement) {
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
    }
});

document.addEventListener("DOMContentLoaded", function() {
    var toastElement = document.getElementById('deleteToast');
    if (toastElement) {
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
    }
});


// ________________________________Delete and Edit____________________________
//for Multiple Delete
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
            url: "../../../includes/super_admin/delete_account.inc.php",
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
        var selectedEmail = $('.input_checkbox:checked').closest('tr').find('td:eq(2)').text().trim();
        window.location.href = '../super_admin/edit_account.php?email=' + encodeURIComponent(selectedEmail);
    });
});

// EDIT button
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