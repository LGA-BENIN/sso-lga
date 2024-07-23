document.addEventListener('DOMContentLoaded', function() {
    const nextBtns = document.querySelectorAll('.next-btn');
    const prevBtns = document.querySelectorAll('.prev-btn');
    const submitBtn = document.querySelector('button[type="submit"]');
    const progress = document.getElementById('progress');
    const steps = document.querySelectorAll('.step');
    const formSteps = document.querySelectorAll('.form-step');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm-password');
    const confirmPasswordError = document.getElementById('confirm-password-error');
    let activeStep = 1;

    nextBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            if (validateFormStep(activeStep)) {
                activeStep++;
                updateFormSteps();
                updateProgressBar();
            }
        });
    });

    prevBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            activeStep--;
            updateFormSteps();
            updateProgressBar();
        });
    });

    formSteps.forEach(formStep => {
        const requiredFields = formStep.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            field.addEventListener('input', validateForm);
        });
    });

    function validateFormStep(step) {
        const formStep = formSteps[step - 1];
        const requiredFields = formStep.querySelectorAll('[required]');
        let valid = true;

        requiredFields.forEach(field => {
            const errorMessage = field.nextElementSibling;
            if (!field.value.trim()) {
                errorMessage.style.display = 'block';
                valid = false;
            } else {
                errorMessage.style.display = 'none';
            }
        });

        if (step === formSteps.length) {
            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordError.style.display = 'block';
                valid = false;
            } else {
                confirmPasswordError.style.display = 'none';
            }
        }

        validateForm(); // Validate the entire form to update the submit button state

        return valid;
    }


    function updateFormSteps() {
        formSteps.forEach((formStep, index) => {
            if (index + 1 === activeStep) {
                formStep.classList.add('active');
            } else {
                formStep.classList.remove('active');
            }
        });
    }

    function updateProgressBar() {
        steps.forEach((step, index) => {
            if (index + 1 <= activeStep) {
                step.classList.add('active');
            } else {
                step.classList.remove('active');
            }
        });
        progress.style.width = ((activeStep - 1) / (steps.length - 1)) * 100 + '%';
    }

     function validateForm() {
        let formIsValid = true;

        formSteps.forEach(formStep => {
            const requiredFields = formStep.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    formIsValid = false;
                }
            });
        });

        if (passwordInput.value !== confirmPasswordInput.value) {
            formIsValid = false;
        }

        submitBtn.disabled = !formIsValid;
    }

    passwordInput.addEventListener('input', validatePassword);
    confirmPasswordInput.addEventListener('input', validatePasswordMatch);

    function validatePassword() {
        const password = passwordInput.value;
        document.getElementById('length-condition').classList.toggle('met', password.length >= 8);
        document.getElementById('uppercase-condition').classList.toggle('met', /[A-Z]/.test(password));
        document.getElementById('number-condition').classList.toggle('met', /[0-9]/.test(password));
        document.getElementById('special-char-condition').classList.toggle('met', /[!@#$%^&*(),.?":{}|<>]/.test(password));
        validateForm();
    }

    function validatePasswordMatch() {
        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordError.style.display = 'block';
        } else {
            confirmPasswordError.style.display = 'none';
        }
        validateForm();
    }

    window.togglePasswordVisibility = function(id) {
        const input = document.getElementById(id);
        const icon = input.nextElementSibling;
    
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility';
        }
    };
    document.getElementById('signupForm').addEventListener('submit', function(e) {
        var newsletter = document.getElementById('newsletter');
        var optin = document.getElementById('terms');
    
        if (!newsletter.checked) {
            newsletter.insertAdjacentHTML('afterend', '<input type="hidden" name="newsletter" value="false">');
        }
    
        if (!optin.checked) {
            optin.insertAdjacentHTML('afterend', '<input type="hidden" name="optin" value="false">');
        }
    });

    validateForm(); // Initial call to validate the form on load
});
