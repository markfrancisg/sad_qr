$(document).ready(function() {
    load_data();

    function load_data(query) {
        $.ajax({
            url: "../../../includes/guard/manual_search.inc.php",
            method: "post",
            data: {
                query: query
            },
            success: function(data) {
                $('#result').html(data);
            }
        });
    }

    $('#search_text').keyup(function() {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        } else {
            load_data();
        }
    });
});


const plateNumberInput = document.getElementById('search_text');

// Add event listener to listen for input events
plateNumberInput.addEventListener('input', function() {
    this.value = this.value.toUpperCase();

    // Convert the input value to uppercase
    this.value = this.value.replace(/[^A-Z0-9\- ]/g, '');
});