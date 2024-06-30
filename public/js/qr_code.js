function validateAndTransformInput(input) {
    // Replace non-allowed characters and transform to uppercase
    input.value = input.value.replace(/[^a-zA-Z0-9 -]/g, '').toUpperCase();
}

//Prevent spaces to be inputted to the email field
document.getElementById('email').addEventListener('keydown', function(event)
{
    if (event.key === ' ') {
        event.preventDefault();
    }
});

const elements = document.querySelectorAll('#email, #plate_number, #vehicle_type, #vehicle_color');
elements.forEach(function(element) {
    element.addEventListener('keydown', function(event) {
        if (event.key === ' ' && element.value === '') {
            event.preventDefault();
        }
    });
});

// prevent multiple consecutive spaces in fields
document.addEventListener('DOMContentLoaded', () => {
    const typeField = document.getElementById('vehicle_type');
    const colorField = document.getElementById('vehicle_color');
    

    // Add event listeners and validation logic for each input field
    typeField.addEventListener('input', () => {
        const value = typeField.value;

        // Replace consecutive spaces with a single space
        typeField.value = value.replace(/\s{2,}/g, ' ');
    });

    colorField.addEventListener('input', () => {
        const value = colorField.value;

        // Replace consecutive spaces with a single space
        colorField.value = value.replace(/\s{2,}/g, ' ');
    });
});











// This is for fetching the email and the address -----------------------------------------

// -------------------------------------------------------------------------------------------------
(function () {
    'use strict';

    var forms = document.querySelectorAll('.needs-validation');
    var submitButton = document.querySelector('button[type="submit"]');
    var formSubmitted = false;

    function toggleSubmitButton(form) {
        if (form.checkValidity()) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                formSubmitted = true;
                submitButton.disabled = true; // Disable button on form submission
            }
            form.classList.add('was-validated');
        }, false);

        form.addEventListener('input', function () {
            toggleSubmitButton(form);
        });
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

    // Email validation and address fetching
    var emails = [];
    $('#emailOptions option').each(function () {
        emails.push($(this).val());
    });

    $('#email').on('input', function () {
        var inputVal = $(this).val();
        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|org|ph)$/;
        var feedback = document.getElementById('emailFeedback');

        if (inputVal === '') {
            this.setCustomValidity('Email is required');
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            feedback.textContent = 'Email is required';
        } else if (!emailPattern.test(inputVal) || !emails.includes(inputVal)) {
            this.setCustomValidity('Invalid or unrecognized email');
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            feedback.textContent = 'Invalid or unrecognized email';
        } else {
            this.setCustomValidity('');
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            feedback.textContent = '';
            fetchUserInfo(inputVal); // Fetch user information
        }
        toggleSubmitButton(this.closest('form'));
        this.closest('.form-floating').classList.add('was-validated');
    });

    $('#email').on('blur', function () {
        var inputVal = $(this).val();
        if (!emails.includes(inputVal)) {
            $(this).val('');
            $(this).removeClass('is-valid').addClass('is-invalid');
        }
        toggleSubmitButton(this.closest('form'));
    });

    // Fetch address based on email input
    document.getElementById('email').addEventListener('input', function () {
        var email = this.value.trim();

        if (email === '') {
            document.getElementById('name').value = '';
            return;
        }

        fetchUserInfo(email);
    });

    // Fetch user information based on email input
    function fetchUserInfo(email) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response === 'NOT_FOUND') {
                        document.getElementById('name').value = '';
                    } else {
                        document.getElementById('name').value = response;
                    }
                } else {
                    console.error('Failed to fetch address: ' + xhr.status);
                }
            }
        };
        xhr.open('GET', '../../../includes/admin/get_homeowner_name.inc.php?email=' + encodeURIComponent(email), true);
        xhr.send();
    }

    var preselectedEmail = document.getElementById('email').value.trim();
    if (preselectedEmail !== '') {
        var event = new Event('change');
        document.getElementById('email').dispatchEvent(event);
    }

    // Fetch address based on email input
    document.getElementById('email').addEventListener('input', function () {
        var email = this.value.trim();

        if (email === '') {
            document.getElementById('address').value = '';
            return;
        }

        fetchAddress(email);
    });

    function fetchAddress(email) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response === 'NOT_FOUND') {
                        document.getElementById('address').value = '';
                    } else {
                        document.getElementById('address').value = response;
                    }
                } else {
                    console.error('Failed to fetch address: ' + xhr.status);
                }
            }
        };
        xhr.open('GET', '../../../includes/admin/get_address.inc.php?email=' + encodeURIComponent(email), true);
        xhr.send();
    }

    var preselectedEmail = document.getElementById('email').value.trim();
    if (preselectedEmail !== '') {
        var event = new Event('change');
        document.getElementById('email').dispatchEvent(event);
    }

    // Plate number validation
    document.getElementById('plate_number').addEventListener('input', function () {
        var plateNumberInput = this;
        var plateNumber = plateNumberInput.value.toUpperCase();
        var feedback = document.getElementById('plateFeedback');
        var platePattern = /^(?:[A-Z]{3}-\d{3}|[A-Z]{3}-\d{2}|[A-Z]{3}-(?!0000)\d{4}|[A-Z]{2}-\d{4})$/;
        
        if (plateNumber === '') {
            this.setCustomValidity('Plate number is required');
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            feedback.textContent = 'Plate number is required';
        } else if (!platePattern.test(plateNumber)) {
            plateNumberInput.setCustomValidity('Invalid plate number format');
            plateNumberInput.classList.add('is-invalid');
            plateNumberInput.classList.remove('is-valid');
            feedback.textContent = 'Invalid plate number format';
        } else {
            $.ajax({
                url: '../../../includes/plate_number_check.php',
                method: 'POST',
                data: { plate_number: plateNumber },
                success: function (response) {
                    if (response === 'taken') {
                        plateNumberInput.setCustomValidity('Plate number is already taken');
                        plateNumberInput.classList.add('is-invalid');
                        plateNumberInput.classList.remove('is-valid');
                        feedback.textContent = 'Plate number is already taken';
                    } else {
                        plateNumberInput.setCustomValidity('');
                        plateNumberInput.classList.remove('is-invalid');
                        plateNumberInput.classList.add('is-valid');
                        feedback.textContent = ''; // Clear feedback message when plate number is valid
                    }
                    toggleSubmitButton(plateNumberInput.closest('form'));
                },
                error: function (xhr, status, error) {
                    console.error('Error checking plate number:', error);
                }
            });
        }
        plateNumberInput.closest('.form-floating').classList.add('was-validated');
    });

})();
















// //no letters
// const wheelInput = document.getElementById("wheel");
// [wheelInput].forEach(input => {
//     input.addEventListener('input', function(event) {
//         const inputValue = event.target.value;
//         const sanitizedValue = inputValue.replace(/\D/g, ''); // Remove non-digit characters
//         event.target.value = sanitizedValue;
//     });
// });

// //inputs will be converted into uppercase
// const plateNumberInput = document.getElementById('plate_number');
// // Add event listener to listen for input events
// plateNumberInput.addEventListener('input', function() {
//     // Convert the input value to uppercase
//     this.value = this.value.toUpperCase();
// });




// (function () {
//     'use strict';
//     var forms = document.querySelectorAll('.needs-validation');
//     var submitButton = document.querySelector('button[type="submit"]');

//     function toggleSubmitButton(form) {
//         if (form.checkValidity()) {
//             submitButton.disabled = false;
//         } else {
//             submitButton.disabled = true;
//         }
//     }

//     Array.prototype.slice.call(forms)
//         .forEach(function (form) {
//             form.addEventListener('submit', function (event) {
//                 if (!form.checkValidity()) {
//                     event.preventDefault();
//                     event.stopPropagation();
//                 }
//                 form.classList.add('was-validated');
//             }, false);

//             form.addEventListener('input', function () {
//                 toggleSubmitButton(form);
//             });
//         });

//     var inputs = document.querySelectorAll('.needs-validation .form-control');
//     inputs.forEach(function (input) {
//         input.addEventListener('input', function () {
//             if (!input.checkValidity()) {
//                 input.classList.add('is-invalid');
//             } else {
//                 input.classList.remove('is-invalid');
//                 input.classList.add('is-valid');
//             }
//             input.closest('.form-floating').classList.add('was-validated');
//         });
//     });

//    document.getElementById('plate_number').addEventListener('input', function () {
//        var plateNumberInput = this;
//        var plate_number = plateNumberInput.value;
//        var feedback = document.getElementById('plateFeedback');

//        if (plate_number === '') {
//            plateNumberInput.setCustomValidity('Plate number is required');
//            plateNumberInput.classList.add('is-invalid');
//            plateNumberInput.classList.remove('is-valid');
//            feedback.textContent = 'Plate number is required';
//        }  else {
//            $.ajax({
//                url: '../../../includes/plate_number_check.php',
//                method: 'POST',
//                data: { plate_number: plate_number },
//                success: function (response) {
//                    if (response == 'taken') {
//                        plateNumberInput.setCustomValidity('Already registered');
//                        plateNumberInput.classList.add('is-invalid');
//                        plateNumberInput.classList.remove('is-valid');
//                        feedback.textContent = 'Already registered';
//                    } else {
//                        plateNumberInput.setCustomValidity('');
//                        plateNumberInput.classList.remove('is-invalid');
//                        plateNumberInput.classList.add('is-valid');
//                        feedback.textContent = ''; // Clear feedback message when email is valid
//                    }
//                    toggleSubmitButton(plateNumberInput.closest('form'));
//                }
//            });
//        }

//        plateNumberInput.closest('.form-floating').classList.add('was-validated');
//    });
// })();
