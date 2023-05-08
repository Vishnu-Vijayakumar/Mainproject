const pName = document.getElementById('pName');
const pNameError = document.getElementById('pNameError');

// Add a listener to the input field
pName.addEventListener('input', function() {
  // Check if the input is valid
  if (pName.validity.valid) {
    // If it is valid, remove any error messages and styling
    pNameError.textContent = '';
    pName.classList.remove('error');
  } else {
    // If it is not valid, display an error message and style the field
    pNameError.textContent = 'Please enter a book name.';
    pName.classList.add('error');
  }
});

const pPrice = document.getElementById('pPrice');

  // Add event listener to the input to validate it
  pPrice.addEventListener('input', function() {
    const value = pPrice.value.trim();
    if (isNaN(value) || value < 0) {
      pPrice.classList.add('error');
    } else {
      pPrice.classList.remove('error');
    }
  });
   // Get the input element
   const pAuthor = document.getElementById('pAuthor');

   // Add event listener to the input to validate it
   pAuthor.addEventListener('input', function() {
     if (pAuthor.value.trim() === '') {
       pAuthor.classList.add('error');
       pAuthor.setCustomValidity('Please enter a book author.');
     } else if (pAuthor.value.trim().split(' ')[0][0] !== pAuthor.value.trim().split(' ')[0][0].toUpperCase()) {
       pAuthor.classList.add('error');
       pAuthor.setCustomValidity('The first name of the author must be capitalized.');
     } else {
       pAuthor.classList.remove('error');
       pAuthor.setCustomValidity('');
     }
   });
   // Get the input element
  const pOffer = document.getElementById('pOffer');

  // Add event listener to the input to validate it
  pOffer.addEventListener('input', function() {
    const regex = /^[A-Za-z ]+$/;
    if (!regex.test(pOffer.value.trim())) {
      pOffer.classList.add('error');
      pOffer.setCustomValidity('Please enter a valid book category (letters and spaces only).');
    } else {
      pOffer.classList.remove('error');
      pOffer.setCustomValidity('');
    }
  });
   // Get the input element
   const pstock = document.getElementById('pstock');

   // Add event listener to the input to validate it
   pstock.addEventListener('input', function() {
     const regex = /^[0-9]+$/;
     if (!regex.test(pstock.value.trim())) {
       pstock.classList.add('error');
       pstock.setCustomValidity('Please enter only numbers for book stock.');
     } else {
       pstock.classList.remove('error');
       pstock.setCustomValidity('');
     }
   });