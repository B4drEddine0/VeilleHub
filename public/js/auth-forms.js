document.addEventListener('DOMContentLoaded', function() {
    // Handle registration form
    const registerForm = document.querySelector('form[action="/register"]');
    if (registerForm) {
        registerForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            clearErrors();

            const formData = new FormData(this);
            try {
                const response = await fetch('/register', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();
                
                if (data.success) {
                    // Show success message
                    showMessage('success', data.message);
                    // Redirect after a short delay
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1500);
                } else {
                    // Show validation errors
                    Object.keys(data.errors).forEach(field => {
                        showError(field, data.errors[field]);
                    });
                }
            } catch (error) {
                showMessage('error', 'An error occurred. Please try again.');
            }
        });
    }

    // Handle login form
    const loginForm = document.querySelector('form[action="/login"]');
    if (loginForm) {
        loginForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            clearErrors();

            const formData = new FormData(this);
            try {
                const response = await fetch('/login', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();
                
                if (data.success) {
                    // Show success message
                    showMessage('success', data.message);
                    // Redirect after a short delay
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1500);
                } else {
                    // Show validation errors
                    Object.keys(data.errors).forEach(field => {
                        showError(field, data.errors[field]);
                    });
                }
            } catch (error) {
                showMessage('error', 'An error occurred. Please try again.');
            }
        });
    }

    // Helper functions
    function showError(field, message) {
        const input = document.querySelector(`[name="${field}"]`);
        if (input) {
            input.classList.add('border-red-500');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'text-red-500 text-xs mt-1';
            errorDiv.textContent = message;
            input.parentNode.appendChild(errorDiv);
        }
    }

    function clearErrors() {
        // Remove all error messages
        document.querySelectorAll('.text-red-500').forEach(el => el.remove());
        // Remove red borders
        document.querySelectorAll('.border-red-500').forEach(el => {
            el.classList.remove('border-red-500');
        });
    }

    function showMessage(type, message) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `fixed top-4 right-4 p-4 rounded-lg ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        } text-white`;
        messageDiv.textContent = message;
        document.body.appendChild(messageDiv);
        
        // Remove the message after 3 seconds
        setTimeout(() => {
            messageDiv.remove();
        }, 3000);
    }
});
