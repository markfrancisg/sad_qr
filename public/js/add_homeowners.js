const specialInputs = document.querySelectorAll('#first_name, #last_name');
specialInputs.forEach(function(input) {
  input.addEventListener('keydown', function(event) {
    if (!(/[a-zA-Z\s]/).test(event.key)) {
      event.preventDefault();
    }
  });
});

const numberInput = document.getElementById("number");
const blockInput = document.getElementById("block");
const lotInput = document.getElementById("lot");

[numberInput, blockInput, lotInput].forEach(input => {
    input.addEventListener('input', function(event) {
        const inputValue = event.target.value;
        const sanitizedValue = inputValue.replace(/\D/g, ''); // Remove non-digit characters
        event.target.value = sanitizedValue;
    });
});

const streetInput = document.getElementById("street");
streetInput.addEventListener('input', function(event) {
    const inputValue = event.target.value;
    const sanitizedValue = inputValue.replace(/[^a-zA-Z0-9\s]/g, ''); // Remove characters except letters, numbers, and spaces
    event.target.value = sanitizedValue;
});

// $(document).ready(function () {
//   $('#email').keyup(function () {
//     var email = $(this).val().trim();

//     if (email.trim() === '') {
//       $('#emailValidationResult').html(''); // Clear the message
//       return; // Exit early
//     }

//     $.ajax({
//       type: 'POST',
//       url: '../../../includes/admin/validateEmail.php',
//       data: { email: email },
//       success: function (response) {
//         var validationResult = $('#emailValidationResult');

//         if (response.indexOf('error') !== -1) {
//           validationResult.html('<span class="error mt-1">' + response + '</span>');
//           validationResult.css('color', 'red'); // Set error message color to red
//         } else {
//           validationResult.html('<span class="success mt-1">' + response + '</span>');
//           validationResult.css('color', ''); // Reset color to default
//         }
//       }
//     });
//   });
// });



// document.addEventListener("DOMContentLoaded", function() {
//     var numberInput = document.getElementById("number");
//     var numberError = document.getElementById("numberError");

//     numberInput.addEventListener("input", function() {
//         var number = numberInput.value.trim();
//         var numberPattern = /^(09|\+639)\d{9}$/; // Philippines phone number pattern

//         if (number === '') {
//             numberError.textContent = ''; // Clear error message if the field is empty
//         } else if (!numberPattern.test(number)) {
//             numberError.textContent = 'Invalid phone number format'; // Display error message
//         } else {
//             numberError.textContent = ''; // Clear error message if the number is valid
//         }
//     });
// });



// //TRY LANG
// $(document).ready(function () {
//   // Function to check if the button should be enabled or disabled
//   function checkButtonState() {
//     var email = $('#email').val().trim();
//     var number = $('#number').val().trim();
//     var firstName = $('#first_name').val().trim();
//     var lastName = $('#last_name').val().trim();
//     var block = $('#block').val().trim();
//     var lot = $('#lot').val().trim();
//     var street = $('#street').val().trim();
//     var submitButton = $('#submitButton');

//     // Disable the button if any required field is empty or there are error messages
//     if (email === '' || number === '' || firstName === '' || lastName === '' || block === '' || lot === '' || street === '') {
//       submitButton.prop('disabled', true);
//     } else {
//       var errorMessages = $('.error');
//       if (errorMessages.length === 0) {
//         submitButton.prop('disabled', false);
//       } else {
//         submitButton.prop('disabled', true);
//       }
//     }
//   }

//   // Bind input events to the email, number, and address inputs
//   $('#email, #number, #first_name, #last_name, #block, #lot, #street').on('input', function () {
//     // Check button state whenever any input changes
//     checkButtonState();
//   });

//   // Bind AJAX call to the email input
//   $('#email').on('input', function () {
//     var email = $(this).val().trim();

//     if (email === '') {
//       $('#emailValidationResult').html(''); // Clear the message
//       // Disable the button when input is empty
//       $('#submitButton').prop('disabled', true);
//       return; // Exit early
//     }

//     $.ajax({
//       type: 'POST',
//       url: '../../../includes/admin/validateEmail.php',
//       data: { email: email },
//       success: function (response) {
//         var validationResult = $('#emailValidationResult');

//         if (response.indexOf('error') !== -1) {
//           validationResult.html('<span class="error mt-1">' + response + '</span>');
//           validationResult.css('color', 'red'); // Set error message color to red
//           // Disable the button when there's an error
//           $('#submitButton').prop('disabled', true);
//         } else {
//           validationResult.html('<span class="success mt-1">' + response + '</span>');
//           validationResult.css('color', ''); // Reset color to default
//           // Check button state
//           checkButtonState();
//         }
//       }
//     });
//   });

//   // Bind input event to the number input
//   $('#number').on('input', function () {
//     var number = $(this).val().trim();
//     var numberPattern = /^(09|\+639)\d{9}$/; // Philippines phone number pattern
//     var numberError = $('#numberError');

//     if (number === '') {
//       numberError.text(''); // Clear error message if the field is empty
//       // Disable the button when input is empty
//       $('#submitButton').prop('disabled', true);
//     } else if (!numberPattern.test(number)) {
//       numberError.text('Invalid phone number format'); // Display error message
//       // Disable the button when there's an error
//       $('#submitButton').prop('disabled', true);
//     } else {
//       numberError.text(''); // Clear error message if the number is valid
//       // Check button state
//       checkButtonState();
//     }
//   });

//   // Initial check of button state on page load
//   checkButtonState();
// });

