const specialInputs = document.querySelectorAll('#first_name, #last_name');
specialInputs.forEach(function(input) {
  input.addEventListener('keydown', function(event) {
    if (!(/[a-zA-Z\s]/).test(event.key)) {
      event.preventDefault();
    }
  });
});



const form = document.getElementById('visitorForm');
const first_name = document.getElementById('first_name');
const last_name = document.getElementById('last_name');
const purpose = document.getElementById('purpose');



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

  const firstNameValue = first_name.value.trim();
  const lastNameValue = last_name.value.trim();
  const purposeValue = purpose.value.trim();


  if(firstNameValue === ''){
      errors.first_name = 'First name is required';
      isValid = false;
  }

  if(lastNameValue === ''){
      errors.last_name = 'Last name is required';
      isValid = false;
  }

  if(purposeValue === ''){
    errors.purpose = 'Purpose is required';
    isValid = false;
}

  // Set error messages for each input field
  for (const field in errors) {
      if (errors.hasOwnProperty(field)) {
          setError(document.getElementById(field), errors[field]);
      }
  }

  // Set success for fields without errors
  const fieldsWithoutErrors = ['first_name', 'last_name', 'purpose'];
  fieldsWithoutErrors.forEach(field => {
      if (!errors[field]) {
          setSuccess(document.getElementById(field));
      }
  });

  return isValid; // Return overall validation status
};
