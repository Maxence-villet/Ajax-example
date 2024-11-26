document.getElementById('btn-rechercher').addEventListener('click', function() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'rechercher.php');
    xhr.onload = function() {
        if (xhr.status === 200) {
            const donnees = JSON.parse(xhr.responseText);
            // Afficher les données dans le div
            let html = '';
            for (const key in donnees) {
                if (donnees.hasOwnProperty(key)) {
                    html += `<p>${donnees[key].player_id} - ${donnees[key].nickname}</p>`;
                }
            }
            document.getElementById('resultat').innerHTML = html;
        }
    };
    xhr.send();
});