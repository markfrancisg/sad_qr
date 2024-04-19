document.addEventListener("DOMContentLoaded", function() {
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const loginButton = document.getElementById("loginButton");
    const emailErrorMessage = document.getElementById("emailErrorMessage");

    function toggleSubmitButton() {
        const emailValue = emailInput.value.trim();
        const passwordValue = passwordInput.value.trim();

        // Regular expression for email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Check if email is invalid or empty
        if (emailValue === '' || !emailRegex.test(emailValue)) {
            loginButton.disabled = true;
            if (emailValue === '') {
                emailErrorMessage.innerText = ""; // Empty the error message if email is empty
                emailErrorMessage.style.display = 'none'; // Hide the error message
            } else {
                emailErrorMessage.innerText = "Invalid email";
                emailErrorMessage.style.display = 'block';
            }
        } else {
            emailErrorMessage.innerText = "";
            emailErrorMessage.style.display = 'none';
        }

        // Check if password is empty
        if (passwordValue === '') {
            loginButton.disabled = true;
        }

        // Enable login button only if both email and password are valid
        if (emailRegex.test(emailValue) && emailValue !== '' && passwordValue !== '') {
            loginButton.disabled = false;
        }
    }

    // Event listeners for input events on email and password fields
    emailInput.addEventListener("input", toggleSubmitButton);
    passwordInput.addEventListener("input", toggleSubmitButton);
});
