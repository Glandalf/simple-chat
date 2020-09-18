const form = document.getElementById('saisie-message');
let utilisateur = {
    "pseudo": "Jean Jean"
};
let utilisateurs = ['Bobbi', 'Bibbo'];
let messages = [];

function ecouteSubmitMessage() {
    form.addEventListener('submit', (ev) => {
        // Evite que la page se recharge
        ev.preventDefault();
        const noeudChampMessage = document.getElementById('champ-message-en-cours'); 
        const messageAEnvoyer = noeudChampMessage.value;
        const noeudMessages = document.querySelector('#conversation-courante .messages');

       messages.push({
           contenu: messageAEnvoyer,
           auteur: utilisateur.pseudo,
           date: Date.now()
       })
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
    setInterval(() => { afficheListeUtilisateurs(utilisateurs) }, 5000);

    afficheListeMessages(messages);
    setInterval(() => { afficheListeMessages(messages) }, 1000);
    document.getElementById('champ-message-en-cours').focus();
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

function afficheListeMessages(listeMessages) {
    document.querySelector('#conversation-courante > .messages').innerHTML = '';
    for(let message of listeMessages) {
        let noeudMessage = document.createElement('p');
        noeudMessage.classList.add('message');
        message.auteur === utilisateur.pseudo? noeudMessage.classList.add('mon'): null;
        noeudMessage.innerHTML = message.contenu + '<br>';
        const dateMessage = new Date(message.date)
        noeudMessage.innerHTML += dateMessage.toLocaleDateString();
        document.querySelector('#conversation-courante > .messages').appendChild(noeudMessage);
    }
}

start();