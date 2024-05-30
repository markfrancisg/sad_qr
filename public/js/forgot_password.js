document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
    var emailInput = document.getElementById('account_email');

    // Reset input field style
    emailInput.classList.remove('is-invalid');

    if (!emailInput.value) {
        event.preventDefault();
        emailInput.classList.add('is-invalid');
        emailInput.nextElementSibling.innerText = 'Please enter your email address.';
        removeValidationError(emailInput);
    } else if (!isValidEmail(emailInput.value)) {
        event.preventDefault();
        emailInput.classList.add('is-invalid');
        emailInput.nextElementSibling.innerText = 'Please enter a valid email address.';
        removeValidationError(emailInput);
    }
});

function isValidEmail(email) {
    // Regular expression to validate email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

//for client-side validation
function removeValidationError(inputElement) {
    // Remove validation error after 5 seconds
    setTimeout(function() {
        inputElement.classList.remove('is-invalid');
        inputElement.nextElementSibling.innerText = '';
    }, 3000); // 5000 milliseconds = 5 seconds
}

//for alert 
setTimeout(() => {
    const alertContainer = document.getElementById('alertContainer');
    if (alertContainer) {
        alertContainer.remove();
    }
}, 3000);