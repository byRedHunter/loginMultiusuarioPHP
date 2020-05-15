// variables

// formularios
const $formLogin = $('#login')
const $formRegister = $('#register')
// campos del form login
const $loginUser = $('#loginUsuario')
const $loginPass = $('#loginPassword')
// campos del form register
const $registerUser = $('#registerUsuario')
const $registerPass = $('#registerPassword')
const $passRepeat = $('#registerRepite')

// validar las contraseñas
$passRepeat.keyup(function (e) {
    // capturamos el valor del input que vayamos digitando
    let valor = $passRepeat.val()

    // comparamos este valor con el del $pass
    if(valor != $registerPass.val()) {
        // cambiamos el color del border-bottom
        $passRepeat.css({'border-bottom-color':'rgb(150, 33, 33)'})
    } else {
        // cuando coincida el color vuelve a ser el mismo
        $passRepeat.css({'border-bottom-color':'rgb(30, 120, 30)'})
    }
})

// funcion para validar la longitud de los campos
function validarLongitudInput(inputForm) {
    inputForm.keyup(function (e) {
        // capturamos el valor del input que vayamos digitando
        let valor = inputForm.val()
    
        // verificamos la longitud del input
        if(valor.length > 5) {
            // cambiamos el color del border-bottom
            inputForm.css({'border-bottom-color':'rgb(30, 120, 30)'})
        } else {
            inputForm.css({'border-bottom-color':'rgb(150, 33, 33)'})
        }
    })
}

// llamamos a la funcion
validarLongitudInput($registerUser)
validarLongitudInput($registerPass)

// funcion para validar que los campos no esten vacios
function camposVacios(nameForm) {
    if(nameForm === 'login') {
        if($loginUser.val() === '' && $loginPass.val() === '') {
            return true
        } else {
            return false
        }
    }
    
    if(nameForm === 'register') {
        if($registerUser.val() === '' && $registerPass.val() === '' && $passRepeat.val() === '') {
            return true
        } else {
            return false
        }
    }
}

// funcion para ejecutar el post
function sendMetohdPost(data, form, nameForm) {
    $.ajax({
        type: "POST",
        url: "Model/login.php",
        data: data,
        success: function (response) {
            // capturamos la respuesta
            const result = JSON.parse(response)

            
            // mostramos la respuesta en un alert si es para el register
            //swal(result[0].mensajeTitle, result[0].mensaje, result[0].tipo)

            if(result[0].tipo == 'success') {
                form[0].reset()
            }
        }
    })
}
// funcion para ejecutar el evento submit de los forms
function executeSubmit(form, nameForm) {
    form.submit(function(e) {
        // bloqueamos el recargo de la pagina al hacer submit
        e.preventDefault()

        // capturamos los datos del formulario
        let data = form.serialize()
        data += `&nameForm=${nameForm}`

        // llamamos y verificamos la funcion que valida los campos vacios
        if(camposVacios(nameForm)) {
            // mostramos un alert para el mensaje
            swal("Uhmmnn...!!! 🤔", 'Por favor llene todos los campos', "warning")
        } else {
            // ejecutamos el metodo post
            sendMetohdPost(data, form, nameForm)
            // direccionamos a la pagina principal
            location.href = 'View';
        }
    })
}

// evento submit para el form register
executeSubmit($formRegister, 'register')

// evento submit para el form register
executeSubmit($formLogin, 'login')