<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var email = $(this).data('email');
            $('#delete-link').attr('href', '../../../includes/admin/account_list.inc.php?email=' + email);
        });
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