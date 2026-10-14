# Gestion de camping

Application web de gestion et de consultation de lieux de camping, développée avec Laravel. Le projet organise plusieurs ressources liées à l'activité : lieux, services, guides, visiteurs et réservations.

> **État du projet :** cette documentation est basée sur l'archive fournie. Le projet utilise une version ancienne de Laravel (5.7) et doit être vérifié et mis à niveau avant toute mise en production. Dans l'archive analysée, les fichiers `artisan` et `.env.example` ne sont pas présents ; vérifiez qu'ils existent dans votre copie locale avant de suivre l'installation ci-dessous.

## Fonctionnalités repérées dans le code

- Page d'accueil présentant des données issues des lieux, services, visiteurs, guides et réservations.
- Pages de consultation des services et des lieux.
- Pages liées aux guides et aux détails d'un guide.
- Consultation d'une réservation à partir de son identifiant.
- Pages relatives aux visiteurs et aux réservations personnelles.
- Gestion de contenu et interface d'administration basée sur **Laravel CRUDbooster**.
- Ressources de données pour les villes, lieux, services, guides, visiteurs et réservations.

Les fonctionnalités ci-dessus sont déduites des routes, contrôleurs, vues et migrations présentes. Le parcours complet de réservation, les règles de disponibilité, le paiement et les rôles doivent être validés en exécutant l'application.

## Technologies

- **Backend :** PHP, Laravel 5.7
- **Administration :** Laravel CRUDbooster 5.4
- **Base de données :** MySQL/MariaDB (à configurer selon l'environnement)
- **Frontend :** Blade, Bootstrap 4, Laravel Mix, Sass et JavaScript
- **Tests :** PHPUnit (tests de démonstration présents dans `tests/`)

## Structure du projet

```text
.
├── app/
│   └── Http/Controllers/   # Contrôleurs web et administration
├── config/                # Configuration Laravel
├── database/
│   ├── migrations/        # Schéma de base de données
│   ├── factories/
│   └── seeds/             # Données de démonstration éventuelles
├── public/                # Point d'entrée et ressources publiques
├── resources/
│   ├── lang/              # Traductions
│   ├── sass/              # Styles Sass
│   └── views/              # Vues Blade
├── routes/
│   ├── web.php            # Routes web
│   └── api.php             # Route API d'exemple
├── tests/                 # Tests PHPUnit
├── composer.json
├── composer.lock
└── package.json
```

## Prérequis

Le projet repose sur une pile ancienne. Utilisez un environnement PHP et Composer compatible avec Laravel 5.7 et les dépendances verrouillées dans `composer.lock`. Vérifiez notamment la version de PHP requise par les extensions installées.

Outils nécessaires :

- PHP et les extensions requises par Laravel et les dépendances ;
- Composer ;
- MySQL ou MariaDB ;
- Node.js et npm, uniquement si vous devez reconstruire les ressources frontend ;
- Git, recommandé pour le suivi des modifications.

> Laravel 5.7 n'est plus une version actuelle. Pour un usage public ou professionnel, planifiez une migration vers une version de Laravel maintenue et vérifiez les avis de sécurité de toutes les dépendances.

## Installation locale

### 1. Récupérer le projet

```bash
git clone <URL_DU_DEPOT>
cd <DOSSIER_DU_PROJET>
```

### 2. Vérifier les fichiers indispensables

La racine Laravel doit normalement contenir le script `artisan` et un modèle de configuration `.env.example`. Si l'un d'eux manque, restaurez-le depuis la copie complète du projet avant de poursuivre.

### 3. Installer les dépendances PHP

```bash
composer install
```

Si Composer signale une incompatibilité de version, n'utilisez pas `--ignore-platform-reqs` comme solution permanente. Vérifiez la version de PHP, les extensions et les contraintes de `composer.json`.

### 4. Configurer l'environnement

Lorsque `.env.example` est présent :

```bash
copy .env.example .env
```

Sous macOS/Linux, utilisez `cp .env.example .env`.

Configurez au minimum les variables d'application et de base de données dans `.env` :

```dotenv
APP_NAME="Gestion de camping"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_camping
DB_USERNAME=root
DB_PASSWORD=
```

Adaptez les valeurs à votre installation locale. **Ne publiez jamais le fichier `.env` ni de véritables identifiants.**

### 5. Créer la base de données

Créez une base de données vide, par exemple `gestion_camping`, dans MySQL/MariaDB. Puis, si le fichier `artisan` est présent :

```bash
php artisan key:generate
php artisan migrate
```

Les migrations du projet définissent notamment les tables liées aux lieux, services, visiteurs et réservations. Vérifiez l'ordre des migrations et les contraintes de la base avant d'utiliser des données réelles.

### 6. Construire les ressources frontend (si nécessaire)

```bash
npm install
npm run development
```

Pour une compilation optimisée :

```bash
npm run production
```

### 7. Lancer le serveur local

```bash
php artisan serve
```

Ouvrez ensuite l'adresse indiquée dans le terminal, généralement `http://127.0.0.1:8000`.

## Routes principales repérées

Les routes suivantes sont déclarées dans `routes/web.php` :

| URL | Usage apparent |
|---|---|
| `/` | Page d'accueil |
| `/services` | Consultation des services |
| `/guide` | Page liée aux guides |
| `/lieux` | Page liée aux lieux |
| `/visiteurs` | Page liée aux visiteurs |
| `/detail_guide` | Détail d'un guide |
| `/reservation` | Page de réservation |
| `/checklieux` | Vérification liée aux lieux |
| `/mes_reservations` | Réservations de l'utilisateur |

Certaines pages utilisent un identifiant transmis en paramètre. Vérifiez les routes, la validation des entrées et les autorisations avant toute exposition publique.

## Tests

Les tests de démonstration se trouvent dans `tests/`. Après avoir confirmé que l'environnement est correctement installé, lancez :

```bash
vendor/bin/phpunit
```

ou, si le script `artisan` fonctionne :

```bash
php artisan test
```

Les tests actuellement présents semblent être des tests d'exemple. Ils ne suffisent pas à prouver que les réservations, les permissions, les validations et les opérations de gestion fonctionnent correctement. Ajoutez des tests métier avant de considérer le projet comme validé.

## Sécurité et limites connues

Avant tout déploiement :

- remplacer toute clé d'application ou tout identifiant qui aurait été exposé ;
- ne jamais committer `.env`, mots de passe, clés API ou données personnelles ;
- désactiver le mode debug en production (`APP_DEBUG=false`) ;
- protéger les routes d'administration et vérifier les autorisations côté serveur ;
- valider toutes les entrées utilisateur et utiliser des requêtes paramétrées ;
- vérifier les uploads de fichiers, leurs types, leurs tailles et leur emplacement ;
- contrôler les dépendances anciennes et planifier la mise à niveau de Laravel ;
- tester les migrations sur une base vide et sauvegarder les données avant toute mise à jour.

## Contribution

1. Créez une branche pour votre modification.
2. Décrivez clairement le changement.
3. Ajoutez ou mettez à jour les tests concernés.
4. Vérifiez que les tests passent avant d'ouvrir une Pull Request.

## Auteur

**Wissem Attouf**  
Projet académique / personnel de gestion de camping.

---

*Documentation rédigée à partir des fichiers du dépôt fourni. Les fonctionnalités, règles métier, rôles et parcours complets doivent être confirmés par des tests de l'application.*
