//client side validation, if email is invalid or fields are empty, disable the button
// document.addEventListener("DOMContentLoaded", function() {
//     const emailInput = document.getElementById("email");
//     const passwordInput = document.getElementById("password");
//     const loginButton = document.getElementById("loginButton");
//     const emailErrorMessage = document.getElementById("emailErrorMessage");

//     function toggleSubmitButton() {
//         const emailValue = emailInput.value.trim();
//         const passwordValue = passwordInput.value.trim();

//         // Regular expression for email validation
//         const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

//         // Check if email is invalid or empty
//         if (emailValue === '' || !emailRegex.test(emailValue)) {
//             loginButton.disabled = true;
//             if (emailValue === '') {
//                 emailErrorMessage.innerText = ""; // Empty the error message if email is empty
//                 emailErrorMessage.style.display = 'none'; // Hide the error message
//             } else {
//                 emailErrorMessage.innerText = "Invalid email";
//                 emailErrorMessage.style.display = 'block';
//             }
//         } else {
//             emailErrorMessage.innerText = "";
//             emailErrorMessage.style.display = 'none';
//         }

//         // Check if password is empty
//         if (passwordValue === '') {
//             loginButton.disabled = true;
//         }

//         // Enable login button only if both email and password are valid
//         if (emailRegex.test(emailValue) && emailValue !== '' && passwordValue !== '') {
//             loginButton.disabled = false;
//         }
//     }

//     // Event listeners for input events on email and password fields
//     emailInput.addEventListener("input", toggleSubmitButton);
//     passwordInput.addEventListener("input", toggleSubmitButton);
// });

//for Eye icon toggle
document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("password");
    const togglePasswordButton = document.querySelector(".toggle-password");

    togglePasswordButton.addEventListener("click", function() {
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        this.classList.toggle("fa-eye-slash");
        this.classList.toggle("fa-eye");
    });
});

const form = document.getElementById('loginForm');
const email = document.getElementById('email');
const password = document.getElementById('password');

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
    const passwordValue = password.value.trim();

    if (emailValue === '') {
        setError(email, 'Email is required');
        return false;
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Invalid email!');
        return false;
    } else {
        setSuccess(email);
    }

    if (passwordValue === '') {
        setError(password, 'Password is required');
        return false;
    } else {
        setSuccess(password);
    }

    return true; // Both inputs are valid
};


