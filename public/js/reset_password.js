
document.getElementById('showPassword').addEventListener('change', function() {
    var passwordField = document.getElementById('password');
    var confirmPasswordField = document.getElementById('confirm_password');

    // Toggle password visibility based on checkbox state
    passwordField.type = this.checked ? 'text' : 'password';
    confirmPasswordField.type = this.checked ? 'text' : 'password';
});

function validatePasswordRequirements() {
    var password = document.getElementById("password").value;
    var requirementsMet = true;

    // Check if password meets all requirements
    if (password.length < 8) {
        document.getElementById("first_requirement").classList.remove('requirement');
        requirementsMet = false;
    } else {
        document.getElementById("first_requirement").classList.add('requirement');
    }
    if (!password.match(/[A-Z]/)) {
        document.getElementById("second_requirement").classList.remove('requirement');
        requirementsMet = false;
    } else {
        document.getElementById("second_requirement").classList.add('requirement');
    }
    if (!password.match(/[a-z]/)) {
        document.getElementById("third_requirement").classList.remove('requirement');
        requirementsMet = false;
    } else {
        document.getElementById("third_requirement").classList.add('requirement');
    }
    if (!password.match(/[0-9]/)) {
        document.getElementById("fourth_requirement").classList.remove('requirement');
        requirementsMet = false;
    } else {
        document.getElementById("fourth_requirement").classList.add('requirement');
    }

    return requirementsMet;
}


function validatePasswordConfirmation() {
    var newPassword = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    return newPassword === confirmPassword;
}

function toggleButtonVisibility() {
    var button = document.querySelector('button[type="submit"]');
    var requirementsMet = validatePasswordRequirements();
    var confirmationValid = validatePasswordConfirmation();
    
    button.disabled = !(requirementsMet && confirmationValid);
}

document.getElementById("password").addEventListener("input", function() {
    toggleButtonVisibility();
    validatePasswordRequirements();
    validatePasswordConfirmation();
});

document.getElementById("confirm_password").addEventListener("input", function() {
    toggleButtonVisibility();
    validatePasswordConfirmation();
});

document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
    if (!validatePasswordRequirements() || !validatePasswordConfirmation()) {
        event.preventDefault();
        var confirmPasswordField = document.getElementById("confirm_password");
        var confirmPasswordFeedback = confirmPasswordField.parentElement.querySelector('.invalid-feedback');
        confirmPasswordField.classList.add('is-invalid');
        confirmPasswordFeedback.textContent = "Please confirm your new password.";
    }
});