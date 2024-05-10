$(document).ready(function() {
    $('.delete-btn').click(function() {
        var email = $(this).data('email');
        $('#delete-link').attr('href', '../../../includes/admin/qr_list.inc.php?email=' + email);
    });
});



document.getElementById('dropdownMenu').addEventListener('change', function() {
    var email = this.value;
    // Send AJAX request to fetch address from server
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var address = xhr.responseText;
                document.getElementById('address').value = address;
            } else {
                console.error('Failed to fetch address: ' + xhr.status);
            }
        }
    };
    xhr.open('GET', '../../../includes/admin/get_address.inc.php?email=' + email, true);
    xhr.send();
});

const wheelInput = document.getElementById("wheel");
[wheelInput].forEach(input => {
    input.addEventListener('input', function(event) {
        const inputValue = event.target.value;
        const sanitizedValue = inputValue.replace(/\D/g, ''); // Remove non-digit characters
        event.target.value = sanitizedValue;
    });
});

const plateNumberInput = document.getElementById('plate_number');
// Add event listener to listen for input events
plateNumberInput.addEventListener('input', function() {
    // Convert the input value to uppercase
    this.value = this.value.toUpperCase();
});


const form = document.getElementById('qrCodeForm');
const vehicle_type = document.getElementById('vehicle_type');
const wheel = document.getElementById('wheel');
const plate_number = document.getElementById('plate_number');


form.addEventListener('submit', e => {
    e.preventDefault();

    if (validateInputs()) {
        // If inputs are valid, submit the form
        form.submit();
    }
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
};

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};


const validateInputs = () => {
  let isValid = true; // Flag to track overall validation status
  const errors = {}; // Object to store error messages

  const vehicleTypeValue = vehicle_type.value.trim();
  const wheelValue = wheel.value.trim();
  const plateNumberValue = plate_number.value.trim();


  if(vehicleTypeValue === ''){
      errors.vehicle_type = 'Vehicle type is required';
      isValid = false;
  }

  if(wheelValue === ''){
      errors.wheel = 'Wheel number is required';
      isValid = false;
  }

  if (plateNumberValue === '') {
      errors.plate_number = 'Plate number is required';
      isValid = false;
  }

  // Set error messages for each input field
  for (const field in errors) {
      if (errors.hasOwnProperty(field)) {
          setError(document.getElementById(field), errors[field]);
      }
  }

  // Set success for fields without errors
  const fieldsWithoutErrors = ['vehicle_type', 'wheel', 'plate_number'];
  fieldsWithoutErrors.forEach(field => {
      if (!errors[field]) {
          setSuccess(document.getElementById(field));
      }
  });

  return isValid; // Return overall validation status
};
