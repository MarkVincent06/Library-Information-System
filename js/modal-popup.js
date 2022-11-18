const loginModal = document.getElementById("login-modal")
const signUpModal = document.getElementById("sign-up-modal")
const loginBtn = document.getElementById("login-btn")
const loginModalOverlay = document.getElementById("login-modal-overlay")

if(loginBtn) {
    loginBtn.addEventListener('click', () => {
        loginModal.classList.add("open")
        loginModalOverlay.classList.add("active")
    })
}

document.addEventListener('click', e => {
    if(e.target.classList.contains('close-btn')) {
        loginModal.classList.add("closing")
        loginModalOverlay.classList.add("closing")
        if(signUpModal.classList.contains('open-sign-up-modal')) {
            signUpModal.classList.add("close-sign-up-modal")
        }
        loginModal.addEventListener('animationend', () => {
            loginModal.classList.remove("closing", "open")
            loginModalOverlay.classList.remove("closing", "active")
            signUpModal.classList.remove("close-sign-up-modal", 'open-sign-up-modal')
            window.location.reload();
        }, {once: true})    
    }

    if(e.target.id === 'sign-up-link') {
        signUpModal.classList.add('open-sign-up-modal')
    }

    if(e.target.id === 'login-link') {
        signUpModal.classList.add("close-sign-up-modal")
        signUpModal.classList.remove("close-sign-up-modal", 'open-sign-up-modal')
    }
})

