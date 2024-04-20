document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm_password");
    const changePasswordButton = document.getElementById("changePasswordButton");
    const passwordError = document.getElementById("passwordError");

    // Function to check if passwords match
    function passwordsMatch() {
        return passwordInput.value.trim() === confirmPasswordInput.value.trim();
    }

    // Function to check if password meets complexity requirements
    function passwordMeetsRequirements(password) {
        const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        return passwordRegex.test(password);
    }

    // Function to validate password
    function validatePassword() {
        const password = passwordInput.value.trim();
        const confirmPassword = confirmPasswordInput.value.trim();

        // Disable button if both fields are empty
        if (password === '' && confirmPassword === '') {
            changePasswordButton.disabled = true;
            return ""; // No errors if both fields are empty
        }

        // Clear confirm password input if password field is empty
        if (password === '') {
            confirmPasswordInput.value = '';
            confirmPasswordInput.disabled = true;
            return ""; // No errors if password field is empty
        }

        // Show "Passwords do not match" error only if confirm password has input
        if (confirmPassword !== '' && !passwordsMatch()) {
            changePasswordButton.disabled = true;
            return "Passwords do not match.";
        }

        // Disable confirm password input until password meets requirements
        confirmPasswordInput.disabled = !passwordMeetsRequirements(password);

        if (!passwordMeetsRequirements(password)) {
            changePasswordButton.disabled = true;
            return "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number.";
        }

        // If confirm password has no input, disable the button
        if (confirmPassword === '') {
            changePasswordButton.disabled = true;
            return ""; // No errors
        }

        // If all conditions are met, enable the confirm password input
        confirmPasswordInput.disabled = false;
        changePasswordButton.disabled = false;

        return ""; // No errors
    }

    // Function to update UI based on validation result
    function updateUI(validationResult) {
        if (validationResult === "") {
            passwordError.innerText = "";
            passwordError.style.display = 'none';
        } else {
            passwordError.innerText = validationResult;
            passwordError.style.display = 'block';
        }
    }

    // Event listeners for input events on password inputs
    passwordInput.addEventListener("input", function() {
        updateUI(validatePassword());
    });

    confirmPasswordInput.addEventListener("input", function() {
        updateUI(validatePassword());
    });
});
