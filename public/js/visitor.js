
//no letters
const wheelInput = document.getElementById("visitor_wheel");
[wheelInput].forEach(input => {
    input.addEventListener('input', function(event) {
        const inputValue = event.target.value;
        const sanitizedValue = inputValue.replace(/\D/g, ''); // Remove non-digit characters
        event.target.value = sanitizedValue;
    });
});

function validateAndTransformInput(input) {
    // Replace non-allowed characters and transform to uppercase
    input.value = input.value.replace(/[^a-zA-Z0-9 -]/g, '').toUpperCase();
}

const specialInputs = document.querySelectorAll('#visitor_first_name, #visitor_last_name');
specialInputs.forEach(function(input) {
  input.addEventListener('keydown', function(event) {
    if (!(/[a-zA-Z\s]/).test(event.key)) {
      event.preventDefault();
    }
  });
});


const elements = document.querySelectorAll('#visitor_first_name,#purpose, #visitor_last_name, #visitor_plate_number, #visitor_vehicle_type, #visitor_vehicle_color, #visitor_wheel');
elements.forEach(function(element) {
    element.addEventListener('keydown', function(event) {
        if (event.key === ' ' && element.value === '') {
            event.preventDefault();
        }
    });
});

setTimeout(() => {
    const alertContainer = document.getElementById('alertContainer');
    if (alertContainer) {
        alertContainer.remove();
    }
}, 3000);


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

    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
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

    // Plate number validation
    document.getElementById('visitor_plate_number').addEventListener('input', function () {
        var plateNumberInput = this;
        var plateNumber = plateNumberInput.value.toUpperCase().trim(); // Trim whitespace and convert to uppercase
        var feedback = document.getElementById('plateFeedback');
        var platePattern = /^(?:[A-Z]{2,3}-\d{2,4})$/; // Adjusted pattern for plate numbers
    
        if (plateNumber === '') {
            plateNumberInput.setCustomValidity('Plate number is required');
        } else if (!platePattern.test(plateNumber)) {
            plateNumberInput.setCustomValidity('Invalid plate number format');
        } else {
            plateNumberInput.setCustomValidity('');
        }
    
        if (plateNumberInput.checkValidity()) {
            plateNumberInput.classList.remove('is-invalid');
            plateNumberInput.classList.add('is-valid');
            feedback.textContent = ''; // Clear feedback message
        } else {
            plateNumberInput.classList.add('is-invalid');
            feedback.textContent = plateNumberInput.validationMessage;
        }
    
        plateNumberInput.closest('.form-floating').classList.add('was-validated');
    });

})();
