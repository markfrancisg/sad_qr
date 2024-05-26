$(document).ready(function() {
    $('.delete-btn').click(function() {
        var email = $(this).data('email');
        $('#delete-link').attr('href', '../../../includes/super_admin/account_list.inc.php?email=' + email);
    });
});

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