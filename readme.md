# Mon petit système de messagerie instantannée

## Fonctionnalités existantes

* Structure de la page de messagerie

## Fonctionnalités en cours

* lorsque je saisis un message, il apparait dans la liste
* Définir une structure JS pour gérer tous les messages/utilisateurs/conversations, etc.

## Fonctionnalités à venir

* créer un compte
* se connecter
* écrire des messages à tout le monde
* écrire des messages à une personne
* ...

## Structure des données

### Utilisateurs

A l'heure actuelle, nos utilisateurs sont une simple chaine de caractère. Cela évoluera certainement.

### Messages
Un message est composé de : 
- le message écrit
- un auteur
- une date (optionnel)

```json
{
    "contenu": "Bonjour monde",
    "auteur": "Bobbu",
    "date": Date.now()
}
```
## Aides Git

TODO: compléter cette partie

### Git add

Lorsque l'on clique sur le "+" à côté d'un fichier dans l'onglet Git de VS Code, cela fait l'équivalent de la commande `git add <nomDuFichier.ext>`

