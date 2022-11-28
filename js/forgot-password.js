const resetBtn = document.getElementById('reset-btn')
const emailInput = document.getElementById('email-input')

// This wil use an AJAX to fectch the data in php file

// Creating a XHR Object
const req1 = new XMLHttpRequest();

//OPEN    type           url/file                 async
req1.open('GET', './crudDB/emailAndPassData.php', false) 

// Sends request
req1.send()

// Getting the response
const emailAndPassData = JSON.parse(req1.responseText)

resetBtn.addEventListener('click', () => {
    if(validateEmail(emailInput)) {
        let matchedUserAccount
        for(let data of emailAndPassData) {
            if(data.email === emailInput.value) {
                matchedUserAccount = data
                break
            }
        }
        if(matchedUserAccount) {
            showPasswordInput(matchedUserAccount)
        } else {
            setEmailError("No search results", "Your search did not return any results. Please try again with other information.")
        }
    }
    // validates email
    function validateEmail(emailInput) {
        if(emailInput.value.length === 0) {
            setEmailError("Please fill in the email field", "Fill in the email field to reset your password")
        } else if(emailInput.value.length <= 3) {
            setEmailError("The identifier you entered is too short", "Please enter a longer search term")
        } else {
            return true
        }
    }
    
    // Sets the error message for email
    function setEmailError(errorMsg1, errorMsg2) {
        const emailValidationEl = document.getElementById('email-validation')
        const errorMessageEl1 = document.getElementById("error-msg1")
        const errorMessageEl2 = document.getElementById("error-msg2")
      
        emailValidationEl.classList.add('show')
        errorMessageEl1.textContent = errorMsg1
        errorMessageEl2.textContent = errorMsg2
    }
})



// this will render the password wrapper
function showPasswordInput(userAccount) {
    const { email: userEmail, password: userPassword } = userAccount
    const newPasswordWrapper = document.getElementById('new-password-wrapper')
    const resetPasswordWrapper = document.getElementById('reset-password-wrapper')
    const userEmailEl = document.getElementById('user-email')
    const newPasswordInput = document.getElementById('password-input')
    const confirmNewPasswordInput = document.getElementById('confirm-password-input')
    const notYouLinkBtn = document.getElementById('not-you-link')
    const changeBtn = document.getElementById('change-btn')
    
    if(document.getElementById('email-validation').classList.contains('show')) {
        document.getElementById('email-validation').classList.remove('show')
    }
    if(document.getElementById('password-validation').classList.contains('show')) {
        document.getElementById('password-validation').classList.remove('show')
    }
    resetPasswordWrapper.style.display = 'none'
    newPasswordWrapper.style.display = 'block'
    userEmailEl.innerText = userEmail


    notYouLinkBtn.addEventListener('click', () => {
        emailInput.value = newPasswordInput.value = confirmNewPasswordInput.value = ""
        resetPasswordWrapper.style.display = 'block'
        newPasswordWrapper.style.display = 'none'
    })

    changeBtn.addEventListener('click', () => {
        if(checkPassword(newPasswordInput.value, confirmNewPasswordInput.value)) {
            updatePassword(emailInput.value, newPasswordInput.value)

            // Using the sweet alert package to show success message
            Swal.fire({
                title: 'Password Changed!',
                text: 'Your password has been changed succesfully. Use your new password to login.',
                icon: 'success',
                allowOutsideClick: false,
                allowEscapeKey: false,
                confirmButtonText: 'Go Back Home',
                confirmButtonColor: 'rgb(59, 119, 215)',
                customClass: {
                    confirmButton: 'button'
                }
            }).then(isConfirm => {
                if(isConfirm) {
                    window.location.href = "./index.php"
                }
            })
        }

        // Checks password validation
        function checkPassword(passwordValue, confirmPasswordValue) {
            if(passwordValue.length >= 8) {
                if(confirmPasswordValue === passwordValue) {
                    return true
                } else if(confirmPasswordValue === ""){
                    setPasswordError("Please confirm your password")
                } else {
                    setPasswordError("Those passwords didn't match. Please try again")
                    confirmNewPasswordInput.value = ""
                }
                confirmNewPasswordInput.focus()
                return false
            } else if(passwordValue === "") {
                setPasswordError("Please enter a password")
            } else {
                setPasswordError("Use 8 characters or more for your password")
            }
            newPasswordInput.focus()
            return false
        }

        function setPasswordError(errorMsg) {
            const passwordValidationEl = document.getElementById('password-validation')

            passwordValidationEl.classList.add('show')
            passwordValidationEl.innerText = errorMsg
        }
    })

    // updates password using ajax
    function updatePassword(emailInputValue, newPasswordInputValue) {
        const req2 = new XMLHttpRequest()
        const params = `email=${emailInputValue}&password=${newPasswordInputValue}`
        req2.open("POST", "./crudDB/updatePass.php", true)
        req2.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

        req2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // sends it to the `updatePass.php`
            }
        }
        req2.send(params)
    }
    



    

}

