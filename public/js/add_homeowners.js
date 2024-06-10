const specialInputs = document.querySelectorAll('#first_name, #last_name');
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
})();

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
});

document.getElementById('email').addEventListener('input', function() {
    var emailInput = this;
    var email = emailInput.value;
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|org|ph)$/;  // Email pattern
    var feedback = document.getElementById('emailFeedback');

    if (email === '') { // Check if email is empty or contains only whitespace
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
            url: '../../../includes/homeowner_check_email.php',
            method: 'POST',
            data: { email: email },
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
            }
        });
    }

    emailInput.closest('.form-floating').classList.add('was-validated');
});


















// (function () {
//     'use strict';
//     var forms = document.querySelectorAll('.needs-validation');
//     Array.prototype.slice.call(forms)
//         .forEach(function (form) {
//             form.addEventListener('input', function (event) {
//                 if (!form.checkValidity()) {
//                     event.preventDefault();
//                     event.stopPropagation();
//                 }
//                 form.classList.add('was-validated');
//             }, false);
//         });
// })();

// // Phone number validation
// document.getElementById('number').addEventListener('input', function() {
//     var phoneNumberInput = this;
//     var phoneNumber = phoneNumberInput.value;
//     var phoneNumberPattern = /^09\d{9}$/;  // Philippine phone number pattern

//     if (!phoneNumberPattern.test(phoneNumber)) {
//         phoneNumberInput.setCustomValidity('Invalid phone number');
//         phoneNumberInput.classList.add('is-invalid');
//     } else {
//         phoneNumberInput.setCustomValidity('');
//         phoneNumberInput.classList.remove('is-invalid');
//     }

//     phoneNumberInput.closest('.form-floating').classList.add('was-validated');
// });

// // Email validation
// document.getElementById('email').addEventListener('input', function() {
//     var emailInput = this;
//     var email = emailInput.value;
//     var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|org|ph)$/;  // Email pattern

//     if (!emailPattern.test(email)) {
//         emailInput.setCustomValidity('Invalid email domain');
//         emailInput.classList.add('is-invalid');
//     } else {
//         emailInput.setCustomValidity('');
//         emailInput.classList.remove('is-invalid');
//     }

//     emailInput.closest('.form-floating').classList.add('was-validated');
// });



// (function () {
//     'use strict';
//     var forms = document.querySelectorAll('.needs-validation');
//     Array.prototype.slice.call(forms)
//         .forEach(function (form) {
//             // Add submit event listener to the form
//             form.addEventListener('submit', function (event) {
//                 if (!form.checkValidity()) {
//                     event.preventDefault();
//                     event.stopPropagation();
//                 }

//                 // Validate email domain
//                 var emailInput = form.querySelector('#email');
//                 var email = emailInput.value;
//                 var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|org|ph)$/;  // Email pattern

//                 if (!emailPattern.test(email)) {
//                     emailInput.setCustomValidity('Invalid email domain');
//                     emailInput.classList.add('is-invalid');
//                 } else {
//                     emailInput.setCustomValidity('');
//                     emailInput.classList.remove('is-invalid');
//                 }

//                 // Validate Philippine phone number format
//                 var phoneNumberInput = form.querySelector('#number');
//                 var phoneNumber = phoneNumberInput.value;
//                 var phoneNumberPattern = /^09\d{9}$/;  // Philippine phone number pattern

//                 if (!phoneNumberPattern.test(phoneNumber)) {
//                     phoneNumberInput.setCustomValidity('Invalid Philippine phone number format');
//                     phoneNumberInput.classList.add('is-invalid');
//                 } else {
//                     phoneNumberInput.setCustomValidity('');
//                     phoneNumberInput.classList.remove('is-invalid');
//                 }

//                 // Add 'was-validated' class to the form
//                 form.classList.add('was-validated');
//             });

//             // Add input event listeners to email and number fields for dynamic validation
//             var emailInput = form.querySelector('#email');
//             emailInput.addEventListener('input', function () {
//                 // Clear previous error state
//                 this.setCustomValidity('');
//                 this.classList.remove('is-invalid');

//                 // Validate email domain
//                 var email = this.value;
//                 var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|org|ph)$/;  // Email pattern
//                 if (!emailPattern.test(email)) {
//                     this.setCustomValidity('Invalid email domain');
//                     this.classList.add('is-invalid');
//                 }
//             });

//             var phoneNumberInput = form.querySelector('#number');
//             phoneNumberInput.addEventListener('input', function () {
//                 // Clear previous error state
//                 this.setCustomValidity('');
//                 this.classList.remove('is-invalid');

//                 // Validate Philippine phone number format
//                 var phoneNumber = this.value;
//                 var phoneNumberPattern = /^09\d{9}$/;  // Philippine phone number pattern
//                 if (!phoneNumberPattern.test(phoneNumber)) {
//                     this.setCustomValidity('Invalid Philippine phone number format');
//                     this.classList.add('is-invalid');
//                 }
//             });
//         });
// })();




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
// })();

// // Phone number validation
// document.getElementById('number').addEventListener('submit', function() {
//     var phoneNumberInput = this;
//     var phoneNumber = phoneNumberInput.value;
//     var phoneNumberPattern = /^09\d{9}$/;  // Philippine phone number pattern

//     if (!phoneNumberPattern.test(phoneNumber)) {
//         phoneNumberInput.setCustomValidity('Invalid phone number');
//         phoneNumberInput.classList.add('is-invalid');
//     } else {
//         phoneNumberInput.setCustomValidity('');
//         phoneNumberInput.classList.remove('is-invalid');
//     }

//     phoneNumberInput.form.classList.add('was-validated');
// });

// // Email validation
// document.getElementById('email').addEventListener('submit', function() {
//     var emailInput = this;
//     var email = emailInput.value;
//     var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|org|ph)$/;  // Email pattern

//     if (!emailPattern.test(email)) {
//         emailInput.setCustomValidity('Invalid email');
//         emailInput.classList.add('is-invalid');
//     } else {
//         emailInput.setCustomValidity('');
//         emailInput.classList.remove('is-invalid');
//     }

//     emailInput.form.classList.add('was-validated');
// });