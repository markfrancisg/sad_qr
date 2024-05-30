document.querySelector('.fa-eye').addEventListener('click', function () {
    const passwordInput2 = document.getElementById('confirm_password');
    const passwordInput1 = document.getElementById('password');
  
    if (passwordInput1.type === 'password') {
        passwordInput1.type = 'text';
        passwordInput2.type = 'text';
        this.classList.remove('fa-eye');
        this.classList.add('fa-eye-slash');
    } else {
        passwordInput1.type = 'password';
        passwordInput2.type = 'password';
        this.classList.remove('fa-eye-slash');
        this.classList.add('fa-eye');
    }
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

function clearRequirements() {
    document.getElementById("first_requirement").style.textDecoration = "none";
    document.getElementById("second_requirement").style.textDecoration = "none";
    document.getElementById("third_requirement").style.textDecoration = "none";
    document.getElementById("fourth_requirement").style.textDecoration = "none";
}

function validatePasswordConfirmation() {
    var newPassword = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    if (newPassword === "" || confirmPassword === "") {
        return false;
    }

    if (newPassword !== confirmPassword) {
        document.getElementById("confirm_password").setCustomValidity("Passwords do not match");
        return false;
    } else {
        document.getElementById("confirm_password").setCustomValidity("");
        return true;
    }
}

document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
    if (!validatePasswordRequirements() || !validatePasswordConfirmation()) {
        event.preventDefault();
    }
});

document.getElementById("password").addEventListener("input", function() {
    validatePasswordRequirements();
    document.getElementById("confirm_password").value = ""; // Clear confirm password field
    validatePasswordConfirmation();
});

document.getElementById("confirm_password").addEventListener("input", validatePasswordConfirmation);