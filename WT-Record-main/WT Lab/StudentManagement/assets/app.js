document.addEventListener('DOMContentLoaded', function () {
    // Phone Number Validation
    const phoneInput = document.getElementById('phone_number');
    const plabel = document.getElementById('phonelabel');

    phoneInput.addEventListener('input', function () {
        validatePhoneNumber();
    });

    function validatePhoneNumber() {
        const sanitizedValue = phoneInput.value.replace(/\D/g, '');
        phoneInput.value = sanitizedValue;

        if (sanitizedValue.length === 10) {
            setValidationSuccess(phoneInput, plabel);
        } else {
            setValidationError(phoneInput, plabel, 'Enter a valid Phone Number');
        }
    }

    // Email Validation
    const emailInput = document.getElementById('email');
    const elabel = document.getElementById('emaillabel');

    emailInput.addEventListener('input', function () {
        validateEmail();
    });

    function validateEmail() {
        const emailValue = emailInput.value;
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(edu|com|net|org|in|co)$/;

        if (emailPattern.test(emailValue)) {
            setValidationSuccess(emailInput, elabel);
        } else {
            setValidationError(emailInput, elabel, 'Enter a valid Email');
        }
    }

    // Common function for setting validation success
    function setValidationSuccess(inputElement, labelElement) {
        inputElement.style.borderColor = '';
        inputElement.setCustomValidity('');
        labelElement.innerHTML = inputElement.id.charAt(0).toUpperCase() + inputElement.id.slice(1);
        labelElement.style.color = '';
    }

    // Common function for setting validation error
    function setValidationError(inputElement, labelElement, errorMessage) {
        inputElement.style.borderColor = 'red';
        inputElement.setCustomValidity('');
        labelElement.innerHTML = errorMessage;
        labelElement.style.color = 'red';
    }

    // Preventing Submission from invalid email and Phone
    const form = document.getElementById('admissionForm');
    form.addEventListener('submit', function (event) {
        validateEmail();
        validatePhoneNumber();

        if (!form.checkValidity()) {
            event.preventDefault(); // Prevent form submission
        }
    });
});
