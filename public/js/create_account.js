const specialInputs = document.querySelectorAll('#first_name, #last_name');
specialInputs.forEach(function(input) {
  input.addEventListener('keydown', function(event) {
    if (!(/[a-zA-Z\s]/).test(event.key)) {
      event.preventDefault();
    }
  });
});

const numberInput = document.getElementById("number");
[numberInput].forEach(input => {
    input.addEventListener('input', function(event) {
        const inputValue = event.target.value;
        const sanitizedValue = inputValue.replace(/\D/g, ''); // Remove non-digit characters
        event.target.value = sanitizedValue;
    });
});


const form = document.getElementById('createAccountForm');
const first_name = document.getElementById('first_name');
const last_name = document.getElementById('last_name');
const email = document.getElementById('email');
const number = document.getElementById('number');


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

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

const isValidPhone = number => {
  // Philippine phone number format: +63 XX XXX XXXX (X can be 0-9)
    const re = /^(09|\+639)\d{9}$/;
    return re.test(number.trim());
}

const validateInputs = () => {
  let isValid = true; // Flag to track overall validation status
  const errors = {}; // Object to store error messages

  const firstNameValue = first_name.value.trim();
  const lastNameValue = last_name.value.trim();
  const emailValue = email.value.trim();
  const numberValue = number.value.trim();


  if(firstNameValue === ''){
      errors.first_name = 'First name is required';
      isValid = false;
  }

  if(lastNameValue === ''){
      errors.last_name = 'Last name is required';
      isValid = false;
  }

  if (emailValue === '') {
      errors.email = 'Email is required';
      isValid = false;
  } else if (!isValidEmail(emailValue)) {
      errors.email = 'Invalid email!';
      isValid = false;
  }

  if (numberValue === ''){
      errors.number = 'Number is required';
      isValid = false;
  } else if (!isValidPhone(numberValue)){
      errors.number = 'Invalid phone number!';
      isValid = false;
  }


  // Set error messages for each input field
  for (const field in errors) {
      if (errors.hasOwnProperty(field)) {
          setError(document.getElementById(field), errors[field]);
      }
  }

  // Set success for fields without errors
  const fieldsWithoutErrors = ['first_name', 'last_name', 'email', 'number'];
  fieldsWithoutErrors.forEach(field => {
      if (!errors[field]) {
          setSuccess(document.getElementById(field));
      }
  });

  return isValid; // Return overall validation status
};
