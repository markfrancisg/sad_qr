const specialInputs = document.querySelectorAll('#first_name,#middle_name, #last_name');
specialInputs.forEach(function(input) {
  input.addEventListener('keydown', function(event) {
    if (!(/[a-zA-Z\s]/).test(event.key)) {
      event.preventDefault();
    }
  });
});

const numberInput = document.getElementById("number");
const blockInput = document.getElementById("block");
const lotInput = document.getElementById("lot");

[numberInput, blockInput, lotInput].forEach(input => {
    input.addEventListener('input', function(event) {
        const inputValue = event.target.value;
        const sanitizedValue = inputValue.replace(/\D/g, ''); // Remove non-digit characters
        event.target.value = sanitizedValue;
    });
});

const streetInput = document.getElementById("street");
streetInput.addEventListener('input', function(event) {
    const inputValue = event.target.value;
    const sanitizedValue = inputValue.replace(/[^a-zA-Z0-9\s]/g, ''); // Remove characters except letters, numbers, and spaces
    event.target.value = sanitizedValue;
});

setTimeout(() => {
    const alertContainer = document.getElementById('alertContainer');
    if (alertContainer) {
        alertContainer.remove();
    }
}, 3000);

const elements = document.querySelectorAll('#email, #first_name,#middle_name, #last_name, #street, #number, #block, #lot');
elements.forEach(function(element) {
    element.addEventListener('keydown', function(event) {
        if (event.key === ' ' && element.value === '') {
            event.preventDefault();
        }
    });
});


//Prevent spaces to be inputted to the email field
document.getElementById('email').addEventListener('keydown', function(event)
{
    if (event.key === ' ') {
        event.preventDefault();
    }
});


// prevent multiple consecutive spaces in fields
document.addEventListener('DOMContentLoaded', () => {
    const firstNameField = document.getElementById('first_name');
    const middleNameField = document.getElementById('middle_name');
    const lastNameField = document.getElementById('last_name');
    const streetField = document.getElementById('street');


    // Add event listeners and validation logic for each input field
    firstNameField.addEventListener('input', () => {
        const value = firstNameField.value;

        // Replace consecutive spaces with a single space
        firstNameField.value = value.replace(/\s{2,}/g, ' ');
    });

    middleNameField.addEventListener('input', () => {
        const value = middleNameField.value;

        // Replace consecutive spaces with a single space
        middleNameField.value = value.replace(/\s{2,}/g, ' ');
    });

    lastNameField.addEventListener('input', () => {
        const value = lastNameField.value;

        // Replace consecutive spaces with a single space
        lastNameField.value = value.replace(/\s{2,}/g, ' ');
    });

    streetField.addEventListener('input', () => {
        const value = streetField.value;

        // Replace consecutive spaces with a single space
        streetField.value = value.replace(/\s{2,}/g, ' ');
    });
});




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

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }else {
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


// Phone number validation
document.getElementById('number').addEventListener('input', function() {
    var phoneNumberInput = this;
    var phoneNumber = phoneNumberInput.value;
    var phoneNumberPattern = /^09\d{9}$/;  // Philippine phone number pattern
    var feedback = document.getElementById('numberFeedback');

    if (phoneNumber === '') {
        phoneNumberInput.setCustomValidity('Phone number is required');
        phoneNumberInput.classList.add('is-invalid');
        phoneNumberInput.classList.remove('is-valid');
        feedback.textContent = 'Phone number is required';
    } else if (!phoneNumberPattern.test(phoneNumber)) {
        phoneNumberInput.setCustomValidity('Invalid format. Follow [09XXXXXXXXX]');
        phoneNumberInput.classList.add('is-invalid');
        phoneNumberInput.classList.remove('is-valid');
        feedback.textContent = 'Invalid format. Follow [09XXXXXXXXX]';
    } else {
        phoneNumberInput.setCustomValidity('');
        phoneNumberInput.classList.remove('is-invalid');
        phoneNumberInput.classList.add('is-valid');
        feedback.textContent = 'Phone number is required';
    }

    phoneNumberInput.closest('.form-floating').classList.add('was-validated');
        toggleSubmitButton(phoneNumberInput.closest('form'));
});

document.getElementById('email').addEventListener('input', function() {
    var emailInput = this;
    var email = emailInput.value.trim(); // Trim leading and trailing whitespace
    var currentEmail = document.getElementById('old_email').value.toLowerCase(); // Get current email from hidden input
    var enteredEmail = email.toLowerCase(); // Convert entered email to lowercase
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|org|ph)$/;  // Email pattern
    var feedback = document.getElementById('emailFeedback');

    if (enteredEmail === '') { // Check if email is empty after trimming
        emailInput.setCustomValidity('Email is required');
        emailInput.classList.add('is-invalid');
        emailInput.classList.remove('is-valid');
        feedback.textContent = 'Email is required';
    } else if (!emailPattern.test(enteredEmail)) {
        emailInput.setCustomValidity('Invalid email format');
        emailInput.classList.add('is-invalid');
        emailInput.classList.remove('is-valid');
        feedback.textContent = 'Invalid email format.';
    } else if (enteredEmail === currentEmail) {
        // If the entered email is the same as the current email,
        // treat it as valid without checking its availability
        emailInput.setCustomValidity('');
        emailInput.classList.remove('is-invalid');
        emailInput.classList.add('is-valid');
        feedback.textContent = ''; // Clear feedback message when email is valid
    } else {
        $.ajax({
            url: '../../../includes/homeowner_check_email.php',
            method: 'POST',
            data: { email: enteredEmail }, // Use enteredEmail for the AJAX request
            success: function(response) {
                if (response == 'taken') {
                    emailInput.setCustomValidity('Email is already taken');
                    emailInput.classList.add('is-invalid');
                    emailInput.classList.remove('is-valid');
                    feedback.textContent = 'Email is already taken';
                } else {
                    emailInput.setCustomValidity('');
                    emailInput.classList.remove('is-invalid');
                    emailInput.classList.add('is-valid');
                    feedback.textContent = ''; // Clear feedback message when email is valid
                }
                toggleSubmitButton(emailInput.closest('form'));
            }
        });
    }

    emailInput.closest('.form-floating').classList.add('was-validated');
});
})();