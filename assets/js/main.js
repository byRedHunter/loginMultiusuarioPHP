window.onload = function(){
    let $goRegister = document.querySelector('#goRegister')
    let $goLogin = document.querySelector('#goLogin')
    let $containerLogin = document.querySelector('.container-login')
    let $containerRegister = document.querySelector('.container-register')

    $goRegister.addEventListener('click', () => {
        $containerLogin.classList.toggle('ocultar-form')
        $containerRegister.classList.toggle('ocultar-form')
        //limpiamos los campos
        $formLogin[0].reset()
    })

    $goLogin.addEventListener('click', () => {
        $containerRegister.classList.toggle('ocultar-form')
        $containerLogin.classList.toggle('ocultar-form')
        //limpiamos los campos
        $formRegister[0].reset()
    })
}