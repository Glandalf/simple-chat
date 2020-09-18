const form = document.getElementById('saisie-message');
let utilisateurs = ['Bobbi', 'Bibbo'];
let messages = [];

function ecouteSubmitMessage() {
    form.addEventListener('submit', (ev) => {
        // Evite que la page se recharge
        ev.preventDefault();
        const noeudChampMessage = ev.target.getElementsByClassName('champ-message')[0]; 
        const messageAEnvoyer = noeudChampMessage.value;
        const noeudMessages = document.querySelector('#conversation-courante .messages');
        const noeudNouveauMessage = document.createElement('p');
        // On crée et on injecte le noeud du nouveu message
        noeudNouveauMessage.classList.add('mon', 'message');
        noeudNouveauMessage.innerText = messageAEnvoyer;
        noeudMessages.appendChild(noeudNouveauMessage);
        // On vide le champ de saisie pour le prochain message
        noeudChampMessage.value = '';
        // Scrolle tout en bas de la fenêtre de conversation
        noeudMessages.scrollTop = noeudMessages.scrollHeight;
    })
}

function start() {
    // Ecoute d'événements/interactions
    document.querySelector('#conversation-courante .messages').scrollTop = document.querySelector('#conversation-courante .messages').scrollHeight;
    ecouteSubmitMessage();

    // Affichage
    afficheListeUtilisateurs(utilisateurs);
    setInterval(() => {afficheListeUtilisateurs(utilisateurs)}, 5000);
}

function afficheListeUtilisateurs(listeUtilisateurs) {
    document.getElementById('users').innerHTML = '';
    for(let utilisateur of listeUtilisateurs) {
        let noeudUstilisateur = document.createElement('li');
        noeudUstilisateur.classList.add('user');
        noeudUstilisateur.innerText = utilisateur;
        document.getElementById('users').appendChild(noeudUstilisateur);
    }
}

start();