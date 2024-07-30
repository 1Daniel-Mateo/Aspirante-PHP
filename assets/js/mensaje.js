//contenido del DOM esté completamente cargado y listo.
document.addEventListener("DOMContentLoaded", function () {
  //Obtenemos las clases de los mensajes para aplicar la funcionalidad
  let mensajes = document.querySelectorAll(".mensaje-error, .mensaje-valido");

  // Para cada uno de los mensajes seleccionados, añade la clase 'visible'
  mensajes.forEach(function (mensaje) {
    mensaje.classList.add("visible");
  });

  /* Después de 3 segundos (3000 milisegundos), ejecuta la siguiente función:
    que se aplica a todos los mensajes y que se mantenga visibles por 3 segundos
    y despues estos desaparescan
    */
  setTimeout(function () {
    mensajes.forEach(function (mensaje) {
      mensaje.classList.remove("visible");
      mensaje.classList.add("hidden");
    });
  }, 3000);
});
