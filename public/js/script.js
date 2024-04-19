
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var email = $(this).data('email');
            $('#delete-link').attr('href', '../../../includes/admin/account_list.inc.php?email=' + email);
        });
    });

    $(document).ready(function() {
        $('.pay-option').click(function() {
            var qr_id = $(this).data('qr'); // Assuming the data attribute is 'data-qr'
            $('#pay-link').attr('href', '../../../includes/admin/balance_pay.inc.php?qr_id=' + qr_id);
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

    // const spinnerWrapperEl = document.querySelector('.spinner-wrapper');
    // if (spinnerWrapperEl) {
    //     window.addEventListener('load', () => {
    //         spinnerWrapperEl.style.opacity = '0';
    //         setTimeout(() => {
    //             spinnerWrapperEl.style.display = 'none';
    //         }, 200);
    //     });
    // } else {
    //     console.warn("Element with class 'spinner-wrapper' not found.");
    // }
