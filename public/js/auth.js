// Password validation
document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.querySelector('form[action="/auth/register"]');
    if (registerForm) {
        const password = registerForm.querySelector('#password');
        const passwordConfirm = registerForm.querySelector('#password_confirm');
        const submitButton = registerForm.querySelector('button[type="submit"]');

        function validatePassword() {
            if (password.value !== passwordConfirm.value) {
                passwordConfirm.setCustomValidity("Passwords don't match");
            } else {
                passwordConfirm.setCustomValidity('');
            }
        }

        password.addEventListener('change', validatePassword);
        passwordConfirm.addEventListener('keyup', validatePassword);

        registerForm.addEventListener('submit', function(event) {
            if (password.value !== passwordConfirm.value) {
                event.preventDefault();
                alert("Passwords don't match!");
            }
        });
    }
});
