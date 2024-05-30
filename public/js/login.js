// document.querySelector('.fa-eye').addEventListener('click', function () {
//     const passwordInput = document.getElementById('password');
//     if (passwordInput.type === 'password') {
//         passwordInput.type = 'text';
//         this.classList.remove('fa-eye');
//         this.classList.add('fa-eye-slash');
//     } else {
//         passwordInput.type = 'password';
//         this.classList.remove('fa-eye-slash');
//         this.classList.add('fa-eye');
//     }
// });

setTimeout(() => {
    const alertContainer = document.getElementById('alertContainer');
    if (alertContainer) {
        alertContainer.remove();
    }
}, 3000);

document.getElementById('loginForm').addEventListener('submit', function(event) {
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');

    // Reset input field styles
    emailInput.classList.remove('is-invalid');
    passwordInput.classList.remove('is-invalid');

    if (!emailInput.value) {
        event.preventDefault();
        event.stopPropagation();
        emailInput.classList.add('is-invalid');
        emailInput.nextElementSibling.innerText = 'Please enter your email address.';
        removeValidationError(emailInput);
    } else if (!isValidEmail(emailInput.value)) {
        event.preventDefault();
        event.stopPropagation();
        emailInput.classList.add('is-invalid');
        emailInput.nextElementSibling.innerText = 'Please enter a valid email address.';
        removeValidationError(emailInput);
    } else if (!emailInput.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        emailInput.classList.add('is-invalid');
        removeValidationError(emailInput);
    }

    if (!passwordInput.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        passwordInput.classList.add('is-invalid');
        removeValidationError(passwordInput);
    }
});

function isValidEmail(email) {
    // Regular expression to validate email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Validate email format using regular expression
    if (!emailRegex.test(email)) {
        return false;
    }

    // Check if the domain has DNS records (optional but recommended)
    var domain = email.split('@')[1];
    var domainIsValid = true; // Implement domain validation logic here

    if (!domainIsValid) {
        return false;
    }

    // Check for disposable email addresses (optional but recommended)
    var disposableDomains = ['example.com', 'example.org']; // Add disposable domains here
    if (disposableDomains.includes(domain)) {
        return false;
    }

    // Additional checks (optional)
    // You can add more checks here such as checking against a list of known TLDs, etc.

    // If all checks pass, the email is considered valid
    return true;
}

function removeValidationError(inputElement) {
    // Remove validation error after 3 seconds
    setTimeout(function() {
        inputElement.classList.remove('is-invalid');
        inputElement.nextElementSibling.innerText = '';
    }, 3000); // 3000 milliseconds = 3 seconds
}