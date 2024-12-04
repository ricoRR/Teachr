# Teachr

1. Backend - API Symfony

Cloner le dépôt :

$ git clone git@github.com:ricoRR/Teachr.git
$ cd backend

Installer les dépendances :

$ composer install

Configurer la base de données :
(.env)
DATABASE_URL="mysql://username:password@127.0.0.1:3306/nombre_bdd"

Créer la base de données et les tables :

$ symfony console doctrine:database:create
$ symfony console doctrine:migrations:migrate

Lancer le serveur :

$ symfony server:start


2. Frontend - Interface React

Accéder au dossier frontend :

$ cd frontend

Installer les dépendances :

$ npm install

Lancer l'application React:

$ npm run build
$ npm run preview



