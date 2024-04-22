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
const password2 = document.getElementById('confirm_password');

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
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};


const validateInputs = () => {
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();


    if (passwordValue === '') {
        setError(password, 'Password is required');
        return false;
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password must be at least 8 characters.');
        return false;
    } else if (!/[A-Z]/.test(passwordValue)) {
        setError(password, 'Password must contain at least one uppercase letter.');
        return false;

    } else if (!/[a-z]/.test(passwordValue)) {
        setError(password, 'Password must contain at least one lowercase letter.');
        return false;

    } else if (!/\d/.test(passwordValue)) {
        setError(password, 'Password must contain at least one number.');
        return false;
    } else {
        setSuccess(password);
    }

    if(password2Value === '') {
        setError(password2, 'Please confirm your password');
        return false;
    } else if (password2Value !== passwordValue) {
        setError(password2, "Passwords do not match");
        return false;
    } else {
        setSuccess(password2);
    }
    return true;

};
