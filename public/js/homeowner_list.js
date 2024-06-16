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

$(document).ready(function() {
    $('#edit').click(function() {
        var selectedEmail = $('.input_checkbox:checked').closest('tr').find('td:eq(2)').text().trim();
        window.location.href = '../admin/edit_homeowner.php?email=' + encodeURIComponent(selectedEmail);
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

// ________________________________Edit Toast Update____________________________


document.addEventListener("DOMContentLoaded", function() {
    var toastElement = document.getElementById('liveToast');
    if (toastElement) {
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
    }
});



// ________________________________Search Option____________________________


// let originalData = [];

// // for the Search button
// document.addEventListener('DOMContentLoaded', function() {
//     const tableBody = document.getElementById('tableBody');
//     originalData = [...tableBody.rows].map(row => row.innerHTML); // Store initial table rows

//     document.getElementById('searchButton').addEventListener('click', function() {
//         const input = document.getElementById('searchInput').value;
//         if (input === '') {
//             // Restore original data if input is empty
//             tableBody.innerHTML = originalData.map(rowHTML => `<tr>${rowHTML}</tr>`).join('');
//         } else {
//             fetch(`../../../includes/admin/homeowner_search.inc.php?name=${encodeURIComponent(input)}`)
//                 .then(response => {
//                     if (!response.ok) {
//                         throw new Error('Network response was not ok ' + response.statusText);
//                     }
//                     return response.json();
//                 })
//                 .then(data => {
//                     if (data.error) {
//                         console.error('Error:', data.error);
//                         return;
//                     }
//                     tableBody.innerHTML = ''; // Clear existing rows
//                     data.forEach(homeowner => {
//                         const tr = document.createElement('tr');
//                         tr.id = `row_${homeowner.ho_id}`; // Set the id attribute
//                         tr.innerHTML = `
//                             <td class="border-bottom-0 text-center">
//                                 <input type="checkbox" class="input_checkbox" value="${homeowner.ho_id}" />
//                             </td>
//                             <td class="border-bottom-0 text-center">
//                                 <h6 class="text-dark mb-0">${homeowner.first_name} ${homeowner.last_name}</h6>
//                             </td>
//                             <td class="border-bottom-0 text-center">
//                                 <h6 class="text-dark mb-0">${homeowner.email}</h6>
//                             </td>
//                             <td class="border-bottom-0 text-center">
//                                 <h6 class="text-dark mb-0">${homeowner.number}</h6>
//                             </td>
//                             <td class="border-bottom-0 text-center">
//                                 <h6 class="text-dark mb-0">Block ${homeowner.block}, Lot ${homeowner.lot}, ${homeowner.street} Street</h6>
//                             </td>
//                         `;
//                         tableBody.appendChild(tr);
//                     });
//                 })
//                 .catch(error => {
//                     console.error('There was a problem with the fetch operation:', error);
//                 });
//         }
//     });

//     // Optionally, you can listen for 'input' event to restore table on clearing search input
//     document.getElementById('searchInput').addEventListener('input', function() {
//         if (this.value === '') {
//             tableBody.innerHTML = originalData.map(rowHTML => `<tr>${rowHTML}</tr>`).join('');
//         }
//     });
// });