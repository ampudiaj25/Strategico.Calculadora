function sendRequest (){      
    // colocar el loading 
    $('#loadingSpinner').show();
    // Obtener los datos del formulario
    var formData = {
        operand1: $('#operand1').val(),
        operand2: $('#operand2').val(),
        operation: $('#operation').val()
    };
    // Convertir los datos a JSON
    var jsonData = JSON.stringify(formData);

    // Hacer la solicitud AJAX al servicio REST API
    $.ajax({
        url: 'http://localhost/strategico.calculator.control/control.php',
        type: 'POST', 
        contentType: 'application/json',
        data: jsonData,
        success: function(response) {                
            console.log('Respuesta del servicio API:', response);
            $('#respuesta').removeClass('alert-danger').addClass('text-success').text('Resultado: ' + response.result).show();
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.responseText;
            console.error('Error al hacer la solicitud:', errorMessage || error);
            $('#respuesta').removeClass('alert-success').addClass('text-danger').text(errorMessage).show();
        },
        complete: function() {
            $('#loadingSpinner').hide();
        }
    });
}

$(document).ready(function () {
    $('#loadingSpinner').hide();
    $('#formValidation').validate({
        rules: {
            operand1: {
                required: true
            },
            operand2: {
                required: true
            },
            operation: {
                required: true
            }
        },
        messages: {
            operand1: {
                required: "Por favor ingresa un valor.",

            },
            operand2: {
                required: "Por favor ingresa un valor.",
            },
            operation: {
                required: "Por favor seleccione una operación"
            }
        },
        errorElement: "p",
        errorPlacement: function (error, element) {
            error.addClass("help-block");
            error.css("color", "red");
            error.insertAfter(element);
        },
        highlight: function (element) {
            $(element).parents(".mb-3").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element) {
            $(element).parents(".mb-3").addClass("has-success").removeClass("has-error");
        },
        submitHandler: function() {
            sendRequest();
        }
    });
});