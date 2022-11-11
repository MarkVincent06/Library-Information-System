const email = document.getElementById("email")
const password = document.getElementById("password")
const loginForm = document.getElementById("login-form")
const formInputsValidations = document.getElementsByClassName("form-input-validation")

loginForm.addEventListener('submit', e => {
    if(checkEmail(email.value) && checkPassword(password.value)) {
        console.log("Log in success")
    } else {
        emailValidationMsg()
        passwordValidationMsg()
        e.preventDefault()
    }

    // Add or remove email validation message
    function emailValidationMsg() {
        if(!checkEmail(email.value))  {
            email.classList.add('error-input')
            formInputsValidations[0].style.display = "block"
        } else {
            email.classList.remove('error-input')
            formInputsValidations[0].style.display = "none"
        }
    }

    // Add or remove password validation message
    function passwordValidationMsg() {
        if(!checkPassword(password.value))  {
            password.classList.add('error-input')
            formInputsValidations[1].style.display = "block"
        } else {
            password.classList.remove('error-input')
            formInputsValidations[1].style.display = "none"
        }
    }
    
    // Validation for email
    function checkEmail(emailValue) {
        // Checks if the value is empty or not
        return (emailValue == null || emailValue.length == 0) ? false : true
    }   

    // Validation for password
    function checkPassword(passwordValue) {
        // Checks if the value is empty or not
        return (passwordValue == null || passwordValue.length == 0) ? false : true
    }   
})