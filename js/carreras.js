const univSelect = document.getElementById('univ');
const BtnEnviar = document.getElementById('enviar');
const carrerasSelect = document.getElementById('carreras');
const carrerasLabel = document.getElementById('Lbcarreras');

// Funciones para agregar opciones de carreras
function agregarCarrerasIPN() {
    const opciones = [
        { value: 'Ingenieria en Computacion', text: 'Ingenieria en Computación' },
        { value: 'Medicina', text: 'Medicina' },
        { value: 'Ingenieria Industrial', text: 'Ingenieria Industrial' },
    ];
    agregarOpcionesCarreras(opciones);
}

function agregarCarrerasUNAM() {
    const opciones = [
        { value: 'Medicina', text: 'Medicina' },
        { value: 'Ingenieria Civil', text: 'Ingenieria Civil' },
        { value: 'Derecho', text: 'Derecho' },
    ];
    agregarOpcionesCarreras(opciones);
}

function agregarCarrerasUAM() {
    const opciones = [
        { value: 'Ciencias de la Computacion', text: 'Ciencias de la Computacion' },
        { value: 'Psicologia', text: 'Psicologia' },
        { value: 'Ingenieria en Energia', text: 'Ingenieria en Energia' },
    ];
    agregarOpcionesCarreras(opciones);
}

function agregarCarrerasUAMex() {
    const opciones = [
        { value: 'Ingenieria en Sistemas Computacionales', text: 'Ingenieria en Sistemas Computacionales' },
        { value: 'Contaduria Publica', text: 'Contaduria Publica' },
        { value: 'Psicologia', text: 'Psicologia' },
    ];
    agregarOpcionesCarreras(opciones);
}

function vacio() {
    carrerasSelect.innerHTML = ''; // Limpia las opciones de carreras actuales
    carrerasSelect.disabled = false; // Activa el select de carreras
}


// Evento para el cambio al select de universidades
// Evento para el cambio al select de universidades
univSelect.addEventListener('change', (e) => {
    carrerasSelect.innerHTML = ''; // Limpia las opciones de carreras actuales

    // Verifica si el valor seleccionado es "N/A"
    if (e.target.value === 'N/A') {
        vacio(); // Limpia y activa el select de carreras
        carrerasSelect.style.display='none';
        carrerasLabel.style.display='none';
        BtnEnviar.style.display = 'none'; // Oculta el botón Enviar
    } else {
        // Agrega las opciones de carreras correspondientes a la universidad seleccionada
        switch (e.target.value) {
            case 'IPN':
                agregarCarrerasIPN();
                break;
            case 'UNAM':
                agregarCarrerasUNAM();
                break;
            case 'UAM':
                agregarCarrerasUAM();
                break;
            case 'UAMex':
                agregarCarrerasUAMex();
                break;
            default:
                break;
        }
        BtnEnviar.style.display = true; 
        carrerasSelect.disabled = false; // Activa el select de carreras
    }
});

// Función para agregar opciones de carreras al select
function agregarOpcionesCarreras(opciones) {
    opciones.forEach((opcion) => {
        const option = document.createElement('option');
        option.value = opcion.value;
        option.text = opcion.text;
        carrerasSelect.appendChild(option);
    });
}