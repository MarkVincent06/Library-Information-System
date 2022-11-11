const loginModal = document.getElementById("login-modal")
const loginBtn = document.getElementById("login-btn")
const closeBtn = document.getElementById("close-btn")
const modalOverlay = document.getElementById("modal-overlay")

loginBtn.addEventListener('click', () => {
    loginModal.classList.add("open")
    modalOverlay.classList.add("active")
})

closeBtn.addEventListener('click', () => {
    loginModal.classList.add("closing")
    modalOverlay.classList.add("closing")
    loginModal.addEventListener('animationend', () => {
        loginModal.classList.remove("closing", "open")
        modalOverlay.classList.remove("closing", "active")
        window.location.reload();
    }, {once: true})    
})