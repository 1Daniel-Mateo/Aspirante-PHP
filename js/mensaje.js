//Se crea funcion para los mensajes
document.addEventListener('DOMContentLoaded', function() {
    let mensajes = document.querySelectorAll('.mensaje-error, .mensaje-valido');
    mensajes.forEach(function(mensaje) {
        mensaje.classList.add('visible');
    });
    setTimeout(function() {
        mensajes.forEach(function(mensaje) {
            mensaje.classList.remove('visible');
            mensaje.classList.add('hidden');
        });
    }, 3000);
});