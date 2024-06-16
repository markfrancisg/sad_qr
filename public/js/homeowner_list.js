//for delete button
// $(document).ready(function() {
//     $('.delete-btn').click(function() {
//         var email = $(this).data('email');
//         $('#delete-link').attr('href', '../../../includes/admin/homeowner_list.inc.php?email=' + email);
//     });
// });

//for Multiple Delete
$(document).ready(function() {
    $('#delete_all').click(function() {
        var checkbox = $('.delete_checkbox:checked');
        if (checkbox.length > 0) {
            $('#confirmModal').modal('show');
        } else {
            alert("Select at least one record");
        }
    });

    $('#confirmDelete').click(function() {
        var checkbox = $('.delete_checkbox:checked');
        var checkbox_value = [];
        $(checkbox).each(function() {
            checkbox_value.push($(this).val());
        });

        $.ajax({
            url: "../../../includes/admin/delete_homeowner.inc.php",
            method: "POST",
            data: {
                checkbox_value: checkbox_value
            },
            success: function(response) {
                $(checkbox).each(function() {
                    $('#row_' + $(this).val()).remove();
                });
                $('#confirmModal').modal('hide');
            }
        });
    });
});

//edit button
document.addEventListener('DOMContentLoaded', function () {
    // Get all elements with the class 'edit-btn'
    var editButtons = document.querySelectorAll('.edit-btn');

    // Loop through each edit button
    editButtons.forEach(function(editButton) {
        // Add a click event listener to each edit button
        editButton.addEventListener('click', function () {
            // Get the email from the data-email attribute of the clicked edit button
            var email = editButton.getAttribute('data-email');

            // Construct the URL with the email parameter
            var editUrl = '../admin/edit_homeowner.php?email=' + encodeURIComponent(email);

            // Set the href attribute of the "Edit" link inside the modal
            var editLink = document.getElementById('edit-link');
            editLink.setAttribute('href', editUrl);
        });
    });
});


//for the search option
function searchTable() {
    // Get input element and value
    var input = document.getElementById("searchInput");
    var filter = input.value.toUpperCase();
    // Get table body and rows
    var table = document.getElementById("dataTable");
    var tbody = table.getElementsByTagName("tbody")[0];
    var rows = tbody.getElementsByTagName("tr");
    // Loop through all table rows, hide those that don't match the search query
    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var found = false;
        for (var j = 0; j < cells.length; j++) {
            var cell = cells[j];
            if (cell) {
                var txtValue = cell.textContent || cell.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
        }
        // Toggle row visibility based on search result
        rows[i].style.display = found ? "" : "none";
    }
}

// Attach event listener to the search input
document.getElementById("searchInput").addEventListener("keyup", searchTable);

// ________________________________Edit Toast Update____________________________


document.addEventListener("DOMContentLoaded", function() {
    var toastElement = document.getElementById('liveToast');
    if (toastElement) {
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
    }
});