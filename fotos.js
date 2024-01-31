document.addEventListener('DOMContentLoaded', function () {
    cargarFotos();
});

function cargarFotos() {
    const contenedorImagenes = document.getElementById('contenedorImagenes');

    // Lista de nombres de archivos JPG en la carpeta "RemotePosters"
    const nombresImagenes = [
        'Dakimakuras.jpg',
        'Dakimakuras2.jpg',
        'Dakimakuras3.jpg'
        // Agrega más nombres de archivos según sea necesario
    ];

    nombresImagenes.forEach(nombreImagen => {
        const imagen = document.createElement('img');
        imagen.src = `RemotePosters/${nombreImagen}`;
        imagen.alt = `Imagen: ${nombreImagen}`;

        contenedorImagenes.appendChild(imagen);
    });
}
