function validateAndTransformInput(input) {
    // Replace non-allowed characters and transform to uppercase
    input.value = input.value.replace(/[^a-zA-Z0-9 -]/g, '').toUpperCase();
}


document.getElementById('plate_number').addEventListener('keydown', function(event)
{
    if (event.key === ' ') {
        event.preventDefault();
    }
});

const elements = document.querySelectorAll('#plate_number, #vehicle_color');
elements.forEach(function(element) {
    element.addEventListener('keydown', function(event) {
        if (event.key === ' ' && element.value === '') {
            event.preventDefault();
        }
    });
});


// prevent multiple consecutive spaces in fields
document.addEventListener('DOMContentLoaded', () => {
    const colorField = document.getElementById('vehicle_color');
    

    colorField.addEventListener('input', () => {
        const value = colorField.value;

        // Replace consecutive spaces with a single space
        colorField.value = value.replace(/\s{2,}/g, ' ');
    });
});


document.getElementById('vehicle_type').addEventListener('change', function() {
    var wheelInput = document.getElementById('wheel');
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

// /////////////////////////////////////////////////////////////


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

    var vehicleType = document.getElementById('vehicle_type');
    var vehicleWheel = document.getElementById('wheel');
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

    document.getElementById('plate_number').addEventListener('input', function () {
        var plateNumberInput = this;
        var plateNumber = plateNumberInput.value.toUpperCase();
        var feedback = document.getElementById('plateFeedback');
        var platePattern = /^(?:[A-Z]{3}-\d{3}|[A-Z]{3}-\d{2}|[A-Z]{3}-(?!0000)\d{4}|[A-Z]{2}-\d{4})$/;
        
        if (plateNumber === '') {
            this.setCustomValidity('Plate number is required');
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            feedback.textContent = 'Plate number is required';
        } else if (!platePattern.test(plateNumber)) {
            plateNumberInput.setCustomValidity('Invalid plate number format');
            plateNumberInput.classList.add('is-invalid');
            plateNumberInput.classList.remove('is-valid');
            feedback.textContent = 'Invalid plate number format';
        } else {
            var originalPlateNumber = document.getElementById('original_plate_number').value.trim();
    
            if (plateNumber.trim() === originalPlateNumber.trim()) {
                // If the plate number remains the same, no need to check the database
                plateNumberInput.setCustomValidity('');
                plateNumberInput.classList.remove('is-invalid');
                plateNumberInput.classList.add('is-valid');
                feedback.textContent = ''; // Clear feedback message
                toggleSubmitButton(plateNumberInput.closest('form'));
            } else {
                // If the plate number is different, then perform the AJAX call
                $.ajax({
                    url: '../../../includes/plate_number_check.php',
                    method: 'POST',
                    data: { plate_number: plateNumber },
                    success: function (response) {
                        if (response === 'taken') {
                            plateNumberInput.setCustomValidity('Plate number is already taken');
                            plateNumberInput.classList.add('is-invalid');
                            plateNumberInput.classList.remove('is-valid');
                            feedback.textContent = 'Plate number is already taken';
                        } else {
                            plateNumberInput.setCustomValidity('');
                            plateNumberInput.classList.remove('is-invalid');
                            plateNumberInput.classList.add('is-valid');
                            feedback.textContent = ''; // Clear feedback message when plate number is valid
                        }
                        toggleSubmitButton(plateNumberInput.closest('form'));
                    },
                    error: function (xhr, status, error) {
                        console.error('Error checking plate number:', error);
                    }
                });
            }
        }
        plateNumberInput.closest('.form-floating').classList.add('was-validated');
    });
})();


