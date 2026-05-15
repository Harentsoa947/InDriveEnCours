function filterChauffeurs() {
    const maxKm = parseInt(document.querySelector('#kilom').value);
    let visibleCount = 0;

    document.querySelectorAll('.all_chauf').forEach(row => {
        const distance = parseFloat(row.querySelector('.distance').dataset.distance);

        if (maxKm === 50 || distance <= maxKm) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    // Affichage message si aucun chauffeur
    const noDriverMsg = document.querySelector('#no-driver');

    if (visibleCount === 0) {
        noDriverMsg.style.display = 'block';
    } else {
        noDriverMsg.style.display = 'none';
    }
}


document.querySelector('#kilom').addEventListener('change', filterChauffeurs);

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#kilom').value = 3;
    filterChauffeurs();
});