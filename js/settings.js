$(document).ready(() => {
    $("#change-avatar-btn").click((e) => {
        e.preventDefault()
        $('#fileInput').click()
    })

    $('#fileInput').change(() => {
        $("#change-avatar-btn").off()
        $("#change-avatar-btn").click()
    })
})