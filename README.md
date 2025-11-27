# ProjetR3esto

Site web de recherche, d'évaluation et de gestion de restaurants (projet PHP pour environnement WAMP).

**Description :**
- Application PHP légère permettant de lister des restaurants, consulter les détails, s'inscrire/ se connecter, noter et commenter des établissements.

**Prérequis :**
- `WAMP` ou équivalent (Apache + PHP + MySQL/MariaDB).
- Import de la base de données fournie (`base de donnees/resto.sql`).

**Installation rapide :**
1. Copier le dossier `ProjetR3esto` dans le répertoire `www` de votre installation WAMP (par exemple `c:/wamp64/www/resto/ProjetR3esto`).
2. Importer le fichier SQL : `base de donnees/resto.sql` via phpMyAdmin ou mysql.
3. Configurer les paramètres de connexion à la base de données dans le fichier `modele/bd.pdo.php` (ou `modele/bd.connexion.php` si utilisé) : `host`, `dbname`, `user`, `password`.
4. Accéder au site via un navigateur : `http://localhost/resto/ProjetR3esto/` (ou le chemin correspondant selon votre configuration de virtual host).

**Structure du projet :**
- `index.php` : point d'entrée principal (dispatche les actions via `controleur/controleurPrincipal.php`).
- `getRacine.php` : utilitaire pour définir la racine du projet.
- `base de donnees/resto.sql` : script SQL pour créer et peupler la base.
- `controleur/` : contrôleurs côté application (gestion des actions telles que connexion, inscription, liste, détail, recherche, modification, suppression, etc.).
	- Exemples : `connexion.php`, `inscription.php`, `listeRestos.php`, `detailResto.php`, `rechercheResto.php`, `supprimer.php`, `modifier.php`, `aimer.php`, `confirmation.php`, `deconnexion.php`.
- `modele/` : accès aux données et logique métier (fichiers `bd.*.php` pour les opérations sur les restos, utilisateurs, photos, avis, types de cuisine, etc.).
	- Exemples : `bd.resto.php`, `bd.utilisateur.php`, `bd.inscription.php`, `bd.connexion.php`, `bd.pdo.php`, `bd.photo.php`, `bd.aimer.php`, `bd.critiquer.php`, `bd.typecuisine.php`.
- `vue/` : vues et fragments HTML (en-tête, pied, pages d'affichage). Exemples : `vueListeRestos.php`, `vueDetailResto.php`, `vueinscription.php`, `vueAuthentification.php`, `vueRechercheResto.php`, `vueConfirmation.php`.
- `css/` : styles CSS.
- `images/` et `photos/` : images et photos utilisées par le site.

**Fichiers importants / points d'attention :**
- `controleur/controleurPrincipal.php` : routeur des actions, gardez-le intact pour que les actions fonctionnent.
- `modele/bd.pdo.php` : adaptez les paramètres de connexion avant d'accéder au site.
- `base de donnees/resto.sql` : si vous réinitialisez la DB, pensez aux données (utilisateurs, images/paths relatifs).

**Usage courant :**
- S'inscrire / se connecter via la page d'authentification.
- Rechercher ou lister les restaurants depuis l'accueil.
- Voir le détail d'un restaurant, ajouter une photo, laisser un commentaire/une note, aimer un restaurant.

**Contribuer / Développement :**
- Utilisez un environnement local WAMP pour le développement.
- Vérifier les droits d'écriture pour l'enregistrement d'images si vous activez l'upload.

Si vous voulez, je peux :
- Mettre à jour d'autres README dans le workspace.
- Ajouter un script d'installation automatique (import SQL + configuration) ou un petit fichier `SETUP.md`.

---
Dernière mise à jour : README généré automatiquement par l'assistant.
