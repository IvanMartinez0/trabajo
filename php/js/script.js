// Obtenemos todas las celdas con la clase 'show-list'
const showListElements = document.querySelectorAll('.show-list');

// Iteramos sobre cada celda
showListElements.forEach((element) => {
    element.addEventListener('click', () => {
        // Encontramos la capa de datos dentro de la celda
        const dataList = element.nextElementSibling;

        // Cambiamos la visibilidad de la capa de datos al hacer clic
        dataList.classList.toggle('show');
    });
});
