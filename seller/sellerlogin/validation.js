const form = document.querySelector('#myForm');
const firstName = document.querySelector('#first_name');
const lastName = document.querySelector('#last_name');

form.addEventListener('submit', function(event) {
    if (firstName.value.trim() === '') {
        event.preventDefault(); // prevent the form from submitting
        alert('Please enter your first name.');
        return false;
    }

    if (lastName.value.trim() === '') {
        event.preventDefault(); // prevent the form from submitting
        alert('Please enter your last name.');
        return false;
    }
});
const password = document.querySelector('#password');
const confirm_password = document.querySelector('#confirm_password');

password.addEventListener('input', function() {
    const feedback = password.parentNode.querySelector('.invalid-feedback');
    // check if password meets the required criteria
    if (!isValidPassword(password.value)) {
        feedback.textContent = 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.';
        password.classList.add('is-invalid');
    } else {
        feedback.textContent = '';
        password.classList.remove('is-invalid');
    }
    // check if passwords match
    if (confirm_password.value !== '' && password.value !== confirm_password.value) {
        const confirmFeedback = confirm_password.parentNode.querySelector('.invalid-feedback');
        confirmFeedback.textContent = 'Passwords do not match.';
        confirm_password.classList.add('is-invalid');
    } else {
        const confirmFeedback = confirm_password.parentNode.querySelector('.invalid-feedback');
        confirmFeedback.textContent = '';
        confirm_password.classList.remove('is-invalid');
    }
});

confirm_password.addEventListener('input', function() {
    const feedback = confirm_password.parentNode.querySelector('.invalid-feedback');
    // check if passwords match
    if (password.value !== confirm_password.value) {
        feedback.textContent = 'Passwords do not match.';
        confirm_password.classList.add('is-invalid');
    } else {
        feedback.textContent = '';
        confirm_password.classList.remove('is-invalid');
    }
});

function isValidPassword(password) {
    const pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{8,}$/;
    return pattern.test(password);
}
const username = document.querySelector('input[name="Username"]');

username.addEventListener('input', function() {
    // check if username meets the required criteria
    if (!isValidUsername(username.value)) {
        username.setCustomValidity('Username must be at least 4 characters long and contain only letters, numbers, and underscores.');
    } else {
        username.setCustomValidity('');
    }
});

function isValidUsername(username) {
    const pattern = /^[a-zA-Z0-9_]{4,}$/;
    return pattern.test(username);
}
