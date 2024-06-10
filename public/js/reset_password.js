// document.querySelector('.fa-eye').addEventListener('click', function () {
//     const passwordInput2 = document.getElementById('confirm_password');
//     const passwordInput1 = document.getElementById('password');
  
//     if (passwordInput1.type === 'password') {
//         passwordInput1.type = 'text';
//         passwordInput2.type = 'text';
//         this.classList.remove('fa-eye');
//         this.classList.add('fa-eye-slash');
//     } else {
//         passwordInput1.type = 'password';
//         passwordInput2.type = 'password';
//         this.classList.remove('fa-eye-slash');
//         this.classList.add('fa-eye');
//     }
// });

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
        document.getElementById("first_requirement").style.textDecoration = "none";
        requirementsMet = false;
    } else {
        document.getElementById("first_requirement").style.textDecoration = "line-through";
    }
    if (!password.match(/[A-Z]/)) {
        document.getElementById("second_requirement").style.textDecoration = "none";
        requirementsMet = false;
    } else {
        document.getElementById("second_requirement").style.textDecoration = "line-through";
    }
    if (!password.match(/[a-z]/)) {
        document.getElementById("third_requirement").style.textDecoration = "none";
        requirementsMet = false;
    } else {
        document.getElementById("third_requirement").style.textDecoration = "line-through";
    }
    if (!password.match(/[0-9]/)) {
        document.getElementById("fourth_requirement").style.textDecoration = "none";
        requirementsMet = false;
    } else {
        document.getElementById("fourth_requirement").style.textDecoration = "line-through";
    }

    toggleConfirmPasswordField(requirementsMet);
    return requirementsMet;
}

function toggleConfirmPasswordField(enable) {
    var confirmPasswordField = document.getElementById("confirm_password");
    confirmPasswordField.disabled = !enable;

    if (!enable) {
        confirmPasswordField.value = ""; // Clear the confirm password field if disabled
    }
}

function validatePasswordConfirmation() {
    var newPassword = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
    var passwordField = document.getElementById("password");
    var confirmPasswordField = document.getElementById("confirm_password");
    var passwordFeedback = passwordField.parentElement.querySelector('.invalid-feedback');
    var confirmPasswordFeedback = confirmPasswordField.parentElement.querySelector('.invalid-feedback');

    if (newPassword === "" || confirmPassword === "") {
        // If either field is empty, do not show an error message
        passwordField.classList.remove('is-invalid');
        confirmPasswordField.classList.remove('is-invalid');
        passwordFeedback.textContent = "";
        confirmPasswordFeedback.textContent = "";
        return true;
    }

    if (newPassword !== confirmPassword) {
        // If passwords do not match, set custom validity message, add is-invalid class, and display error message
        passwordField.classList.add('is-invalid');
        confirmPasswordField.classList.add('is-invalid');
        passwordFeedback.textContent = "";
        confirmPasswordFeedback.textContent = "Passwords do not match";
        return false;
    } else {
        // If passwords match, clear custom validity message, remove is-invalid class, and clear error message
        passwordField.classList.remove('is-invalid');
        confirmPasswordField.classList.remove('is-invalid');
        passwordFeedback.textContent = "";
        confirmPasswordFeedback.textContent = "";
        return true;
    }
}

document.getElementById("confirm_password").addEventListener("input", validatePasswordConfirmation);

document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
    if (!validatePasswordRequirements() || !validatePasswordConfirmation()) {
        event.preventDefault();
    }
});

document.getElementById("password").addEventListener("input", function() {
    validatePasswordRequirements();
    validatePasswordConfirmation(); // Validate password confirmation on password input change
});

document.getElementById("confirm_password").addEventListener("input", validatePasswordConfirmation);

document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
    var newPassword = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    // Check if confirm password field is empty
    if (newPassword !== "" && confirmPassword === "") {
        // If confirm password is empty, prevent form submission and display error message
        event.preventDefault();
        var confirmPasswordField = document.getElementById("confirm_password");
        var confirmPasswordFeedback = confirmPasswordField.parentElement.querySelector('.invalid-feedback');
        confirmPasswordField.classList.add('is-invalid');
        confirmPasswordFeedback.textContent = "Please confirm your new password.";
    } else {
        // Validate password requirements and confirmation as usual
        if (!validatePasswordRequirements() || !validatePasswordConfirmation()) {
            event.preventDefault();
        }
    }
});
// function validatePasswordRequirements() {
//     var password = document.getElementById("password").value;
//     var requirementsMet = true;

//     // Check if password meets all requirements
//     if (password.length < 8) {
//         document.getElementById("first_requirement").style.textDecoration = "none";
//         requirementsMet = false;
//     } else {
//         document.getElementById("first_requirement").style.textDecoration = "line-through";
//     }
//     if (!password.match(/[A-Z]/)) {
//         document.getElementById("second_requirement").style.textDecoration = "none";
//         requirementsMet = false;
//     } else {
//         document.getElementById("second_requirement").style.textDecoration = "line-through";
//     }
//     if (!password.match(/[a-z]/)) {
//         document.getElementById("third_requirement").style.textDecoration = "none";
//         requirementsMet = false;
//     } else {
//         document.getElementById("third_requirement").style.textDecoration = "line-through";
//     }
//     if (!password.match(/[0-9]/)) {
//         document.getElementById("fourth_requirement").style.textDecoration = "none";
//         requirementsMet = false;
//     } else {
//         document.getElementById("fourth_requirement").style.textDecoration = "line-through";
//     }

//     toggleConfirmPasswordField(requirementsMet);
//     return requirementsMet;
// }

// function toggleConfirmPasswordField(enable) {
//     var confirmPasswordField = document.getElementById("confirm_password");
//     confirmPasswordField.disabled = !enable;

//     if (!enable) {
//         confirmPasswordField.value = ""; // Clear the confirm password field if disabled
//     }
// }

// function clearRequirements() {
//     document.getElementById("first_requirement").style.textDecoration = "none";
//     document.getElementById("second_requirement").style.textDecoration = "none";
//     document.getElementById("third_requirement").style.textDecoration = "none";
//     document.getElementById("fourth_requirement").style.textDecoration = "none";
// }

// function validatePasswordConfirmation() {
//     var newPassword = document.getElementById("password").value;
//     var confirmPassword = document.getElementById("confirm_password").value;

//     if (newPassword === "" || confirmPassword === "") {
//         return false;
//     }

//     if (newPassword !== confirmPassword) {
//         document.getElementById("confirm_password").setCustomValidity("Passwords do not match");
//         return false;
//     } else {
//         document.getElementById("confirm_password").setCustomValidity("");
//         return true;
//     }
// }

// document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
//     if (!validatePasswordRequirements() || !validatePasswordConfirmation()) {
//         event.preventDefault();
//     }
// });

// document.getElementById("password").addEventListener("input", function() {
//     validatePasswordRequirements();
//     document.getElementById("confirm_password").value = ""; // Clear confirm password field
//     validatePasswordConfirmation();
// });

// document.getElementById("confirm_password").addEventListener("input", validatePasswordConfirmation);

