// Script para manejar la visualización de las temporadas
document.querySelectorAll('.temporada-button').forEach(button => {
    button.addEventListener('click', () => {
        const contentId = button.id.replace('button', 'content');
        const content = document.getElementById(contentId);
        content.style.display = content.style.display === 'block' ? 'none' : 'block';
    });
});

// Script para el botón de reproducir
document.querySelector('.reproducir').addEventListener('click', () => {
    alert('Reproduciendo la serie...');
});