$(document).ready(function() {
    $.validator.setDefaults({
        submitHandler: function() {
            
            alert('ya esta');
            form.submit();
        }
    });
    $('#Form_save_iglesia').validate({
        rules: {
            nombre: {
                required: true,

            }


        },
        messages: {

            nombre: {
                required: "Porfavor introduzca el nombre de la iglesia",
            }

        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
