# Alderaan

## Prérequis
- PHP >= 7.2
- NPM

## Installation
1. Clôner le dépôts
2. Faire un `composer install` dans le répertoire du projet
3. Créer un fichier `.env.local` et y ajouter la configuration d'accès à la BDD
4. Créer la base de données `symfony console doctrine:database:create`
5. Migrer la base de donnée `symfony console make:migration`
6. Effetuer les migration de la base de données `symfony console doctrine:migrations:migrate`
7. Faire un `npm install`
8. Executer un `npm run build` (lors de la première installation, puis `npm run dev-server` par la suite)
9. Démarrer le serveur `symfony serve`
10. L'application est prête
