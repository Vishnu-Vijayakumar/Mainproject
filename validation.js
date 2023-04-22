function firstNameValidate() {
    const firstNameInput = document.getElementById("first_name");
    const firstNameValue = firstNameInput.value.trim();
  
    if (firstNameValue.length === 0) {
      document.getElementById("empty-first-name").innerHTML = "Please enter your first name.";
      firstNameInput.classList.add("is-invalid");
      firstNameInput.classList.remove("is-valid");
    } else if (firstNameValue.charAt(0) !== firstNameValue.charAt(0).toUpperCase()) {
      document.getElementById("empty-first-name").innerHTML = "First letter of First Name must be capital";
      firstNameInput.classList.add("is-invalid");
      firstNameInput.classList.remove("is-valid");
    } else {
      document.getElementById("empty-first-name").innerHTML = "";
      firstNameInput.classList.remove("is-invalid");
      firstNameInput.classList.add("is-valid");
    }
  }
  
  function lastNameValidate() {
    const lastNameInput = document.getElementById("last_name");
    const lastNameValue = lastNameInput.value.trim();
  
    if (lastNameValue.length === 0) {
      document.getElementById("empty-last-name").innerHTML = "Please enter your last name.";
      lastNameInput.classList.add("is-invalid");
      lastNameInput.classList.remove("is-valid");
    } else if (lastNameValue.charAt(0) !== lastNameValue.charAt(0).toUpperCase()) {
      document.getElementById("empty-last-name").innerHTML = "First letter of Last Name must be capital";
      lastNameInput.classList.add("is-invalid");
      lastNameInput.classList.remove("is-valid");
    } else {
      document.getElementById("empty-last-name").innerHTML = "";
      lastNameInput.classList.remove("is-invalid");
      lastNameInput.classList.add("is-valid");
    }
  }

  const emailInput = document.querySelector('input[name="email"]');

  emailInput.addEventListener('input', function() {
    validateEmail(this.value);
  });
  



  const emailError = document.createElement('span');
emailError.classList.add('error-message');
emailError.innerText = 'Please enter a valid email address';

function validateEmail(email) {
  const isValid = email.trim() !== '';

  if (isValid) {
    emailInput.classList.remove('invalid');
    emailInput.classList.add('valid');
    emailError.style.display = 'none';
  } else {
    emailInput.classList.remove('valid');
    emailInput.classList.add('invalid');
    emailError.style.display = 'block';
  }
}

emailInput.parentNode.appendChild(emailError);
// Get the password and confirm password input elements
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementsByName('cpassword')[0];

// Get the empty password and verify password span elements
const emptyPasswordSpan = document.getElementById('empty-password');
const emptyVerifyPasswordSpan = document.getElementById('empty-verify-password');

// Function to validate password
function passwordValidate() {
  // Check if password is empty
  if (passwordInput.value === '') {
    emptyPasswordSpan.textContent = 'Password is required';
    passwordInput.classList.add('invalid');
    return false;
  } else {
    emptyPasswordSpan.textContent = '';
    passwordInput.classList.remove('invalid');
  }

  // Check if password is at least 8 characters long
  if (passwordInput.value.length < 8) {
    emptyPasswordSpan.textContent = 'Password must be at least 8 characters long';
    passwordInput.classList.add('invalid');
    return false;
  } else {
    emptyPasswordSpan.textContent = '';
    passwordInput.classList.remove('invalid');
  }

  // Check if password contains at least one uppercase letter
  const regex = /^(?=.*[A-Z])/;
  if (!regex.test(passwordInput.value)) {
    emptyPasswordSpan.textContent = 'Password must contain at least one uppercase letter';
    passwordInput.classList.add('invalid');
    return false;
  } else {
    emptyPasswordSpan.textContent = '';
    passwordInput.classList.remove('invalid');
  }

  // Check if password and confirm password match
  if (passwordInput.value !== confirmPasswordInput.value) {
    emptyVerifyPasswordSpan.textContent = 'Passwords do not match';
    confirmPasswordInput.classList.add('invalid');
    return false;
  } else {
    emptyVerifyPasswordSpan.textContent = '';
    confirmPasswordInput.classList.remove('invalid');
  }

  return true;
}

// Add event listeners to the password and confirm password input elements
passwordInput.addEventListener('keyup', passwordValidate);
confirmPasswordInput.addEventListener('keyup', passwordValidate);
function dobValidate() {
    const dobInput = document.getElementById('signin-dob');
    const dobError = document.getElementById('dob-error');
    const dobValue = dobInput.value;
    const today = new Date();
    const birthDate = new Date(dobValue);
  
    if (today < birthDate) {
      dobInput.classList.add('invalid');
      dobInput.classList.remove('valid');
      dobError.textContent = 'Please enter a valid date of birth';
    } else {
      dobInput.classList.remove('invalid');
      dobInput.classList.add('valid');
      dobError.textContent = '';
    }
  }
  
  const dobInput = document.getElementById('signin-dob');
  dobInput.addEventListener('change', dobValidate);
  function addressValidate() {
    const addressInput = document.getElementById('address-input');
    const addressError = document.getElementById('address-error');
    const addressValue = addressInput.value;
  
    if (addressValue.length < 10) {
      addressInput.classList.add('invalid');
      addressInput.classList.remove('valid');
      addressError.textContent = 'Address must contain at least 10 characters';
    } else {
      addressInput.classList.remove('invalid');
      addressInput.classList.add('valid');
      addressError.textContent = '';
    }
  }
  
  const addressInput = document.getElementById('address-input');
  addressInput.addEventListener('change', addressValidate);
  function pinCodeValidate() {
    let pinInput = document.getElementsByName("Pin")[0];
    let pin = pinInput.value;
    
    if (isNaN(pin) || pin.length !== 6) {
      pinInput.classList.add("invalid");
      return false;
    } else {
      pinInput.classList.remove("invalid");
      pinInput.classList.add("valid");
      return true;
    }
  }
  
  function pinCodeValidate() {
    let pinInput = document.getElementsByName("Pin")[0];
    let pin = pinInput.value;
    
    if (isNaN(pin) || pin.length !== 6) {
      pinInput.classList.add("invalid");
      return false;
    } else {
      pinInput.classList.remove("invalid");
      pinInput.classList.add("valid");
      return true;
    }
  }
  
  // Attach the validation function to the "onchange" event of the input element
  document.getElementsByName("Pin")[0].onchange = pinCodeValidate;
  function phoneValidate() {
    var countryCode = document.getElementsByName("country code")[0].value;
    var phone = document.getElementsByName("phone")[0].value;
    var phoneRegex = /^\d{10}$/; // regular expression to match a 10-digit phone number
    
    // combine country code and phone number
    var fullPhone = countryCode + phone;
    
    // validate the phone number
    if (!phoneRegex.test(phone)) {
      // show error message and add "invalid" class to input element
      document.getElementById("empty-phone").innerHTML = "Please enter a valid 10-digit phone number";
      document.getElementsByName("phone")[0].classList.add("invalid");
    } else {
      // clear error message and add "valid" class to input element
      document.getElementById("empty-phone").innerHTML = "";
      document.getElementsByName("phone")[0].classList.remove("invalid");
      document.getElementsByName("phone")[0].classList.add("valid");
    }
  }
  const usernameInput = document.querySelector('input[name="name"]');

  function validateUsername() {
    const username = usernameInput.value.trim();
  
    if (username.length < 10) {
      usernameInput.setCustomValidity('This field requires at least 10 characters.');
    } else {
      usernameInput.setCustomValidity('');
    }
  }
  
  usernameInput.addEventListener('input', validateUsername);
    