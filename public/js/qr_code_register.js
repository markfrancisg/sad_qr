document.getElementById('dropdownMenu').addEventListener('change', function() {
    var email = this.value;
    // Send AJAX request to fetch address from server
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var address = xhr.responseText;
                document.getElementById('address').value = address;
            } else {
                console.error('Failed to fetch address: ' + xhr.status);
            }
        }
    };
    xhr.open('GET', '../../../includes/admin/get_address.inc.php?email=' + email, true);
    xhr.send();
});
