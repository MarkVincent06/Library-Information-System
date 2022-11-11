const loginModal = document.getElementById("login-modal")
const loginBtn = document.getElementById("login-btn")
const closeBtn = document.getElementById("close-btn")
const loginModalOverlay = document.getElementById("login-modal-overlay")

loginBtn.addEventListener('click', () => {
    loginModal.classList.add("open")
    loginModalOverlay.classList.add("active")
})

closeBtn.addEventListener('click', () => {
    loginModal.classList.add("closing")
    loginModalOverlay.classList.add("closing")
    loginModal.addEventListener('animationend', () => {
        loginModal.classList.remove("closing", "open")
        loginModalOverlay.classList.remove("closing", "active")
        window.location.reload();
    }, {once: true})    
})