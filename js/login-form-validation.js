const email = document.getElementById("email")
const password = document.getElementById("password")
const loginForm = document.getElementById("login-form")
const loginInputValidationMsg = document.getElementsByClassName("login-input-validation-msg")
const loginSubmitValidationMsg = document.getElementById("login-submit-validation-msg")

loginForm.addEventListener('submit', e => {
    if(checkEmail(email.value) && checkPassword(password.value)) {
        removeAllErrorStylings()
        // This data is from the database
        if(email.value === 'Mark' && password.value === '123') { 
            loginSubmitValidationMsg.style.display = 'none'
            console.log("Log in success!")
            e.preventDefault() // Will remove this later
        } else {
            loginSubmitValidationMsg.style.display = 'block'
            console.log("Log in failed!")
            e.preventDefault() // Will remove this later
        }
    } else {
        renderValidationMsg()
        e.preventDefault()
    }

    // Add or remove input validation message
    function renderValidationMsg() {
        if(!checkEmail(email.value))  {
            email.classList.add('error-input')
            loginInputValidationMsg[0].style.display = "block"
        } else {
            email.classList.remove('error-input')
            loginInputValidationMsg[0].style.display = "none"
        }

        if(!checkPassword(password.value))  {
            password.classList.add('error-input')
            loginInputValidationMsg[1].style.display = "block"
        } else {
            password.classList.remove('error-input')
            loginInputValidationMsg[1].style.display = "none"
        }

        loginSubmitValidationMsg.style.display === 'block' ? loginSubmitValidationMsg.style.display = 'none' : null
    }

    // Validation for email
    function checkEmail(emailValue) {
        return hasValue(emailValue) ? true : false
    }   

    // Validation for password
    function checkPassword(passwordValue) {
        return hasValue(passwordValue) ? true : false
    }   

    // Checks if the input has a value
    function hasValue(inputValue) {
        return (inputValue != null && inputValue.length > 0 ) ? true : false
    }

    // Removes all error stylings
    function removeAllErrorStylings() {
        if(email.classList.contains('error-input')) {
            email.classList.remove('error-input')
            loginInputValidationMsg[0].style.display = "none"
        } 

        if(password.classList.contains('error-input')) {
            password.classList.remove('error-input')
            loginInputValidationMsg[1].style.display = "none"
        }

        loginSubmitValidationMsg.style.display === 'block' ? loginSubmitValidationMsg.style.display = 'none' : null
    }
})