document.addEventListener('DOMContentLoaded', function() {
    showSeason(1);

    const seasonSelect = document.getElementById('season-select');
    if (seasonSelect) {
        seasonSelect.addEventListener('change', function() {
            showSeason(this.value);
        });
    }

    const leerMasButtons = document.querySelectorAll('.leer-mas');
    leerMasButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.id.split('-')[2];
            toggleDescription(id, 'mas');
        });
    });

    const leerMenosButtons = document.querySelectorAll('.leer-menos');
    leerMenosButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.id.split('-')[2];
            toggleDescription(id, 'menos');
        });
    });

    const reproducirButtons = document.querySelectorAll('.reproducir');
    reproducirButtons.forEach(button => {
        button.addEventListener('click', function() {
            const episodeName = this.closest('.episode').querySelector('h3').textContent;
            showNotification(episodeName);
        });
    });
});

function showNotification(episodeName) {
    alert('Reproduciendo ' + episodeName);
}

function toggleDescription(id, action) {
    const desc = document.getElementById('desc-' + id);
    const btnMas = document.getElementById('btn-mas-' + id);
    const btnMenos = document.getElementById('btn-menos-' + id);
    if (action === 'mas') {
        desc.style.whiteSpace = 'normal';
        btnMas.style.display = 'none';
        btnMenos.style.display = 'inline';
    } else {
        desc.style.whiteSpace = 'nowrap';
        btnMas.style.display = 'inline';
        btnMenos.style.display = 'none';
    }
}

function showSeason(seasonNumber) {
    const seasons = document.querySelectorAll('.season');
    seasons.forEach(season => {
        season.style.display = 'none';
    });
    document.getElementById('season-' + seasonNumber).style.display = 'block';
}
