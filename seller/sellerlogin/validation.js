// Get references to input fields
const firstNameInput = document.querySelector('input[name="first_name"]');
const lastNameInput = document.querySelector('input[name="last_name"]');

// Regular expression for validating name fields
const nameRegex = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;

// Add event listeners to input fields
firstNameInput.addEventListener('input', () => {
  if (nameRegex.test(firstNameInput.value)) {
    firstNameInput.classList.remove('is-invalid');
  } else {
    firstNameInput.classList.add('is-invalid');
  }
});

lastNameInput.addEventListener('input', () => {
  if (nameRegex.test(lastNameInput.value)) {
    lastNameInput.classList.remove('is-invalid');
  } else {
    lastNameInput.classList.add('is-invalid');
  }
});

const passwordInput = document.querySelector('#password');
const confirmInput = document.querySelector('#confirm_password');
const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

// Add event listener to the password field
passwordInput.addEventListener('input', () => {
  const password = passwordInput.value.trim();
  const feedback = passwordInput.parentNode.querySelector('.invalid-feedback');
  if (password.length === 0) {
    feedback.innerText = 'Please enter a password';
    feedback.style.display = 'block';
  } else if (!passwordRegex.test(password)) {
    feedback.innerText = 'Password must contain at least 8 characters with at least one uppercase letter, one lowercase letter, and one number.';
    feedback.style.display = 'block';
  } else {
    feedback.innerText = '';
    feedback.style.display = 'none';
  }
});

// Add event listener to the confirm password field
confirmInput.addEventListener('input', () => {
  const confirm = confirmInput.value.trim();
  const feedback = confirmInput.parentNode.querySelector('.invalid-feedback');
  if (confirm !== passwordInput.value.trim()) {
    feedback.innerText = 'Passwords do not match';
    feedback.style.display = 'block';
  } else {
    feedback.innerText = '';
    feedback.style.display = 'none';
  }
});


function isValidUsername(username) {
    const pattern = /^[a-zA-Z0-9_]{4,}$/;
    return pattern.test(username);
}
