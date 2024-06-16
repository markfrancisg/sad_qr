// function searchTable() {
//     // Get input element and value
//     var input = document.getElementById("searchInput");
//     var filter = input.value.toUpperCase();
//     // Get table body and rows
//     var table = document.getElementById("dataTable");
//     var tbody = table.getElementsByTagName("tbody")[0];
//     var rows = tbody.getElementsByTagName("tr");
//     // Loop through all table rows, hide those that don't match the search query
//     for (var i = 0; i < rows.length; i++) {
//         var cells = rows[i].getElementsByTagName("td");
//         var found = false;
//         for (var j = 0; j < cells.length; j++) {
//             var cell = cells[j];
//             if (cell) {
//                 var txtValue = cell.textContent || cell.innerText;
//                 if (txtValue.toUpperCase().indexOf(filter) > -1) {
//                     found = true;
//                     break;
//                 }
//             }
//         }
//         // Toggle row visibility based on search result
//         rows[i].style.display = found ? "" : "none";
//     }
// }

// // Attach event listener to the search input
// document.getElementById("searchInput").addEventListener("keyup", searchTable);

let originalData = [];

document.addEventListener('DOMContentLoaded', function() {
    const tableBody = document.getElementById('tableBody');
    originalData = [...tableBody.rows].map(row => row.innerHTML); // Store initial table rows

    document.getElementById('searchButton').addEventListener('click', function() {
        const input = document.getElementById('searchInput').value;
        if (input === '') {
            // Restore original data if input is empty
            tableBody.innerHTML = originalData.map(rowHTML => `<tr>${rowHTML}</tr>`).join('');
        } else {
            fetch(`../../../includes/logs_search_daily.inc.php?plate=${encodeURIComponent(input)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.error) {
                        console.error('Error:', data.error);
                        return;
                    }
                    tableBody.innerHTML = ''; // Clear existing rows
                    data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                                <td class="border-bottom-0 text-center">${row.log_name}</td>
                                <td class="border-bottom-0 text-center">${row.log_address}</td>
                                <td class="border-bottom-0 text-center">${row.log_plate_number}</td>
                                <td class="border-bottom-0 text-center">${row.log_vehicle}</td>
                                <td class="border-bottom-0 text-center">${row.entry_log}</td>
                                <td class="border-bottom-0 text-center">${row.exit_log}</td>
                            `;
                        tableBody.appendChild(tr);
                    });
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }
    });

    // Optionally, you can listen for 'input' event to restore table on clearing search input
    document.getElementById('searchInput').addEventListener('input', function() {
        if (this.value === '') {
            tableBody.innerHTML = originalData.map(rowHTML => `<tr>${rowHTML}</tr>`).join('');
        }
    });
});