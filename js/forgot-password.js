const resetBtn = document.getElementById('reset-btn')
const emailInput = document.getElementById('email-input')

// This wil use an AJAX to fectch the data in php file

// Creating a XHR Object
const xhr = new XMLHttpRequest();

//OPEN    type           url/file         async
xhr.open('POST', './dataFromDB/emailAndPassData.php', false) 

// Sends request
xhr.send()

// Getting the response
const emailAndPassData = JSON.parse(xhr.responseText)

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
            updatePassword(matchedUserAccount)
        } else {
            setEmailError("No search results", "Your search did not return any results. Please try again with other information.")
        }
    }
})

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

// this will update the password in the database
function updatePassword(userAccount) {
    console.log(userAccount)
}

