import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');

    // Hide both forms initially, show only login by default
    if (registerForm) registerForm.style.display = 'none';
    if (loginForm) loginForm.style.display = 'block';

    // Attach functions to window so onclick works
    window.showRegister = () => {
        registerForm.style.display = 'block';
        loginForm.style.display = 'none';
    };

    window.showLogin = () => {
        registerForm.style.display = 'none';
        loginForm.style.display = 'block';
    };
});