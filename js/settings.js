$(document).ready(() => {
    $("#change-avatar-btn").click((e) => {
        e.preventDefault()
        $('#fileInput').click()
    })

    $('#fileInput').change(() => {
        $("#change-avatar-btn").off()
        $("#change-avatar-btn").click()
    })

    // PROFILE DETAILS EVENTS
    const oldFirstNameInputValue = $("input#firstname").val()
    const oldLastNameInputValue = $("input#lastname").val()
    const oldAddressInputValue = $("input#address").val()
    const oldPhoneInputValue = $("input#phone").val()
    const oldBirthdayInputValue = $("input#birthday").val()
    // const oldGenderCheckedInputValue =  $('input[name="gender"]:checked').val();
    // const oldGenderInputValue =  $('input[name="gender"]').val();

 
    // Edit profile button click event
    $("#edit-profile-btn").click((e) => {
        handleButtonsDisplay($("#edit-profile-btn"), $(".personal-details .cancel-btn"), $(".personal-details .save-btn"));

        $(".personal-details input").removeAttr('disabled')
        $(".gender-input .radio-item label").addClass('enabled')
    })

    // Cancel profile button click event
    $(".personal-details .cancel-btn").click(() => {
        removeErrorClass()

        handleButtonsDisplay($("#edit-profile-btn"), $(".personal-details .cancel-btn"), $(".personal-details .save-btn"));

        $(".personal-details input").attr('disabled', 'disabled')
        $(".gender-input .radio-item label").removeClass('enabled')

        $("input#firstname").val(oldFirstNameInputValue)
        $("input#lastname").val(oldLastNameInputValue)
        $("input#address").val(oldAddressInputValue)
        $("input#phone").val(oldPhoneInputValue)
        $("input#birthday").val(oldBirthdayInputValue)
        // $('input[name="gender"]').val(oldGenderInputValue)

    })

    // Save profile button click event
    $(".personal-details .save-btn").click(() => {
        removeErrorClass()

        if(checkPersonalDetails($("input#firstname"), $("input#lastname"), $("input#address"),
        $("input#phone"), $("input#birthday"), $('input[name="gender"]')))  {
            $.ajax({
                url: './crudDB/updateProfileDetails.php',
                method: 'POST',
                data: {
                        id: $("#hiddenActiveUserId").val(), firstname: $("input#firstname").val(),
                        lastname: $("input#lastname").val(),address: $("input#address").val(), 
                        phone: $("input#phone").val(),birthday: $("input#birthday").val(), 
                        gender: $('input[name="gender"]:checked').val()
                    },  
                success: response => {
                    showSuccessMsg('Profile Updated!', 'Your profile has been successfully updated.')
                }
            })
        }
    })


    // ACCOUNT DETAILS EVENTS
    
    // EMAIL

    // Edit email button click event
    $("#change-email-btn").click(() => {
        handleButtonsDisplay($("#change-email-btn"), $("#cancel-email-btn"), $("#update-email-btn"))
        $(".change-email-container").show()
    })

    // Cancel email button click event
    $("#cancel-email-btn").click(() => {
        removeErrorClass()

        handleButtonsDisplay($("#change-email-btn"), $("#cancel-email-btn"), $("#update-email-btn"))
        $(".change-email-container").hide()

        $(".change-email-container input").val("")
    })

    // Change email button click event
    $("#update-email-btn").click(() => {
        removeErrorClass()

        $.ajax({
            url: './crudDB/emailAndPassData.php',
            method: 'POST',
            success: response => {
                const emailAndPassData = JSON.parse(response)
                
                if(validateNewEmail( $("input#current-password"), $("input#new-email") , emailAndPassData)) {
                    $.ajax({
                        url: './crudDB/updateAccountDetails.php',
                        method: 'POST',
                        data: { id: $("#hiddenActiveUserId").val(), newEmail: $("input#new-email").val() },
                        success: response => {
                            showSuccessMsg('Email Updated!', 'Your email has been successfully updated.')
                        }
                    })
                }
            }
        })
    })


    // PASSWORD

    // Edit password button click event
    $("#change-password-btn").click(() => {
        handleButtonsDisplay($("#change-password-btn"), $("#cancel-password-btn"), $("#update-password-btn"))
        $(".change-password-container").show()
        $(".password-tip").show()
    })

    // Cancel email button click event
    $("#cancel-password-btn").click(() => {
        removeErrorClass()
        
        handleButtonsDisplay($("#change-password-btn"), $("#cancel-password-btn"), $("#update-password-btn"))
        $(".change-password-container").hide()
        $(".password-tip").hide()

        $(".change-password-container input").val("")
    })
    
    // Update pass button click event
    $("#update-password-btn").click(() => {
        removeErrorClass()
        $(".password-tip").hide()

        $.ajax({
            url: './crudDB/emailAndPassData.php',
            method: 'POST',
            success: response => {
                const emailAndPassData = JSON.parse(response)

                if(validateNewPass( $("#old-password"), $("#new-password") , $("#confirm-new-password"), emailAndPassData)) {
                    $.ajax({
                        url: './crudDB/updateAccountDetails.php',
                        method: 'POST',
                        data: { id: $("#hiddenActiveUserId").val(), newPassword: $("input#new-password").val() },
                        success: response => {
                            showSuccessMsg('Password Updated!', 'Your password has been successfully updated.')
                        }
                    })
                }
            } 
        })
    })


    // DELETE DETAILS EVENTS
    $('#delete-account-btn').click(() => {
        Swal.fire({
            title: 'Delete Account',
            html: '<p style="font-size: 16px">Are you sure you want to delete your account? Deleting your account will remove all of your information from our database. This cannot be undone. </p>',
            icon: 'warning',
            iconColor: 'rgba(255, 0, 0, .6)',
            allowOutsideClick: true,
            allowEscapeKey: true,
            input: 'password',
            inputAttributes: {
                autocapitalize: 'off'
            },
            inputPlaceholder: 'Type in your password to confirm',
            showCancelButton: true,
            confirmButtonText: 'Delete Account',
            confirmButtonColor: 'rgba(255, 0, 0, .8)',
            focusConfirm: false,
            reverseButtons: true,
            customClass: {
                confirmButton: 'swal-button',
                validationMessage: 'swal-validation-msg'
            },
            preConfirm: (inputValue) => {
                if(inputValue === '') {
                    Swal.showValidationMessage("Enter your password")
                } else if(inputValue !== $("#password").val()) {
                    Swal.showValidationMessage("Your password is incorrect")
                } else {
                    return inputValue
                }
            }
        }).then(response => {
            if(response.isConfirmed) {
                $.ajax({
                    url: './crudDB/deleteAccount.php',
                    method: 'POST',
                    data: { id: $("#hiddenActiveUserId").val() },
                    success: response => {
                        window.location.href = "./includes/logout.php"
                    }
                })
            }
        })
    })


    // ALL FUNCTIONS

    // ERROR HANDLING FOR PERSONAL DETAILS
    function checkPersonalDetails(fnameInput, lnameInput, addressInput, 
        phoneInput, birthdayInput, genderInputs) {
        let isPersonalDetailsValid = true

        // First name validation
        if(fnameInput.val() === '') {
            showError(fnameInput, "Enter first name")
            isPersonalDetailsValid = false
        } 

        // Last name validation
        if(lnameInput.val() === '') {
            showError(lnameInput, "Enter last name")
            isPersonalDetailsValid = false
        }     

        // Address validation
        if(addressInput.val().length > 0 && addressInput.val().length <= 2) {
            showError(addressInput, "Address must be at least 3 characters long")
            isPersonalDetailsValid = false
        }

        // Phone validation
        if(phoneInput.val() == '') {
            showError(phoneInput, "Enter phone number")
            isPersonalDetailsValid = false
        } else if(phoneInput.val().length > 0 && phoneInput.val().length <= 10) {
            showError(phoneInput, "Phone number must be at least 10 digits")
            isPersonalDetailsValid = false
        }

        // Birthday validation
        if(birthdayInput.val() == '') {
            showError(birthdayInput, "Enter date of birth")
            isPersonalDetailsValid = false
        }

        // Gender validation
        let isRadioChecked = false
        for(let radio of genderInputs) {
            radio = $(radio)
            if(radio.prop("checked")) {
                isRadioChecked = true
                break
            }
        }

        if(!isRadioChecked) {
            isPersonalDetailsValid = false
            $(".gender-input").addClass('error')
        } 

        // Checks if all the inputs above are valid
        return isPersonalDetailsValid ? true : false
    }

    // ERROR HANLING FOR EMAIL
    function validateNewEmail(currentPassInput, newEmailInput, emailAndPassData) {
        let isAllInputsValid = true 

        // checks current pass
        if(currentPassInput.val() === '') {
            showError(currentPassInput, "Enter current password")
            isAllInputsValid = false
        } else if( currentPassInput.val() !== $("input#password").val() ) {
            showError(currentPassInput, "Your current password is incorrect")
            isAllInputsValid = false
        }

        // checks new email
        const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        const isEmailValid = emailRegex.test(newEmailInput.val())

        if(newEmailInput.val() === '') {
            showError(newEmailInput, "Enter new email address")
            isAllInputsValid = false
        } else {
            if(!isEmailValid) {
                showError(newEmailInput, "This email address is not valid")
                isAllInputsValid = false 
            } else {
                for(let data of emailAndPassData) {
                    if(data.email === newEmailInput.val()) {
                        showError(newEmailInput, "That email is already taken. Try another.")
                        isAllInputsValid = false
                        break
                    }
                }   
            }
        }

        // Checks if all the inputs above are valid
        return isAllInputsValid ? true : false
    }

    // ERROR HANDALING FOR PASSWORD
    function validateNewPass( oldPassInput, newPassInput, repeatNewPassInput, emailAndPassData ) {
        let isAllInputsValid = true 

        // checks old pass
        if(oldPassInput.val() === '') {
            showError(oldPassInput, "Enter old password")
            isAllInputsValid = false
        } else if( oldPassInput.val() !== $("input#password").val() ) {
            showError(oldPassInput, "Your current password is incorrect")
            isAllInputsValid = false
        }
        
        // checks new pass
        if(newPassInput.val() === '') {
            showError(newPassInput, "Enter new password")
            isAllInputsValid = false
         } else if(newPassInput.val().length <= 7) {
            showError(newPassInput, "Password is too short. Use 8 characters or more for your password.")
            isAllInputsValid = false
         } else {
            if(repeatNewPassInput.val() === '') {
               showError(repeatNewPassInput, "Repeat your password")
               isAllInputsValid = false
            } else if(repeatNewPassInput.val() !== newPassInput.val()) {
               showError(repeatNewPassInput, "Those passwords didn't match. Try again")
               $("#confirm-new-password").val("")
               isAllInputsValid = false
            }
         }

        // Checks if all the inputs above are valid
        return isAllInputsValid ? true : false
    }

    function handleButtonsDisplay(editBtn, cancelBtn, saveBtn) {
        editBtn.toggle()
        cancelBtn.toggle()
        saveBtn.toggle()
    }

    // renders error message
    function showError(input, errorMsg) {
        const inputParentWrapper = input.parent()

        inputParentWrapper.addClass('error')
        inputParentWrapper.find('small').text(errorMsg) 
    }

    // removes error message/s 
    function removeErrorClass() {
        $(".first-name-wrapper").removeClass('error')
        $(".last-name-wrapper").removeClass('error')
        $(".address-input").removeClass('error')
        $(".phone-wrapper").removeClass('error')
        $(".birthday-wrapper").removeClass('error')
        $(".gender-input").removeClass('error')
        $(".current-password-wrapper").removeClass('error')
        $(".new-email-wrapper").removeClass('error')
        $(".old-password-input").removeClass('error')
        $(".new-password-wrapper").removeClass('error')
        $(".confirm-new-password-wrapper").removeClass('error')
    }


    // shows success msg using sweet alert package
    function showSuccessMsg(title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: 'success',
            allowOutsideClick: false,
            allowEscapeKey: false,
            confirmButtonText: 'Continue',
            confirmButtonColor: 'rgb(59, 119, 215)',
            customClass: {
                confirmButton: 'button'
            }
        }).then(isConfirm => {
            if(isConfirm) {
                window.location.reload();
            }
        })
    }
})