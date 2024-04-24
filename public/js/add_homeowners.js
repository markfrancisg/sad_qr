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


// const form = document.getElementById('homeownerForm');
// const first_name = document.getElementById('first_name');
// const last_name = document.getElementById('last_name');
// const email = document.getElementById('email');
// const number = document.getElementById('number');
// const block = document.getElementById('block');
// const lot = document.getElementById('lot');
// const street = document.getElementById('street');

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
//   // Philippine phone number format: +63 XX XXX XXXX (X can be 0-9)
//     const re = /^(09|\+639)\d{9}$/;
//     return re.test(number.trim());
// }

// const validateInputs = () => {
//   let isValid = true; // Flag to track overall validation status
//   const errors = {}; // Object to store error messages

//   const firstNameValue = first_name.value.trim();
//   const lastNameValue = last_name.value.trim();
//   const emailValue = email.value.trim();
//   const numberValue = number.value.trim();
//   const blockValue = block.value.trim();
//   const lotValue = lot.value.trim();
//   const streetValue = street.value.trim();

//   if(firstNameValue === ''){
//       errors.first_name = 'First name is required';
//       isValid = false;
//   }

//   if(lastNameValue === ''){
//       errors.last_name = 'Last name is required';
//       isValid = false;
//   }

//   if (emailValue === '') {
//       errors.email = 'Email is required';
//       isValid = false;
//   } else if (!isValidEmail(emailValue)) {
//       errors.email = 'Invalid email!';
//       isValid = false;
//   }

//   if (numberValue === ''){
//       errors.number = 'Number is required';
//       isValid = false;
//   } else if (!isValidPhone(numberValue)){
//       errors.number = 'Invalid phone number!';
//       isValid = false;
//   }

//   if (blockValue === ''){
//       errors.block = 'Block is required';
//       isValid = false;
//   }

//   if (lotValue === ''){
//       errors.lot = 'Lot is required';
//       isValid = false;
//   }

//   if (streetValue === ''){
//       errors.street = 'Street is required';
//       isValid = false;
//   }

//   // Set error messages for each input field
//   for (const field in errors) {
//       if (errors.hasOwnProperty(field)) {
//           setError(document.getElementById(field), errors[field]);
//       }
//   }

//   // Set success for fields without errors
//   const fieldsWithoutErrors = ['first_name', 'last_name', 'email', 'number', 'block', 'lot', 'street'];
//   fieldsWithoutErrors.forEach(field => {
//       if (!errors[field]) {
//           setSuccess(document.getElementById(field));
//       }
//   });

//   return isValid; // Return overall validation status
// };



const form = document.getElementById('homeownerForm');
const first_name = document.getElementById('first_name');
const last_name = document.getElementById('last_name');
const email = document.getElementById('email');
const number = document.getElementById('number');
const block = document.getElementById('block');
const lot = document.getElementById('lot');
const street = document.getElementById('street');

form.addEventListener('submit', e => {
    e.preventDefault();

    if (validateInputs()) {
        // If inputs are valid, submit the form
        form.submit();
    }
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
};

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

const isValidPhone = number => {
    // Philippine phone number format: +63 XX XXX XXXX (X can be 0-9)
    const re = /^(09|\+639)\d{9}$/;
    return re.test(number.trim());
};

const validateInputs = () => {
    let isValid = true; // Flag to track overall validation status
    const errors = {}; // Object to store error messages

    const firstNameValue = first_name.value.trim();
    const lastNameValue = last_name.value.trim();
    const emailValue = email.value.trim();
    const numberValue = number.value.trim();
    const blockValue = block.value.trim();
    const lotValue = lot.value.trim();
    const streetValue = street.value.trim();

    if (firstNameValue === '') {
        errors.first_name = 'First name is required';
        isValid = false;
    }

    if (lastNameValue === '') {
        errors.last_name = 'Last name is required';
        isValid = false;
    }

    if (emailValue === '') {
        errors.email = 'Email is required';
        isValid = false;
    } else if (!isValidEmail(emailValue)) {
        errors.email = 'Invalid email!';
        isValid = false;
    }

    if (numberValue === '') {
        errors.number = 'Number is required';
        isValid = false;
    } else if (!isValidPhone(numberValue)) {
        errors.number = 'Invalid phone number!';
        isValid = false;
    }

    if (blockValue === '') {
        errors.block = 'Block is required';
        isValid = false;
    }

    if (lotValue === '') {
        errors.lot = 'Lot is required';
        isValid = false;
    }

    if (streetValue === '') {
        errors.street = 'Street is required';
        isValid = false;
    }

    // Set error messages for each input field
    for (const field in errors) {
        if (errors.hasOwnProperty(field)) {
            setError(document.getElementById(field), errors[field]);
        }
    }

    // Set success for fields without errors
    const fieldsWithoutErrors = ['first_name', 'last_name', 'email', 'number', 'block', 'lot', 'street'];
    fieldsWithoutErrors.forEach(field => {
        if (!errors[field]) {
            setSuccess(document.getElementById(field));
        }
    });

    return isValid; // Return overall validation status
};






// Event listener for email input to perform validation
// email.addEventListener('input', function() {
//     const emailValue = this.value.trim();
//     const errorContainer = document.querySelector('.error-container');
//     const errorSpan = errorContainer.querySelector('.error');

//     if (emailValue === '') {
//         errorSpan.textContent = 'Email is required';
//         return;
//     } else if (!isValidEmail(emailValue)) {
//         errorSpan.textContent = 'Invalid email!';
//         return;
//     }

//     // Send AJAX request to check if email is already taken
//     const xhr = new XMLHttpRequest();
//     xhr.open('POST', '../../../includes/admin/validateEmail.php', true);
//     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//     xhr.onload = function() {
//         if (xhr.status == 200) {
//             const response = JSON.parse(xhr.responseText);
//             if (response.exists) {
//                 errorSpan.textContent = 'Email is already taken';
//             } else {
//                 errorSpan.textContent = '';
//             }
//         }
//     };
//     xhr.send('email=' + emailValue);
// });

// // Event listener for form submission
// form.addEventListener('submit', function(event) {
//     if (!validateInputs()) {
//         event.preventDefault();
//     }
// });

