# 🎬 Application Films — Symfony 7.1

Application web de gestion et consultation de films construite avec Symfony 7.1, Doctrine ORM et Twig.

---

## 📋 Description

Projet Symfony full-stack permettant de consulter un catalogue de films avec un système d'authentification sécurisé. L'interface est rendue côté serveur via **Twig**, avec des assets gérés par **Webpack Encore** et **Asset Mapper**.

---

## 🗂️ Structure du projet

```
project/
│
├── src/
│   ├── Controller/
│   │   ├── FilmController.php       # Gestion du catalogue de films
│   │   └── SecurityController.php   # Authentification (login/logout)
│   │
│   ├── Entity/                      # Entités Doctrine (ex: Film)
│   ├── Repository/
│   │   └── FilmRepository.php       # Requêtes base de données films
│   └── ...
│
├── templates/
│   ├── film/
│   │   └── index.html.twig          # Vue liste des films
│   └── security/
│       └── login.html.twig          # Vue formulaire de connexion
│
├── config/                          # Configuration Symfony
├── migrations/                      # Migrations Doctrine
├── public/                          # Point d'entrée web (index.php)
├── tests/                           # Tests PHPUnit
├── .env                             # Variables d'environnement
└── composer.json
```

---

## 🗺️ Routes

| Méthode | Route | Nom | Description |
|---|---|---|---|
| `GET` | `/films` | `app_films` | Liste de tous les films |
| `GET` | `/login` | `app_login` | Formulaire de connexion |
| `GET/POST` | `/logout` | `app_logout` | Déconnexion |

---

## 🛠️ Technologies utilisées

| Technologie | Version | Usage |
|---|---|---|
| PHP | ≥ 8.2 | Langage serveur |
| Symfony | 7.1 | Framework principal |
| Doctrine ORM | ^3.3 | ORM & gestion base de données |
| Doctrine Migrations | ^3.3 | Migrations BDD |
| Twig | ^3.0 | Moteur de templates |
| Symfony Security | 7.1 | Authentification & autorisation |
| Symfony Form | 7.1 | Gestion des formulaires |
| Symfony Mailer | 7.1 | Envoi d'emails |
| Symfony Validator | 7.1 | Validation des données |
| Webpack Encore | 2.2 | Bundler assets (JS/CSS) |
| Symfony Asset Mapper | 7.1 | Gestion des assets |
| Stimulus / Turbo | ^2.21 | Interactivité frontend |
| PHPUnit | ^9.5 | Tests unitaires |

---

## 🚀 Installation & Lancement

### Prérequis
- PHP >= 8.2
- Composer
- Symfony CLI
- MySQL (ou autre base de données compatible Doctrine)
- Node.js & npm (pour les assets)

### Étapes

```bash
# 1. Cloner le dépôt
git clone https://github.com/ton-user/ton-projet.git
cd ton-projet

# 2. Installer les dépendances PHP
composer install

# 3. Installer les dépendances JS
npm install

# 4. Configurer les variables d'environnement
cp .env .env.local
# Modifier DATABASE_URL dans .env.local
```

### Configuration de la base de données

Dans `.env.local`, configurer la connexion :

```env
DATABASE_URL="mysql://user:password@127.0.0.1:3306/nom_de_la_base?serverVersion=8.0"
```

```bash
# 5. Créer la base de données
php bin/console doctrine:database:create

# 6. Exécuter les migrations
php bin/console doctrine:migrations:migrate

# 7. Compiler les assets
npm run build
# ou en développement :
npm run dev --watch

# 8. Lancer le serveur
symfony server:start
# ou
php -S localhost:8000 -t public/
```

---

## 🔐 Authentification

La sécurité est gérée par **Symfony Security Bundle** :

- Connexion via `/login` avec formulaire (email + mot de passe)
- Déconnexion via `/logout` (interceptée par le firewall Symfony)
- Les erreurs de connexion et le dernier identifiant saisi sont gérés automatiquement via `AuthenticationUtils`

---

## 🧪 Tests

```bash
# Lancer les tests PHPUnit
php bin/phpunit
```

---

## ⚙️ Commandes utiles

```bash
# Vider le cache
php bin/console cache:clear

# Créer une entité
php bin/console make:entity

# Créer un controller
php bin/console make:controller

# Générer une migration
php bin/console make:migration

# Appliquer les migrations
php bin/console doctrine:migrations:migrate

# Voir les routes
php bin/console debug:router
```

---

## 📦 Variables d'environnement

| Variable | Description |
|---|---|
| `DATABASE_URL` | URL de connexion à la base de données |
| `APP_ENV` | Environnement (`dev`, `prod`, `test`) |
| `APP_SECRET` | Clé secrète de l'application |
| `MAILER_DSN` | Configuration du mailer (si utilisé) |

---

© Symfony Films App — 2024
