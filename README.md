###

# Installer les packages et dépendances

composer install
composer update
npm install
npm update

# Relier le storage (qui contient les images)

php artisan storage:link

# Créer la base de données

php artisan migrate

# Remplir les tables

php artisan db:seed

# Supprimer la base de données et ses tables

php artisan db:wipe

# Lancer le serveur en local

php artisan serve

# Lancer le serveur et autoriser les connexions (EC2 Instance)

php artisan serve --host=0.0.0.0 --port=8000
