$(document).on('submit','#saveStudent', function (e) {

    e.preventDefault();

    formData = new FormData(this)
    formData.append('save_student',true)
    // alert('Save Student Calicked');
    $.ajax({
        type: "POST",
        url: "code.php",
        data:formData,
        processData:false,
        contentType:false,
        success: function (response) {
            var res = $.parseJSON(response)

            if(res.status == 200){
                $('#saveStudentModal').modal('hide');
                $('#saveStudent')[0].reset();
                $('#lostOfStudents').load(location.href + " #lostOfStudents")
                $('#myAlertMsg').html(res.message)
                $('#myAlertMsg').removeClass('d-none');
                setTimeout(()=>{
                    $('#myAlertMsg').addClass('d-none');
                },1000)

            }else if(res.status == 422){
                $('#myAlertMsg').html(res.message)
                $('#myAlertMsg').removeClass('d-none');
                // alert(res.message);
            }
            
        }
    });
    
});
