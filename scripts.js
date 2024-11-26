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

document.getElementById("btn-recherche").addEventListener("click", function() {
    let difficulty_grid = 16; //la taille de la grille
    let elapsedTime = 0; // le temps écoulé 

    xhtml = new XMLHttpRequest();
    xhtml.open("POST", "../../utils/insertScore.php");
    xhtml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhtml.send("time=" + elapsedTime + "&difficulty_grid=" + difficulty_grid + "&game_id=" + 1);

    xhtml.onload = function() {
        if(xhtml.status === 200) {
            alert("donnée envoyée");
        } else {
            alert("erreur lors de l'insersion de donnée");
        }
    }
});