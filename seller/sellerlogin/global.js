(function ($) {
    'use strict';
    /*==================================================================
        [ Daterangepicker ]*/

// Get form fields
const firstname = document.getElementById('first_name');
const lastname = document.getElementById('last_name');
const password = document.getElementById('Password');
const cpassword = document.getElementById('Confirm_Password');
const username = document.getElementById('Username');
const company = document.getElementById('company');

const email = document.getElementById('email');

// Add event listeners to form fields
firstname.addEventListener('input', validateFirstName);
lastname.addEventListener('input', validateLastName);
username.addEventListener('input', validateUsername);
company.addEventListener('input', validateCompany);
password.addEventListener('input', validatePassword);
email.addEventListener('input', validateEmail);

// Define validation functions
function validateFirstName() {
  if (firstname.value === '') {
    firstname.setCustomValidity('First name is required');
  } else {
    firstname.setCustomValidity('');
  }
}

function validateLastName() {
  if (lastname.value === '') {
    lastname.setCustomValidity('Last name is required');
  } else {
    lastname.setCustomValidity('');
  }
}

function validateUsername() {
  if (username.value === '') {
    username.setCustomValidity('Username is required');
  } else {
    username.setCustomValidity('');
  }
}

function validateCompany() {
  if (company.value === '') {
    company.setCustomValidity('Company is required');
  } else {
    company.setCustomValidity('');
  }
}

function validatePassword() {
  if (password.value === '') {
    password.setCustomValidity('Password is required');
  } else if (password.value.length < 8) {
    password.setCustomValidity('Password must be at least 8 characters');
  } else {
    password.setCustomValidity('');
  }
}

function validateEmail() {
  if (email.value === '') {
    email.setCustomValidity('Email is required');
  } else if (!isValidEmail(email.value)) {
    email.setCustomValidity('Invalid email format');
  } else {
    email.setCustomValidity('');
  }
}

function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}




    try {
        $('.js-datepicker').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "autoUpdateInput": false,
            locale: {
                format: 'DD/MM/YYYY'
            },
        });
    
        var myCalendar = $('.js-datepicker');
        var isClick = 0;
    
        $(window).on('click',function(){
            isClick = 0;
        });
    
        $(myCalendar).on('apply.daterangepicker',function(ev, picker){
            isClick = 0;
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
    
        });
    
        $('.js-btn-calendar').on('click',function(e){
            e.stopPropagation();
    
            if(isClick === 1) isClick = 0;
            else if(isClick === 0) isClick = 1;
    
            if (isClick === 1) {
                myCalendar.focus();
            }
        });
    
        $(myCalendar).on('click',function(e){
            e.stopPropagation();
            isClick = 1;
        });
    
        $('.daterangepicker').on('click',function(e){
            e.stopPropagation();
        });
    
    
    } catch(er) {console.log(er);}
    /*[ Select 2 Config ]
        ===========================================================*/
    
    try {
        var selectSimple = $('.js-select-simple');
    
        selectSimple.each(function () {
            var that = $(this);
            var selectBox = that.find('select');
            var selectDropdown = that.find('.select-dropdown');
            selectBox.select2({
                dropdownParent: selectDropdown
            });
        });
    
    } catch (err) {
        console.log(err);
    }
    
    const passwordVerify = (password) => {
        const regex =
        /(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{5,}/;
        return regex.test(password) && password.length >= 8;
      };


})(jQuery);