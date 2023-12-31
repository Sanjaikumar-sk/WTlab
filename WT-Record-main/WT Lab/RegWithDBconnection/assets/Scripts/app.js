document.querySelectorAll('input[type="text"]').forEach(function (input) {
  input.addEventListener('input', function () {
    this.value = this.value.toUpperCase();
  });
});

// Photo Upload Button
const iactualBtn = document.getElementById('img-btn');
const ifileChosen = document.getElementById('img-chosen');
iactualBtn.addEventListener('change', function () {
  ifileChosen.textContent = this.files[0].name
})
// Resume Upload Button
const ractualBtn = document.getElementById('res-btn');
const rfileChosen = document.getElementById('res-chosen');
ractualBtn.addEventListener('change', function () {
  rfileChosen.textContent = this.files[0].name
})

// Phone Number Validation

const phoneInput = document.getElementById('phone');
const plable = document.getElementById('phonelabid');

phoneInput.addEventListener('input', function (event) {
  const sanitizedValue = phoneInput.value.replace(/\D/g, '');
  phoneInput.value = sanitizedValue;
  if (sanitizedValue.length === 10) {
    phoneInput.style.borderColor = '';
    phoneInput.setCustomValidity('');
    plable.innerHTML = 'Phone Number';
    plable.style.color = '';
  } else {
    phoneInput.style.borderColor = 'red';
    phoneInput.setCustomValidity('');
    plable.innerHTML = 'Enter valid Phone Number';
    plable.style.color = 'red';
  }
});

// Email Validation

const emailInput = document.getElementById('emailinput');
const elabel = document.getElementById('emaillabel');

emailInput.addEventListener('input', function (event) {
  const emailValue = emailInput.value;
  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(edu|com|net|org|in|co)$/;
  if (emailPattern.test(emailValue)) {
    emailInput.style.borderColor = '';
    emailInput.setCustomValidity('');
    elabel.innerHTML = 'Email';
    elabel.style.color = '';
  }   
  else {
    emailInput.style.borderColor = 'red';
    emailInput.setCustomValidity('');
    elabel.innerHTML = 'Enter valid Email';
    elabel.style.color = 'red';
  }
});


// Preventing Submission from invalid email and Phone

const form = document.querySelector('form');
form.addEventListener('submit', function (event) {
  const emailValue = emailInput.value;
  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(edu|com|net|org|in)$/;
  const sanitizedValue = phoneInput.value.replace(/\D/g, '');

  if (!emailPattern.test(emailValue)) {
    emailInput.style.borderColor = 'red';
    emailInput.setCustomValidity('');
    elabel.innerHTML = 'Enter valid Email';
    elabel.style.color = 'red';
    event.preventDefault(); // Prevent form submission
  }
  if (sanitizedValue.length !== 10) {
    phoneInput.style.borderColor = 'red';
    phoneInput.setCustomValidity('');
    plable.innerHTML = 'Enter valid Phone Number';
    plable.style.color = 'red';
    event.preventDefault(); // Prevent form submission
  }
});

