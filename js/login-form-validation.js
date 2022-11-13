const loginForm = document.getElementById("login-form")
const email = document.getElementById("email")
const password = document.getElementById("password")


loginForm.addEventListener('submit', e => {
    if(document.getElementsByClassName('error').length > 0) {
        email.parentElement.classList.remove('error')
        password.parentElement.classList.remove('error')
    }

    // returns true if all the input fields are valid
    if(!(validateEmail(email.value) & validatePassword(password.value))) {
        e.preventDefault()
    }

    e.preventDefault()
})

// validates email
function validateEmail(emailValue) {
    let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
    if(emailValue === "") {
        renderInputErrorMsg(email, "Enter an email address")  
    } else {
        if(emailValue.match(validRegex)) {
            return true
        } else {
            if(emailValue.indexOf('@') === -1) {
                renderInputErrorMsg(email, "Make sure to include the '@'")
            } else {
                renderInputErrorMsg(email, "This email address is not valid")
            }
        }
    }
    return false
}

// validates password
function validatePassword(passwordValue) {
    if(passwordValue === "") {
        renderInputErrorMsg(password, "Enter a password")
        return false
    } else {
        return true
    }
}

// Renders the error message in the DOM
function renderInputErrorMsg(input, message) {
    const formControl = input.parentElement
    const loginInputValidationMsg = formControl.querySelector('.login-input-validation-msg')

    loginInputValidationMsg.innerHTML = `<i class="fa-solid fa-circle-exclamation"></i>${message}`
    formControl.className = 'login-form-control error'
}

