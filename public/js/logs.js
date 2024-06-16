
// If search is empty, prevent submit
document.getElementById('searchForm').addEventListener('submit', function(event) {
    var searchInput = document.getElementById('searchInput').value.trim();
    if (searchInput === '') {
        event.preventDefault(); // Prevent form submission
    }
});