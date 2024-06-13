const specialInputs = document.querySelectorAll('#first_name, #last_name');
specialInputs.forEach(function(input) {
  input.addEventListener('keydown', function(event) {
    if (!(/[a-zA-Z\s]/).test(event.key)) {
      event.preventDefault();
    }
  });
});

const numberInput = document.getElementById("number");
[numberInput].forEach(input => {
    input.addEventListener('input', function(event) {
        const inputValue = event.target.value;
        const sanitizedValue = inputValue.replace(/\D/g, ''); // Remove non-digit characters
        event.target.value = sanitizedValue;
    });
});

setTimeout(() => {
    const alertContainer = document.getElementById('alertContainer');
    if (alertContainer) {
        alertContainer.remove();
    }
}, 3000);


// (function () {
//     'use strict';
//     var forms = document.querySelectorAll('.needs-validation');
//     Array.prototype.slice.call(forms)
//         .forEach(function (form) {
//             form.addEventListener('submit', function (event) {
//                 if (!form.checkValidity()) {
//                     event.preventDefault();
//                     event.stopPropagation();
//                 }
//                 form.classList.add('was-validated');
//             }, false);
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

//     // Dropdown validation
//     var roleDescription = document.getElementById('role_description');
//     roleDescription.addEventListener('change', function () {
//         if (roleDescription.value === '') {
//             roleDescription.classList.add('is-invalid');
//             roleDescription.classList.remove('is-valid');
//         } else {
//             roleDescription.classList.remove('is-invalid');
//             roleDescription.classList.add('is-valid');
//         }
//         roleDescription.closest('.form-floating').classList.add('was-validated');
//     });
// })();

// // Phone number validation
// document.getElementById('number').addEventListener('input', function() {
//     var phoneNumberInput = this;
//     var phoneNumber = phoneNumberInput.value;
//     var phoneNumberPattern = /^09\d{9}$/;  // Philippine phone number pattern
//     var feedback = document.getElementById('numberFeedback');

//     if (phoneNumber === '') {
//         phoneNumberInput.setCustomValidity('Phone number is required');
//         phoneNumberInput.classList.add('is-invalid');
//         phoneNumberInput.classList.remove('is-valid');
//         feedback.textContent = 'Phone number is required';
//     } else if (!phoneNumberPattern.test(phoneNumber)) {
//         phoneNumberInput.setCustomValidity('Invalid phone number format.');
//         phoneNumberInput.classList.add('is-invalid');
//         phoneNumberInput.classList.remove('is-valid');
//         feedback.textContent = 'Invalid phone number format.';
//     } else {
//         phoneNumberInput.setCustomValidity('');
//         phoneNumberInput.classList.remove('is-invalid');
//         phoneNumberInput.classList.add('is-valid');
//         feedback.textContent = 'Phone number is required';
//     }

//     phoneNumberInput.closest('.form-floating').classList.add('was-validated');
// });

// document.getElementById('email').addEventListener('input', function() {
//     var emailInput = this;
//     var email = emailInput.value;
//     var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|org|ph)$/;  // Email pattern
//     var feedback = document.getElementById('emailFeedback');

//     if (email === '') { // Check if email is empty or contains only whitespace
//         emailInput.setCustomValidity('Email is required');
//         emailInput.classList.add('is-invalid');
//         emailInput.classList.remove('is-valid');
//         feedback.textContent = 'Email is required';
//     } else if (!emailPattern.test(email)) {
//         emailInput.setCustomValidity('Invalid email format');
//         emailInput.classList.add('is-invalid');
//         emailInput.classList.remove('is-valid');
//         feedback.textContent = 'Invalid email format.';
//     } else {
//         $.ajax({
//             url: '../../../includes/account_check_email.php',
//             method: 'POST',
//             data: { email: email },
//             success: function(response) {
//                 if (response == 'taken') {
//                     emailInput.setCustomValidity('Email is already taken');
//                     emailInput.classList.add('is-invalid');
//                     emailInput.classList.remove('is-valid');
//                     feedback.textContent = 'Email is already taken';
//                 } else {
//                     emailInput.setCustomValidity('');
//                     emailInput.classList.remove('is-invalid');
//                     emailInput.classList.add('is-valid');
//                     feedback.textContent = ''; // Clear feedback message when email is valid
//                 }
//             }
//         });
//     }

//     emailInput.closest('.form-floating').classList.add('was-validated');
// });


(function () {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
    var submitButton = document.querySelector('button[type="submit"]');

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

    // Dropdown validation
    var roleDescription = document.getElementById('role_description');
    roleDescription.addEventListener('change', function () {
        if (roleDescription.value === '') {
            roleDescription.classList.add('is-invalid');
            roleDescription.classList.remove('is-valid');
        } else {
            roleDescription.classList.remove('is-invalid');
            roleDescription.classList.add('is-valid');
        }
        roleDescription.closest('.form-floating').classList.add('was-validated');
        toggleSubmitButton(roleDescription.closest('form'));
    });

    // Phone number validation
    document.getElementById('number').addEventListener('input', function () {
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
            phoneNumberInput.setCustomValidity('Invalid phone number format.');
            phoneNumberInput.classList.add('is-invalid');
            phoneNumberInput.classList.remove('is-valid');
            feedback.textContent = 'Invalid phone number format.';
        } else {
            phoneNumberInput.setCustomValidity('');
            phoneNumberInput.classList.remove('is-invalid');
            phoneNumberInput.classList.add('is-valid');
            feedback.textContent = 'Phone number is required';
        }

        phoneNumberInput.closest('.form-floating').classList.add('was-validated');
        toggleSubmitButton(phoneNumberInput.closest('form'));
    });

    // Email validation
    document.getElementById('email').addEventListener('input', function () {
        var emailInput = this;
        var email = emailInput.value;
        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|org|ph)$/;  // Email pattern
        var feedback = document.getElementById('emailFeedback');

        if (email === '') {
            emailInput.setCustomValidity('Email is required');
            emailInput.classList.add('is-invalid');
            emailInput.classList.remove('is-valid');
            feedback.textContent = 'Email is required';
        } else if (!emailPattern.test(email)) {
            emailInput.setCustomValidity('Invalid email format');
            emailInput.classList.add('is-invalid');
            emailInput.classList.remove('is-valid');
            feedback.textContent = 'Invalid email format.';
        } else {
            $.ajax({
                url: '../../../includes/account_check_email.php',
                method: 'POST',
                data: { email: email },
                success: function (response) {
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