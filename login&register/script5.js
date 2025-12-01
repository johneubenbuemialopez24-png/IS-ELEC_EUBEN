const authModal = document.querySelector('.auth-modal');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const loginBtnModal = document.querySelector('.login-btn-modal');
const closeBtnModal = document.querySelector('.close-btn-modal');
const profileBox = document.querySelector('.profile-box');
const avatarCircle = document.querySelector('.avatar-circle');
const logoutLink = document.querySelector('.logout-link');
const alertBox = document.querySelector('.alert-box');

if (registerLink)
registerLink.addEventListener('click', () => {
    authModal.classList.add('slide');
});

if (loginLink)
loginLink.addEventListener('click', () => {
    authModal.classList.remove('slide');
});

if (loginBtnModal)
loginBtnModal.addEventListener('click', () => {
    authModal.classList.add('show');
});

closeBtnModal.addEventListener('click', () => {
    authModal.classList.remove('show', 'slide');
});

if (avatarCircle) {
    avatarCircle.addEventListener('click', () => {
        profileBox.classList.toggle('show');
    });
}

if (logoutLink)
logoutLink.addEventListener('click', () => {
    profileBox.classList.remove('show');
});

document.addEventListener('click', (e) => {
    if (!profileBox.contains(e.target) && e.target !== avatarCircle) {
        profileBox.classList.remove('show');
    }
});

if (alertBox) {
    setTimeout(() => alertBox.classList.add('show'), 50);
    setTimeout(() => {
        alertBox.classList.remove('show');
        setTimeout(() => alertBox.remove(), 1000);
    }, 6000);
}
