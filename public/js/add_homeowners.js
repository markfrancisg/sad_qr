// const specialInputs = document.querySelectorAll('#first_name, #last_name');
// specialInputs.forEach(function(input) {
//   input.addEventListener('keydown', function(event) {
//     if (!(/[a-zA-Z\s]/).test(event.key)) {
//       event.preventDefault();
//     }
//   });
// });

// const numberInput = document.getElementById("number");
// const blockInput = document.getElementById("block");
// const lotInput = document.getElementById("lot");

// [numberInput, blockInput, lotInput].forEach(input => {
//     input.addEventListener('input', function(event) {
//         const inputValue = event.target.value;
//         const sanitizedValue = inputValue.replace(/\D/g, ''); // Remove non-digit characters
//         event.target.value = sanitizedValue;
//     });
// });

// const streetInput = document.getElementById("street");
// streetInput.addEventListener('input', function(event) {
//     const inputValue = event.target.value;
//     const sanitizedValue = inputValue.replace(/[^a-zA-Z0-9\s]/g, ''); // Remove characters except letters, numbers, and spaces
//     event.target.value = sanitizedValue;
// });

// setTimeout(() => {
//     const alertContainer = document.getElementById('alertContainer');
//     if (alertContainer) {
//         alertContainer.remove();
//     }
// }, 3000);



// (function () {
//     'use strict';
//     var forms = document.querySelectorAll('.needs-validation');
//     var submitButton = document.querySelector('button[type="submit"]');
//     var formSubmitted = false;

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
//                 }else {
//                     formSubmitted = true;
//                     submitButton.disabled = true; // Disable button on form submission
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

//     document.getElementById('first_name').addEventListener('input', function () {
//         var firstNameInput = this;
//         var firstName = firstNameInput.value; // Do not trim here
//         var trimmedFirstName = firstName.trim(); // Trim the value after checking for leading spaces
//         var feedback = document.getElementById('firstNameFeedback');
//         var namePattern = /^[A-Za-z\s]+$/; // Pattern to match alphabetic characters and spaces
    
//         if (trimmedFirstName === '') {
//             firstNameInput.setCustomValidity('First name is required');
//             firstNameInput.classList.add('is-invalid');
//             firstNameInput.classList.remove('is-valid');
//             feedback.textContent = 'First name is required';
//         } else if (!namePattern.test(trimmedFirstName) || firstName.startsWith(' ')) {
//             firstNameInput.setCustomValidity('Invalid format');
//             firstNameInput.classList.add('is-invalid');
//             firstNameInput.classList.remove('is-valid');
//             feedback.textContent = 'Invalid format';
//         } else {
//             firstNameInput.setCustomValidity('');
//             firstNameInput.classList.remove('is-invalid');
//             firstNameInput.classList.add('is-valid');
//             feedback.textContent = 'First name is required';
//         }
    
//         firstNameInput.closest('.form-floating').classList.add('was-validated');
//         toggleSubmitButton(firstNameInput.closest('form'));
//     });
    
//     document.getElementById('last_name').addEventListener('input', function () {
//         var lastNameInput = this;
//         var lastName = lastNameInput.value; // Do not trim here
//         var trimmedLastName = lastName.trim(); // Trim the value after checking for leading spaces
//         var feedback = document.getElementById('lastNameFeedback');
//         var namePattern = /^[A-Za-z\s]+$/; // Pattern to match alphabetic characters and spaces
    
//         if (trimmedLastName === '') {
//             lastNameInput.setCustomValidity('Last name is required');
//             lastNameInput.classList.add('is-invalid');
//             lastNameInput.classList.remove('is-valid');
//             feedback.textContent = 'Last name is required';
//         } else if (!namePattern.test(trimmedLastName) || lastName.startsWith(' ')) {
//             lastNameInput.setCustomValidity('Invalid format');
//             lastNameInput.classList.add('is-invalid');
//             lastNameInput.classList.remove('is-valid');
//             feedback.textContent = 'Invalid format';
//         } else {
//             lastNameInput.setCustomValidity('');
//             lastNameInput.classList.remove('is-invalid');
//             lastNameInput.classList.add('is-valid');
//             feedback.textContent = 'Last name is required';
//         }
    
//         lastNameInput.closest('.form-floating').classList.add('was-validated');
//         toggleSubmitButton(lastNameInput.closest('form'));
//     });
    
//     document.getElementById('street').addEventListener('input', function () {
//         var streetInput = this;
//         var street = streetInput.value; // Do not trim here
//         var trimmedStreet = street.trim(); // Trim the value after checking for leading spaces
//         var feedback = document.getElementById('streetFeedback');
//         var streetPattern = /^[A-Za-z\s]+$/; // Pattern to match alphabetic characters and spaces
    
//         if (trimmedStreet === '') {
//             streetInput.setCustomValidity('Street is required');
//             streetInput.classList.add('is-invalid');
//             streetInput.classList.remove('is-valid');
//             feedback.textContent = 'Street is required';
//         } else if (!streetPattern.test(trimmedStreet) || street.startsWith(' ')) {
//             streetInput.setCustomValidity('Invalid format');
//             streetInput.classList.add('is-invalid');
//             streetInput.classList.remove('is-valid');
//             feedback.textContent = 'Invalid format';
//         } else {
//             streetInput.setCustomValidity('');
//             streetInput.classList.remove('is-invalid');
//             streetInput.classList.add('is-valid');
//             feedback.textContent = 'Street is required';
//         }
    
//         streetInput.closest('.form-floating').classList.add('was-validated');
//         toggleSubmitButton(streetInput.closest('form'));
//     });

//     // Phone number validation
//     document.getElementById('number').addEventListener('input', function () {
//         var phoneNumberInput = this;
//         var phoneNumber = phoneNumberInput.value;
//         var phoneNumberPattern = /^09\d{9}$/;  // Philippine phone number pattern
//         var feedback = document.getElementById('numberFeedback');

//         if (phoneNumber === '') {
//             phoneNumberInput.setCustomValidity('Phone number is required');
//             phoneNumberInput.classList.add('is-invalid');
//             phoneNumberInput.classList.remove('is-valid');
//             feedback.textContent = 'Phone number is required';
//         } else if (!phoneNumberPattern.test(phoneNumber)) {
//             phoneNumberInput.setCustomValidity('Invalid phone number format.');
//             phoneNumberInput.classList.add('is-invalid');
//             phoneNumberInput.classList.remove('is-valid');
//             feedback.textContent = 'Invalid phone number format.';
//         } else {
//             phoneNumberInput.setCustomValidity('');
//             phoneNumberInput.classList.remove('is-invalid');
//             phoneNumberInput.classList.add('is-valid');
//             feedback.textContent = 'Phone number is required';
//         }

//         phoneNumberInput.closest('.form-floating').classList.add('was-validated');
//         toggleSubmitButton(phoneNumberInput.closest('form'));

//     });

//     document.getElementById('email').addEventListener('input', function () {
//         var emailInput = this;
//         var originalEmail = emailInput.value; // Save the original value
//         var trimmedEmail = originalEmail.trim(); // Trim the value
//         var feedback = document.getElementById('emailFeedback');
//         var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|org|ph)$/;  // Email pattern
    
//         if (trimmedEmail === "") {
//             emailInput.setCustomValidity('Email is required');
//             emailInput.classList.add('is-invalid');
//             emailInput.classList.remove('is-valid');
//             feedback.textContent = 'Email is required';
//         } else if (trimmedEmail !== originalEmail || !emailPattern.test(trimmedEmail)) {
//             emailInput.setCustomValidity('Invalid email format');
//             emailInput.classList.add('is-invalid');
//             emailInput.classList.remove('is-valid');
//             feedback.textContent = 'Invalid email format.';
//         } else {
//             $.ajax({
//                 url: '../../../includes/homeowner_check_email.php',
//                 method: 'POST',
//                 data: { email: trimmedEmail },
//                 success: function (response) {
//                     if (response == 'taken') {
//                         emailInput.setCustomValidity('Email is already taken');
//                         emailInput.classList.add('is-invalid');
//                         emailInput.classList.remove('is-valid');
//                         feedback.textContent = 'Email is already taken';
//                     } else {
//                         emailInput.setCustomValidity('');
//                         emailInput.classList.remove('is-invalid');
//                         emailInput.classList.add('is-valid');
//                         feedback.textContent = ''; // Clear feedback message when email is valid
//                     }
//                     toggleSubmitButton(emailInput.closest('form'));
//                 }
//             });
//         }
    
//         emailInput.closest('.form-floating').classList.add('was-validated');
//     });
    
// })();
