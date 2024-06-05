document.getElementById('email').addEventListener('change', function() {
    var email = this.value.trim();
    if (email === '') {
        console.error('Email is empty');
        return;
    }

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
    xhr.open('GET', '../../../includes/admin/get_address.inc.php?email=' + encodeURIComponent(email), true);
    xhr.send();
});

// Manually trigger the change event if there's a pre-selected value
var preselectedEmail = document.getElementById('email').value.trim();
if (preselectedEmail !== '') {
    var event = new Event('change');
    document.getElementById('email').dispatchEvent(event);
}

//no letters
const wheelInput = document.getElementById("wheel");
[wheelInput].forEach(input => {
    input.addEventListener('input', function(event) {
        const inputValue = event.target.value;
        const sanitizedValue = inputValue.replace(/\D/g, ''); // Remove non-digit characters
        event.target.value = sanitizedValue;
    });
});

//inputs will be converted into uppercase
const plateNumberInput = document.getElementById('plate_number');
// Add event listener to listen for input events
plateNumberInput.addEventListener('input', function() {
    // Convert the input value to uppercase
    this.value = this.value.toUpperCase();
});


(function () {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

    var inputs = document.querySelectorAll('.needs-validation .form-control');
    inputs.forEach(function (input) {
        input.addEventListener('input', function () {
            if (!input.checkValidity()) {
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            }
            input.closest('.form-floating').classList.add('was-validated');
        });
    });

    // Dropdown validation
    var roleDescription = document.getElementById('email');
    roleDescription.addEventListener('change', function () {
        if (roleDescription.value === '') {
            roleDescription.classList.add('is-invalid');
            roleDescription.classList.remove('is-valid');
        } else {
            roleDescription.classList.remove('is-invalid');
            roleDescription.classList.add('is-valid');
        }
        roleDescription.closest('.form-floating').classList.add('was-validated');
    });
})();

setTimeout(() => {
    const alertContainer = document.getElementById('alertContainer');
    if (alertContainer) {
        alertContainer.remove();
    }
}, 3000);