var currentPage = 1;
var totalRecordsPerPage = 10;
var totalRecords = 0; // This will be updated dynamically
var fetchInterval; // Variable to hold the setInterval reference

function fetchLogs(page = 1) {
    var offset = (page - 1) * totalRecordsPerPage;

    $.ajax({
        url: '../../../includes/LogsListDailyController.php',
        method: 'GET',
        data: {
            offset: offset,
            total_records_per_page: totalRecordsPerPage
        },
        dataType: 'json',
        success: function(response) {
            var tableBody = $('#tableBody');
            tableBody.empty();

            var logs = response.logs;
            totalRecords = response.totalRecords; // Update total records

            if (logs.length === 0) {
                tableBody.append(`
            <tr>
                <td colspan="6" class="text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <img src="../../images/no_item.svg" class="mt-2">
                        <h4 class="text-dark mt-3">No Data Available</h4>
                    </div>
                </td>
            </tr>
        `);
                $('#exportExcelButton').prop('disabled', true);
            } else {
                logs.forEach(function(log) {
                    tableBody.append(`
                <tr>
                    <td class="border-bottom-0 text-center text-muted mb-0">${log.log_name || ''}</td>
                    <td class="border-bottom-0 text-center text-muted mb-0">${log.log_address || ''}</td>
                    <td class="border-bottom-0 text-center text-muted mb-0">${log.log_plate_number || ''}</td>
                    <td class="border-bottom-0 text-center text-muted mb-0">${log.log_vehicle || ''}</td>
                    <td class="border-bottom-0 text-center text-muted mb-0">${log.entry_log || ''}</td>
                    <td class="border-bottom-0 text-center text-muted mb-0">${log.exit_log || ''}</td>
                </tr>
            `);
                });
                $('#exportExcelButton').prop('disabled', false);
            }

            updatePaginationControls();
        }
    });
}

function updatePaginationControls() {
    $('#paginationControls').empty();

    var totalPages = Math.ceil(totalRecords / totalRecordsPerPage);

    $('#paginationControls').append(`
<li class="page-item ${currentPage == 1 ? 'disabled' : ''}">
    <a class="page-link" href="#" data-page="${currentPage - 1}"><i class="fas fa-chevron-left"></i></a>
</li>
`);

    for (var i = 1; i <= totalPages; i++) {
        $('#paginationControls').append(`
    <li class="page-item ${currentPage == i ? 'active' : ''}">
        <a class="page-link" href="#" data-page="${i}">${i}</a>
    </li>
`);
    }

    $('#paginationControls').append(`
<li class="page-item ${currentPage == totalPages ? 'disabled' : ''}">
    <a class="page-link" href="#" data-page="${currentPage + 1}"><i class="fas fa-chevron-right"></i></a>
</li>
`);
}

$(document).on('click', '.page-link', function(e) {
    e.preventDefault();
    var page = $(this).data('page');
    if (page > 0 && page <= Math.ceil(totalRecords / totalRecordsPerPage)) {
        currentPage = page;
        fetchLogs(currentPage);
    }
});

// Function to start fetching logs periodically
function startFetchInterval() {
    fetchInterval = setInterval(function() {
        fetchLogs(currentPage);
    }, 5000);
}

// Function to stop fetching logs periodically
function stopFetchInterval() {
    clearInterval(fetchInterval);
}

// Fetch logs when the page loads
$(document).ready(function() {
    fetchLogs(currentPage);
    startFetchInterval(); // Start the interval initially
});

document.addEventListener('DOMContentLoaded', function() {
    var searchButton = document.getElementById('searchButton');
    var tableBody = document.getElementById('tableBody'); // Assuming you have a <tbody> with id="tableBody"
    var rows = tableBody.getElementsByTagName('tr');

    // Event listener for search button click
    searchButton.addEventListener('click', function() {
        var searchInput = document.getElementById('searchInput').value.toUpperCase();

        // Stop the fetch interval while searching
        stopFetchInterval();

        var anyDataFound = false;

        for (var i = 0; i < rows.length; i++) {
            var plateNumberColumn = rows[i].getElementsByTagName('td')[2]; // Plate number is the third column (index 2)
            if (plateNumberColumn) {
                var textValue = plateNumberColumn.textContent || plateNumberColumn.innerText;
                if (textValue.toUpperCase().indexOf(searchInput) > -1) {
                    rows[i].style.display = ''; // Show row if plate number matches search input
                    anyDataFound = true;
                } else {
                    rows[i].style.display = 'none'; // Hide row if plate number does not match
                }
            }
        }

        // Display "No Data Available" if no rows match the search
        if (!anyDataFound) {
            tableBody.innerHTML = `
            <tr>
                <td colspan="6" class="text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <img src="../../images/no_item.svg" class="mt-2">
                        <h4 class="text-dark mt-3">No Data Available</h4>
                    </div>
                </td>
            </tr>
        `;
            $('#exportExcelButton').prop('disabled', true);
        } else {
            $('#exportExcelButton').prop('disabled', false);
        }

        // Start the fetch interval again after searching
        startFetchInterval();
    });



    // Function to reset table rows display
    function resetTableRowsDisplay() {
        for (var i = 0; i < rows.length; i++) {
            rows[i].style.display = ''; // Reset to show all rows
        }
    }

    // Optional: Reset search and show all rows when input is cleared
    document.getElementById('searchInput').addEventListener('input', function() {
        if (this.value.trim() === '') {
            resetTableRowsDisplay();
            fetchLogs(currentPage); // Fetch logs again when search input is cleared
        }
    });
});

function restrictAndConvertToUpperCase(inputField) {
    // Allow only letters, numbers, and hyphens
    inputField.value = inputField.value.replace(/[^A-Za-z0-9-]/g, '');
    // Convert to uppercase
    inputField.value = inputField.value.toUpperCase();
}

document.addEventListener('DOMContentLoaded', function() {
    var searchInput = document.getElementById('searchInput'); // Specific input field
    // Event listener for input changes
    searchInput.addEventListener('input', function(event) {
        restrictAndConvertToUpperCase(event.target); // Pass the input field to the function
    });
});

