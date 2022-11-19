// This constant is also applied in the `sign-up-form-validation.js` file
const emailAndPassArray = JSON.parse(document.getElementById("hidden-input").value)

const loginForm = document.getElementById("login-form")
const email = document.getElementById("email")
const password = document.getElementById("password")
const loginSubmitValidationMsg = document.getElementById("login-submit-validation-msg")

loginForm.addEventListener('submit', e => {
    if(document.getElementsByClassName('error').length > 0) {
        email.parentElement.classList.remove('error')
        password.parentElement.classList.remove('error')
    }

    if(loginSubmitValidationMsg.style.display === 'block') {
        loginSubmitValidationMsg.style.display = 'none'
    }

    // checks if all the validations return true
    if((validateEmail(email.value) & validatePassword(password.value))) {
        // logs in the user if it matches the email and password from the database
        if(!checkUserAccount(email.value, password.value)) {
            e.preventDefault()
            loginSubmitValidationMsg.style.display = 'block'
        }
    } else {
        e.preventDefault()
    }
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

// checks if it matches the inputted email and password from the database
function checkUserAccount(emailValue, passwordValue) {
    for(let i=0; i<emailAndPassArray.length; i+=2) {
        if(emailValue === emailAndPassArray[i] && passwordValue === emailAndPassArray[i+1]) {
            return true
        }
    }
    return false
}

// Renders the error message in the DOM
function renderInputErrorMsg(input, message) {
    const formControl = input.parentElement
    const loginInputValidationMsg = formControl.querySelector('.login-input-validation-msg')

    loginInputValidationMsg.innerHTML = `<i class="fa-solid fa-circle-exclamation"></i>${message}`
    formControl.className = 'login-form-control error'
}

