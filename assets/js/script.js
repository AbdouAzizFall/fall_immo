function toggleForm() {
    var loginForm = document.getElementById('login-form');
    var registerForm = document.getElementById('register-form');
    var headerText = document.getElementById('header-text');

    if (loginForm.style.display === 'none') {
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
        headerText.innerHTML = 'Se connecter';
    } else {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
        headerText.innerHTML = 'Créer un compte Locataire';
    }
}

function setRegisterDate() {
    var registerDateField = document.getElementById('register-date');
    registerDateField.value = new Date().toISOString();
}
