// document.addEventListener("DOMContentLoaded", function() {
//     const emailInput = document.getElementById("email");
//     const sendEmailButton = document.getElementById("sendEmailButton");
//     const emailErrorMessage = document.getElementById("emailErrorMessage");

//     // Function to validate email
//     function validateEmail(email) {
//         // Regular expression for email validation
//         const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//         return emailRegex.test(email);
//     }

//     // Function to toggle button state and error message based on email validity
//     function toggleValidation() {
//         const emailValue = emailInput.value.trim();
//         const isValidEmail = validateEmail(emailValue);
        
//         // Check if input is empty
//         if (emailValue === '') {
//             emailErrorMessage.innerText = ""; // Clear error message if input is empty
//         } else {
//             // Update error message only if email is invalid
//             if (!isValidEmail) {
//                 emailErrorMessage.innerText = "Invalid email";
//             } else {
//                 emailErrorMessage.innerText = ""; // Clear error message if email is valid
//             }
//         }
        
//         // Disable button if email is invalid or input is empty
//         sendEmailButton.disabled = !isValidEmail || emailValue === '';
//     }

//     // Add event listener to the email input for input events
//     emailInput.addEventListener("input", toggleValidation);

//     // Initial call to toggleValidation to check the initial state
//     toggleValidation();
// });


const form = document.getElementById('resetForm');
const email = document.getElementById('email');

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

const validateInputs = () => {
    const emailValue = email.value.trim();

    if (emailValue === '') {
        setError(email, 'Email is required');
        return false;
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Invalid email!');
        return false;
    } else {
        setSuccess(email);
    }

    return true; 
};
