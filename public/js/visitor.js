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

document.getElementById('visitor_plate_number').addEventListener('keydown', function(event)
{
    if (event.key === ' ') {
        event.preventDefault();
    }
});



const elements = document.querySelectorAll('#visitor_first_name,#purpose, #visitor_last_name, #visitor_plate_number, #visitor_vehicle_color');
elements.forEach(function(element) {
    element.addEventListener('keydown', function(event) {
        if (event.key === ' ' && element.value === '') {
            event.preventDefault();
        }
    });
});


// prevent multiple consecutive spaces in fields
document.addEventListener('DOMContentLoaded', () => {
    const firstNameField = document.getElementById('visitor_first_name');
    const lastNameField = document.getElementById('visitor_last_name');
    const purposeField = document.getElementById('purpose');
    const plateNumberField = document.getElementById('visitor_plate_number');
    const colorField = document.getElementById('visitor_vehicle_color');

    // Add event listeners and validation logic for each input field
    
    firstNameField.addEventListener('input', () => {
        const value = firstNameField.value;

        // Replace consecutive spaces with a single space
        firstNameField.value = value.replace(/\s{2,}/g, ' ');
    });

    
    lastNameField.addEventListener('input', () => {
        const value = lastNameField.value;

        // Replace consecutive spaces with a single space
        lastNameField.value = value.replace(/\s{2,}/g, ' ');
    });

    
    purposeField.addEventListener('input', () => {
        const value = purposeField.value;

        // Replace consecutive spaces with a single space
        purposeField.value = value.replace(/\s{2,}/g, ' ');
    });

    colorField.addEventListener('input', () => {
        const value = colorField.value;

        // Replace consecutive spaces with a single space
        colorField.value = value.replace(/\s{2,}/g, ' ');
    });

    plateNumberField.addEventListener('input', () => {
        const value = plateNumberField.value;

        // Replace consecutive spaces with a single space
        plateNumberField.value = value.replace(/\s{2,}/g, ' ');
    });
});


setTimeout(() => {
    const alertContainer = document.getElementById('alertContainer');
    if (alertContainer) {
        alertContainer.remove();
    }
}, 3000);



document.getElementById('visitor_vehicle_type').addEventListener('change', function() {
    var wheelInput = document.getElementById('visitor_wheel');
    var vehicleType = this.value;

    var wheelCount;
    switch (vehicleType) {
        case 'Motorcycle':
            wheelCount = 2;
            break;
        case 'Pick Up Truck':
        case 'Van':
        case 'Hatchback':
        case 'Sedan':
        case 'Coupe':
        case 'Convertible':
        case 'SUV':
        case 'MPV':
        case 'Crossover':
            wheelCount = 4;
            break;
        default:
            wheelCount = '';
            break;
    }

    wheelInput.value = wheelCount;
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

    var vehicleType = document.getElementById('visitor_vehicle_type');
    var vehicleWheel = document.getElementById('visitor_wheel');
    vehicleType.addEventListener('change', function () {
        if (vehicleType.value === '') {
            vehicleType.classList.add('is-invalid');
            vehicleType.classList.remove('is-valid');
            vehicleWheel.classList.add('is-invalid');
            vehicleWheel.classList.remove('is-valid');
        } else {
            vehicleType.classList.remove('is-invalid');
            vehicleType.classList.add('is-valid');
            vehicleWheel.classList.remove('is-invalid');
            vehicleWheel.classList.add('is-valid');
        }
        vehicleType.closest('.form-floating').classList.add('was-validated');
        toggleSubmitButton(vehicleType.closest('form'));
    });

    // Plate number validation
    document.getElementById('visitor_plate_number').addEventListener('input', function () {
        var plateNumberInput = this;
        var plateNumber = plateNumberInput.value.toUpperCase().trim(); // Trim whitespace and convert to uppercase
        var feedback = document.getElementById('plateFeedback');
        var platePattern = /^(?:[A-Z]{3}-\d{3}|[A-Z]{3}-\d{2}|[A-Z]{3}-(?!0000)\d{4}|[A-Z]{2}-\d{4})$/;
    
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
