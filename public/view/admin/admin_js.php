<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var email = $(this).data('email');
            $('#delete-link').attr('href', '../../../includes/admin/account_list.inc.php?email=' + email);
        });
    });



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


    // document.addEventListener('DOMContentLoaded', function() {
    //     var viewLinks = document.querySelectorAll('[data-toggle="modal"]');
    //     viewLinks.forEach(function(link) {
    //         link.addEventListener('click', function(event) {
    //             event.preventDefault(); // Prevent default link behavior

    //             // Extract data from data-id attribute
    //             var data = this.getAttribute('data-id').split(',');

    //             // Format and populate modal with extracted data
    //             document.getElementById('accountIdPlaceholder').textContent = "Account ID: " + data[0]; // Assuming data[0] is account ID

    //             // You can continue formatting and populating other fields similarly
    //         });
    //     });
    // });
</script>