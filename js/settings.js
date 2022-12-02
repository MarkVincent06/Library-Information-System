$(document).ready(() => {
    $("#change-avatar-btn").click((e) => {
        e.preventDefault()
        $('#fileInput').click()
    })

    $('#fileInput').change(() => {
        $("#change-avatar-btn").off()
        $("#change-avatar-btn").click()
    })

    // $.get('crudDb/lisUsersAccountsData.php', data => {
    //     console.log(data)
    // })

    // PROFILE DETAILS EVENTS

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
    })

    // Save profile button click event
    $(".personal-details .save-btn").click(() => {
        const firstNameInputValue = $("input#firstname").val()
        const lastNameInputValue = $("input#lastname").val()
        const addressInputValue = $("input#address").val()
        const phoneInputValue = $("input#phone").val()
        const birthdayInputValue = $("input#birthday").val()
        const genderCheckedInputValue =  $('input[name="gender"]:checked').val();
        console.log(firstNameInputValue)
        console.log(lastNameInputValue)
        console.log(addressInputValue)
        console.log(phoneInputValue)
        console.log(birthdayInputValue)
        console.log(genderCheckedInputValue)
    })
})