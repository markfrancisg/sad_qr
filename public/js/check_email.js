document.addEventListener("DOMContentLoaded", function() {
    const emailInput = document.getElementById("email");
    const sendEmailButton = document.getElementById("sendEmailButton");
    const emailErrorMessage = document.getElementById("emailErrorMessage");

    // Function to validate email
    function validateEmail(email) {
        // Regular expression for email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Function to toggle button state and error message based on email validity
    function toggleValidation() {
        const emailValue = emailInput.value.trim();
        const isValidEmail = validateEmail(emailValue);
        
        // Check if input is empty
        if (emailValue === '') {
            emailErrorMessage.innerText = ""; // Clear error message if input is empty
        } else {
            // Update error message only if email is invalid
            if (!isValidEmail) {
                emailErrorMessage.innerText = "Invalid email";
            } else {
                emailErrorMessage.innerText = ""; // Clear error message if email is valid
            }
        }
        
        // Disable button if email is invalid or input is empty
        sendEmailButton.disabled = !isValidEmail || emailValue === '';
    }

    // Add event listener to the email input for input events
    emailInput.addEventListener("input", toggleValidation);

    // Initial call to toggleValidation to check the initial state
    toggleValidation();
});
