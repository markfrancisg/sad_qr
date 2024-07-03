
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


//this enables the user to keep track of newly added logs every 2 minutes, this will reload the page
setInterval(function() {
    location.reload();
}, 2 * 60 * 1000); // Reload every 2 minutes (2 * 60 * 1000 milliseconds)