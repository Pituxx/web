
const container = document.querySelector('.knowledge2');


function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}


function randomizePattern() {
    const numberOfImages = 50; 
    
    for (let i = 0; i < numberOfImages; i++) {
        const imageDiv = document.createElement('div');
        imageDiv.classList.add('image-pattern');
        
        // Tamaño aleatorio 
        const randomSize = getRandomInt(40, 60);
        imageDiv.style.width = `${randomSize}px`;
        imageDiv.style.height = `${randomSize}px`;
        
        // Posición aleatoria dentro del contenedor
        const randomX = getRandomInt(0, 100);
        const randomY = getRandomInt(0, 100);
        imageDiv.style.left = `${randomX}%`;
        imageDiv.style.top = `${randomY}%`;
        
        // Rotación aleatoria 
        const randomRotation = getRandomInt(0, 360);
        imageDiv.style.transform = `rotate(${randomRotation}deg)`;

        imageDiv.style.backgroundImage = "url('/images/D.png')"; // Cambia la ruta a tu imagen
        
        container.appendChild(imageDiv);
    }
}

randomizePattern();
