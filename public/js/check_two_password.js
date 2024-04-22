// document.addEventListener("DOMContentLoaded", function() {
//     const passwordInput = document.getElementById("password");
//     const confirmPasswordInput = document.getElementById("confirm_password");
//     const changePasswordButton = document.getElementById("changePasswordButton");
//     const passwordError = document.getElementById("passwordError");

//     // Function to check if passwords match
//     function passwordsMatch() {
//         return passwordInput.value.trim() === confirmPasswordInput.value.trim();
//     }

//     // Function to check if password meets complexity requirements
//     function passwordMeetsRequirements(password) {
//         const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
//         return passwordRegex.test(password);
//     }

//     // Function to validate password
//     function validatePassword() {
//         const password = passwordInput.value.trim();
//         const confirmPassword = confirmPasswordInput.value.trim();

//         // Disable button if both fields are empty
//         if (password === '' && confirmPassword === '') {
//             changePasswordButton.disabled = true;
//             return ""; // No errors if both fields are empty
//         }

//         // Clear confirm password input if password field is empty
//         if (password === '') {
//             confirmPasswordInput.value = '';
//             confirmPasswordInput.disabled = true;
//             return ""; // No errors if password field is empty
//         }

//         // Show "Passwords do not match" error only if confirm password has input
//         if (confirmPassword !== '' && !passwordsMatch()) {
//             changePasswordButton.disabled = true;
//             return "Passwords do not match.";
//         }

//         // Disable confirm password input until password meets requirements
//         confirmPasswordInput.disabled = !passwordMeetsRequirements(password);

//         if (!passwordMeetsRequirements(password)) {
//             changePasswordButton.disabled = true;
//             return "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number.";
//         }

//         // If confirm password has no input, disable the button
//         if (confirmPassword === '') {
//             changePasswordButton.disabled = true;
//             return ""; // No errors
//         }

//         // If all conditions are met, enable the confirm password input
//         confirmPasswordInput.disabled = false;
//         changePasswordButton.disabled = false;

//         return ""; // No errors
//     }

//     // Function to update UI based on validation result
//     function updateUI(validationResult) {
//         if (validationResult === "") {
//             passwordError.innerText = "";
//             passwordError.style.display = 'none';
//         } else {
//             passwordError.innerText = validationResult;
//             passwordError.style.display = 'block';
//         }
//     }

//     // Event listeners for input events on password inputs
//     passwordInput.addEventListener("input", function() {
//         updateUI(validatePassword());
//     });

//     confirmPasswordInput.addEventListener("input", function() {
//         updateUI(validatePassword());
//     });
// });






const form = document.getElementById('resetConfirmform');
const password = document.getElementById('password');
const confirm_password = document.getElementById('confirm_password');


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

const validateInputs = () => {
    let isValid = true; // Flag to track overall validation status
    const errors = {}; // Object to store error messages

    const passwordValue = password.value.trim();
    const confirmPasswordValue = confirm_password.value.trim();

    if (passwordValue === '') {
        errors.password = 'Password is required';
        isValid = false;
    } else if (passwordValue.length < 8) {
        errors.password = 'Password must be at least 8 characters.';
        isValid = false;
    } else if (!/[A-Z]/.test(passwordValue) || !/[a-z]/.test(passwordValue) || !/\d/.test(passwordValue)) {
        errors.password = 'Password must contain at least one uppercase and lowercase letter and one number.';
        isValid = false;
    }

    if (confirmPasswordValue === '') {
        errors.confirm_password = 'Confirm your password';
        isValid = false;
    } else if (confirmPasswordValue !== passwordValue) {
        errors.confirm_password = 'Passwords do not match!';
        isValid = false;
    }

    // Set error messages for each input field
    for (const field in errors) {
        if (errors.hasOwnProperty(field)) {
            setError(document.getElementById(field), errors[field]);
        }
    }

    // Set success for fields without errors
    const fieldsWithoutErrors = ['password', 'confirm_password'];
    fieldsWithoutErrors.forEach(field => {
        if (!errors[field]) {
            setSuccess(document.getElementById(field));
        }
    });

    return isValid; // Return overall validation status
};
