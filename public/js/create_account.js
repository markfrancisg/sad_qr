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
    });
})();

// Phone number validation
document.getElementById('number').addEventListener('input', function() {
    var phoneNumberInput = this;
    var phoneNumber = phoneNumberInput.value;
    var phoneNumberPattern = /^09\d{9}$/;  // Philippine phone number pattern

    if (!phoneNumberPattern.test(phoneNumber)) {
        phoneNumberInput.setCustomValidity('Invalid phone number');
        phoneNumberInput.classList.add('is-invalid');
    } else {
        phoneNumberInput.setCustomValidity('');
        phoneNumberInput.classList.remove('is-invalid');
        phoneNumberInput.classList.add('is-valid');
    }

    phoneNumberInput.closest('.form-floating').classList.add('was-validated');
});

// Email validation
document.getElementById('email').addEventListener('input', function() {
    var emailInput = this;
    var email = emailInput.value;
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|org|ph)$/;  // Email pattern

    if (!emailPattern.test(email)) {
        emailInput.setCustomValidity('Invalid email domain');
        emailInput.classList.add('is-invalid');
    } else {
        emailInput.setCustomValidity('');
        emailInput.classList.remove('is-invalid');
        emailInput.classList.add('is-valid');
    }

    emailInput.closest('.form-floating').classList.add('was-validated');
});




// const form = document.getElementById('createAccountForm');
// const first_name = document.getElementById('first_name');
// const last_name = document.getElementById('last_name');
// const email = document.getElementById('email');
// const number = document.getElementById('number');
// const role_description = document.getElementById('role_description');

// form.addEventListener('submit', e => {
//     e.preventDefault();

//     if (validateInputs()) {
//         // If inputs are valid, submit the form
//         form.submit();
//     }
// });

// const setError = (element, message) => {
//     const inputControl = element.parentElement;
//     const errorDisplay = inputControl.querySelector('.error');

//     errorDisplay.innerText = message;
//     inputControl.classList.add('error');
//     inputControl.classList.remove('success');

//     // Remove error message after 5 seconds
//     setTimeout(() => {
//         errorDisplay.innerText = '';
//         inputControl.classList.remove('error');
//     }, 5000);
// };

// const setSuccess = element => {
//     const inputControl = element.parentElement;
//     const errorDisplay = inputControl.querySelector('.error');

//     errorDisplay.innerText = '';
//     inputControl.classList.add('success');
//     inputControl.classList.remove('error');
// };

// const isValidEmail = email => {
//     const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return re.test(String(email).toLowerCase());
// };

// const isValidPhone = number => {
//     // Philippine phone number format: +63 XX XXX XXXX (X can be 0-9)
//     const re = /^(09|\+639)\d{9}$/;
//     return re.test(number.trim());
// }

// const validateInputs = () => {
//     let isValid = true; // Flag to track overall validation status
//     const errors = {}; // Object to store error messages

//     const firstNameValue = first_name.value.trim();
//     const lastNameValue = last_name.value.trim();
//     const emailValue = email.value.trim();
//     const numberValue = number.value.trim();
//     const roleValue = role_description.value.trim();


//     if (firstNameValue === '') {
//         errors.first_name = 'First name is required';
//         isValid = false;
//     }

//     if (lastNameValue === '') {
//         errors.last_name = 'Last name is required';
//         isValid = false;
//     }

//     if (emailValue === '') {
//         errors.email = 'Email is required';
//         isValid = false;
//     } else if (!isValidEmail(emailValue)) {
//         errors.email = 'Invalid email!';
//         isValid = false;
//     }

//     if (numberValue === '') {
//         errors.number = 'Number is required';
//         isValid = false;
//     } else if (!isValidPhone(numberValue)) {
//         errors.number = 'Invalid phone number!';
//         isValid = false;
//     }

//     if (roleValue === '') {
//         errors.role_description = 'Role is required';
//         isValid = false;
//     }


//     // Set error messages for each input field
//     for (const field in errors) {
//         if (errors.hasOwnProperty(field)) {
//             setError(document.getElementById(field), errors[field]);
//         }
//     }

//     // Set success for fields without errors
//     const fieldsWithoutErrors = ['first_name', 'last_name', 'email', 'number', 'role_description'];
//     fieldsWithoutErrors.forEach(field => {
//         if (!errors[field]) {
//             setSuccess(document.getElementById(field));
//         }
//     });

//     return isValid; // Return overall validation status
// };


