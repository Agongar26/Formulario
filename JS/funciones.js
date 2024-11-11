document.addEventListener("DOMContentLoaded", function () {
    // Seleccionar el formulario y el div donde se mostrará la respuesta
    const form = document.getElementById("formularioContacto");

    // Función para validar una fecha en formato YYYY-MM-DD y verificar que no sea futura
    function esFechaValida(fechaStr) {
        const [year, month, day] = fechaStr.split("-").map(Number); // Separar la fecha y convertir a números
        const date = new Date(year, month - 1, day); // Crear objeto Date (mes en JavaScript es 0-11)

        // Crear la fecha actual y establecer la hora en 0 para comparar solo fechas
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        // Validar si la fecha es correcta y que sea anterior a la fecha actual
        return (
            date.getFullYear() === year &&
            date.getMonth() === month - 1 &&
            date.getDate() === day &&
            date < today
        );
    }

    // Función para validar que uno de los radio buttons de "Sexo" esté marcado
    function esSexoSeleccionado() {
        const radiosSexo = document.getElementsByName("Sexo");
        return Array.from(radiosSexo).some(radio => radio.checked);
    }

    const MAXIMO_TAMANIO_BYTES = 300000; // 300 kb en bytes

    function validarArchivo() {
        const miInput = document.getElementById('Arch');
        if (miInput.files.length > 0) {
            const archivo = miInput.files[0];
            if (archivo.size > MAXIMO_TAMANIO_BYTES) {
                miInput.value = ''; // Limpiar el input
                return false;
            } else {
                return true;
            }
        }
    }

    // Asegurarse de que el formulario exista
    if (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevenir el envío normal del formulario

            // Validar la fecha de nacimiento
            const fechaNacimiento = form.FechaNacimiento.value;
            if (!esFechaValida(fechaNacimiento)) {
                // Mostrar alerta y permitir al usuario corregir la fecha
                alert("La fecha ingresada no es válida o es una fecha futura. Por favor, ingresa una fecha válida.");
                return; // Detener el envío si la fecha es inválida o futura
            }

            // Validar la selección de una opción de "Sexo"
            if (!esSexoSeleccionado()) {
                alert("Por favor, selecciona una opción de sexo.");
                return;
            }

            // Validar tamaño del archivo subido
            if (!validarArchivo()) {
                alert('Tamaño no válido, el tamaño máximo es 300 kb');
                return;
            }

            const formData = new FormData(form);

            // Enviar los datos usando fetch sin recargar la página
            fetch("validation.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Mostrar el HTML de respuesta en el div sin recargar la página
                mensajeValidacion.innerHTML = data;
                mensajeValidacion.style.display = "block";
            })
            .catch(error => {
                // Mostrar mensaje de error en caso de que falle
                mensajeValidacion.innerHTML = "<p>Error al enviar el formulario.</p>";
                console.error("Error:", error);
            });
        });
    } else {
        console.error("No se encontró el formulario.");
    }
});