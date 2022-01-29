function validar() {
    nom_user = document.getElementById('nom_user').value
    apellido_user = document.getElementById('apellido_user').value
    email_user = document.getElementById('email_user').value
    mensaje = document.getElementById('mensaje')

    if (nom_user == '' && apellido_user == '' && email_user == '') {
        mensaje.innerHTML = 'Rellena los campos'
        return false
    } else if (nom_user == '' && apellido_user == '') {
        mensaje.innerHTML = 'Introduce un nombre y un apellido'
        return false
    } else if (nom_user == '' && email_user == '') {
        mensaje.innerHTML = 'Introduce un nombre y un correo'
        return false
    } else if (apellido_user == '' && apellido_user == '') {
        mensaje.innerHTML = 'Introduce un apellido y un correo'
        return false
    } else if (nom_user == '') {
        mensaje.innerHTML = 'Introduce un nombre'
        return false
    } else if (apellido_user == '') {
        mensaje.innerHTML = 'Introduce un apellido'
        return false
    } else if (email_user == '') {
        mensaje.innerHTML = 'Introduce un correo'
        return false
    }
}