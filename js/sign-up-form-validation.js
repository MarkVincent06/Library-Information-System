const signUpForm = document.getElementById("sign-up-form")
const newFirstName = document.getElementById("new-first-name")
const newLastName = document.getElementById("new-last-name")
const newEmail = document.getElementById("new-email")
const newPassword = document.getElementById("new-password")
const confirmPassword = document.getElementById("confirm-password")
const hiddenInput = document.getElementById("hidden-input")


signUpForm.addEventListener('submit', e => {
    if(document.getElementsByClassName('error').length > 0) {
        removeErrorClass()
    }

    // submits the form if all the validations return true
    if(checkFirstNameAndLastName(newFirstName.value.trim(), newLastName.value.trim())
        & checkEmail(newEmail.value.trim())
        & checkPassword(newPassword.value.trim(), confirmPassword.value.trim())) {
    } else {
        e.preventDefault()
    }

})

// Checks first name and last name
function checkFirstNameAndLastName(firstNameValue, lastNameValue) {
    if(firstNameValue === '' || lastNameValue == '') {
        if(firstNameValue === '' && lastNameValue === '') {
            set2ErrorsFor(newFirstName, newLastName, "Enter first and last names")
        } else if(firstNameValue === "") {
            setErrorFor(newFirstName, "Enter first name") 
        } else if(lastNameValue === "") {
            setErrorFor(newLastName, "Enter last name")
        } 
    } else if( (firstNameValue.length + lastNameValue.length) <=2) {
        setErrorFor(newFirstName, "First or last names must contain at least 3 characters")
    } else {
       return true
    }
    return false
}

 // Checks email
function checkEmail(emailValue) {
    let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
    if(emailValue.length >=6 && emailValue.length <= 40) {
        if(emailValue.match(validRegex)) {
            let isEmailUnique = true
            // this `emailAndPassArray` is declared in the `login-form-validation.js` file
            for(i=0; i<emailAndPassArray.length; i+=2) {
                if(emailAndPassArray[i] === emailValue) {
                    setErrorFor(newEmail, "That email is already taken. Try another.")
                    isEmailUnique = false
                    break
                }
            }   
            return isEmailUnique ? true : false
        } else {
            if(emailValue.indexOf('@') === -1) {
                setErrorFor(newEmail, "Make sure to include the '@'")
            } else {
                setErrorFor(newEmail, "This email address is not valid")
            }
        }
    } else if(emailValue === "") {
        setErrorFor(newEmail, "Enter an email address")
    } else {
        setErrorFor(newEmail, "Sorry, your username must be between 6 and 40 characters long")
    }
    return false
}

// Checks password
function checkPassword(passwordValue, confirmPasswordValue) {
     if(passwordValue.length >= 8) {
        if(confirmPasswordValue === passwordValue) {
            return true
        } else if(confirmPasswordValue === ""){
            setErrorFor(confirmPassword, "Confirm your password")
        } else {
            setErrorFor(confirmPassword, "Those passwords didn't match. Try again")
            confirmPassword.value = ""
        }
    } else if(passwordValue === "") {
        setErrorFor(newPassword, "Enter a password")
    } else {
        setErrorFor(newPassword, "Use 8 characters or more for your password")
    }
    return false
}

// Sets error depending on the input and the message
function setErrorFor(input, message) {
    const formControl = input.parentElement // Gets the parent element of the input
    const signUpInputValidationMsg = formControl.querySelector('.sign-up-input-validation-msg')

    // add error message inside this element
    signUpInputValidationMsg.innerHTML = `<i class="fa-solid fa-circle-exclamation"></i>${message}`

    // add error class
    formControl.className = 'sign-up-form-input-wrapper error'
}

function set2ErrorsFor(input1, input2, message) {
    const formControl1 = input1.parentElement
    const formControl2 = input2.parentElement
    const signUpInputValidationMsg = formControl1.querySelector('.sign-up-input-validation-msg')

    signUpInputValidationMsg.innerHTML = `<i class="fa-solid fa-circle-exclamation"></i>${message}`

    formControl1.className = 'sign-up-form-input-wrapper error'
    formControl2.className = 'sign-up-form-input-wrapper error'
}

// Remove error class
function removeErrorClass() {
    newFirstName.parentElement.classList.remove('error')
    newLastName.parentElement.classList.remove('error')
    newEmail.parentElement.classList.remove('error')
    newPassword.parentElement.classList.remove('error')
    confirmPassword.parentElement.classList.remove('error')
}

