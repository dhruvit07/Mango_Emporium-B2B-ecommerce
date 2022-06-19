let _container = document.getElementById("_container");

toggle = () => {
  console.log("hello");
  _container.classList.toggle("sign-up");
  _container.classList.toggle("sign-in");
};

timeout = (_class) => {
setTimeout(() => {
  _container.classList.add(_class);
}, 200);
}

const form = document.getElementById('register');
const username = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('confirm-password');
const number = document.getElementById('number');

//Show input error messages
function showError(input, message) {
  const formControl = input.parentElement;
  formControl.className = 'input-group error';
  const small = formControl.querySelector('small');
  small.innerText = message;
}

//show success colour
function showSucces(input) {
  const formControl = input.parentElement;
  formControl.className = 'input-group success';
}

//check email is valid
function checkEmail(input) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (re.test(input.value.trim())) {
    showSucces(input);
    return true;
  } else {
    showError(input, 'Email is not invalid');
  }
}


//checkRequired fields
function checkRequired(inputArr) {

  var flag = false;
  inputArr.forEach(function (input) {
    if (input.value.trim() === '') {
      showError(input, `${getFieldName(input)} is required`)
      flag = false;
    } else {
      showSucces(input);
      flag = true;
    }
  });
  return flag;
}


//check input Length
function checkLength(input, min, max) {
  if (input.value.length < min) {
    showError(input, `${getFieldName(input)} must be at least ${min} characters`);
  } else if (input.value.length > max) {
    showError(input, `${getFieldName(input)} must be les than ${max} characters`);
  } else {
    showSucces(input);
    return true;
  }
}

//get FieldName
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

// check passwords match
function checkPasswordMatch(input1, input2) {
  if (input1.value !== input2.value) {
    showError(input2, 'Passwords do not match');
  }
  else {
    return true;
  }
}

function checkPhone(input1)
{
  console.log("hello");
  if (input1.value.match("^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$")) {
    showSucces(input1);
    return true;
  }
  else{
  showError(input1, 'Invalid Number');

  }
}

function checkPassword(input1) {
  var lowerCaseLetters = /[a-z]/g;
  var upperCaseLetters = /[A-Z]/g;
  var numbers = /[0-9]/g;
  if (!input1.value.match(lowerCaseLetters) || !input1.value.match(upperCaseLetters) || !input1.value.match(numbers)) {
    showError(input1, 'password must contain at least 1 upper an lower letters and digits');
  }
  else {
    showSucces(input1);
    return true;
  }
}
$(document).ready(function() {
  $('.toggle').click(function() {
    $('.sidebar-contact').toggleClass('active')
    $('.toggle').toggleClass('active')
  })
})


//Event Listeners
form.addEventListener('submit', function (e) {
  // console.log("Hellow");
  // console.log(checkRequired([username, email, password, password2]));
  if (checkPhone(number)
    && checkRequired([username, email, password, password2,number])
    && checkLength(username, 3, 50)
    && checkLength(password, 8, 25)
    && checkEmail(email)
    && checkPasswordMatch(password, password2)
    && checkPassword(password)
    ) {
    return true;
    
  }
  else {
    e.preventDefault();

  }


});
