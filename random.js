// Selecciona el contenedor
const container = document.querySelector('.knowledge2');

// Función para generar un número aleatorio entre min y max
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Función para randomizar la creación de elementos con la imagen
function randomizePattern() {
    const numberOfImages = 200; // Número de imágenes que se colocarán como patrón
    
    for (let i = 0; i < numberOfImages; i++) {
        const imageDiv = document.createElement('div');
        imageDiv.classList.add('image-pattern');
        
        // Tamaño aleatorio entre 20px y 50px
        const randomSize = getRandomInt(15, 35);
        imageDiv.style.width = `${randomSize}px`;
        imageDiv.style.height = `${randomSize}px`;
        
        // Posición aleatoria dentro del contenedor
        const randomX = getRandomInt(0, 100);
        const randomY = getRandomInt(0, 100);
        imageDiv.style.left = `${randomX}%`;
        imageDiv.style.top = `${randomY}%`;
        
        // Rotación aleatoria entre 0 y 360 grados
        const randomRotation = getRandomInt(0, 360);
        imageDiv.style.transform = `rotate(${randomRotation}deg)`;
        
        // Establecer la imagen de fondo
        imageDiv.style.backgroundImage = "url('/images/D.png')"; // Cambia la ruta a tu imagen
        
        // Añadir la imagen al contenedor
        container.appendChild(imageDiv);
    }
}

// Llamar a la función para crear el patrón
randomizePattern();
