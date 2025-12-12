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

    //Posts display

    const allPosts = document.getElementById('allPosts');
    const userPosts = document.getElementById('userPosts');

    if (userPosts) userPosts.style.display = 'none';
    if (allPosts) allPosts.style.display = 'block';

    window.showAllPosts = () => {
        allPosts.style.display = 'block';
        userPosts.style.display = 'none';
    }

    window.showMyPosts = () => {
        allPosts.style.display = 'none';
        userPosts.style.display = 'block';
    }
});