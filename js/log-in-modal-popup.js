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
        loginModal.classList.remove("closing")
        loginModal.classList.remove("open")
        modalOverlay.classList.remove("closing")
        modalOverlay.classList.remove("active")
        document.getElementById("email").value = ""
        document.getElementById("password").value = ""
    }, {once: true})
})