function validar() {
    email = document.getElementById('email').value
    password_user = document.getElementById('password_user').value
    mensaje = document.getElementById('mensaje')

    if (email == '' && password_user == '') {
        mensaje.innerHTML = 'Introduce el usuario y la contraseña'
        return false
    } else if (email == '') {
        mensaje.innerHTML = 'Introduce el usuario'
        return false
    } else if (password_user == '') {
        mensaje.innerHTML = 'Introduce la contraseña'
        return false
    } else {
        return true
    }
}