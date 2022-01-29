function validar() {
    fecha_inicio = document.getElementById('fecha_inicio').value
    hora_reserva = document.getElementById('hora_reserva').value
    nombre_cliente = document.getElementById('nombre_cliente').value
    mensaje = document.getElementById('mensaje')

    if (fecha_inicio == '' && nombre_cliente == '') {
        mensaje.innerHTML = 'Rellena los campos'
        return false
    } else if (fecha_inicio == '') {
        mensaje.innerHTML = 'Selecciona un día'
        return false
    } else if (nombre_cliente == '') {
        mensaje.innerHTML = 'Introduce un nombre de reserva'
        return false
    } else {
        return true
    }
}