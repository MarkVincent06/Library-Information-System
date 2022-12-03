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
    $("#edit-profile-btn").click(() => {
        $("#edit-profile-btn").css("display", "none")
        $(".personal-details .cancel-btn").css("display", "inline")
        $(".personal-details .save-btn").css("display", "inline")

        $(".personal-details input").removeAttr('disabled')
        $(".gender-input .radio-item label").addClass('enabled')
    })

    // Cancel profile button click event
    $(".personal-details .cancel-btn").click(() => {
        $(".personal-details .cancel-btn").css("display", "none")
        $(".personal-details .save-btn").css("display", "none")
        $("#edit-profile-btn").css("display", "inline")

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
        $(".first-name-wrapper").removeClass('error')
        $(".last-name-wrapper").removeClass('error')
        $(".address-input").removeClass('error')
        $(".phone-wrapper").removeClass('error')
        $(".birthday-wrapper").removeClass('error')
        $(".gender-input").removeClass('error')

        if(checkPersonalDetails($("input#firstname"), $("input#lastname"), $("input#address"),
        $("input#phone"), $("input#birthday"), $('input[name="gender"]')))  {
            // console.log($("input#firstname").val())
            // console.log($("input#lastname").val())
            // console.log($("input#address").val())
            // console.log($("input#phone").val())
            // console.log($("input#birthday").val())
            // console.log($('input[name="gender"]:checked').val())

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
                    window.location.reload();
                }
            })
        }


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
    })

    // renders error message
    function showError(input, errorMsg) {
        const inputParentWrapper = input.parent()

        inputParentWrapper.addClass('error')
        inputParentWrapper.find('small').text(errorMsg) 
    }
})