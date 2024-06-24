setTimeout(() => {
    const alertContainer = document.getElementById('alertContainer');
    if (alertContainer) {
        alertContainer.remove();
    }
}, 3000);

//Prevent spaces to be inputted to the email field
document.getElementById('email').addEventListener('keydown', function(event)
{
    if (event.key === ' ') {
        event.preventDefault();
    }
});

//Prevent spaces to be inputted to the email field
document.getElementById('password').addEventListener('keydown', function(event)
{
    if (event.key === ' ') {
        event.preventDefault();
    }
});







(function () {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
    var submitButton = document.querySelector('button[type="submit"]');
    var formSubmitted = false;

    function toggleSubmitButton(form) {
        if (form.checkValidity()) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }else {
                    formSubmitted = true;
                    submitButton.disabled = true; // Disable button on form submission
                }
                form.classList.add('was-validated');
            }, false);

            form.addEventListener('input', function () {
                toggleSubmitButton(form);
            });
        });

    var inputs = document.querySelectorAll('.needs-validation .form-control');
    inputs.forEach(function (input) {
        input.addEventListener('input', function () {
            if (!input.checkValidity()) {
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            }
            input.closest('.form-floating').classList.add('was-validated');
        });
    });


   // Email validation
document.getElementById('email').addEventListener('input', function () {
    validateEmail(this);
});

document.getElementById('email').addEventListener('change', function () {
    validateEmail(this);
});

function validateEmail(emailInput) {
    var email = emailInput.value;
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|org|ph)$/;  // Email pattern
    var feedback = document.getElementById('emailFeedback');

    if (email === '') {
        emailInput.setCustomValidity('Email is required');
        emailInput.classList.add('is-invalid');
        emailInput.classList.remove('is-valid');
        feedback.textContent = 'Email is required';
    } else if (!emailPattern.test(email)) {
        emailInput.setCustomValidity('Invalid email format');
        emailInput.classList.add('is-invalid');
        emailInput.classList.remove('is-valid');
        feedback.textContent = 'Invalid email format.';
    } else {
        emailInput.setCustomValidity('');
        emailInput.classList.remove('is-invalid');
        emailInput.classList.add('is-valid');
        feedback.textContent = ''; // Clear feedback message when email is valid
    }
    emailInput.closest('.form-floating').classList.add('was-validated');
}
})();