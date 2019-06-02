### Voici la documentation pour faire fonctionner le site internet : 

# Les logiciels dont vous aller avoir besoins : 
1. Télécharger Xampp 7.2.10 -> https://www.filepuma.com/download/xampp_7.2.10-20206/
2. Une fois que vous aurez installé xampp 7.2.10, connectez-vous sur PHPMYADMIN via cette url: http://localhost/phpmyadmin/index.php
3. Creer une base de donnée et appelez là atypikhouse
4. Ensuite récupérer le projet sur github en faisant dans la console (utiliser gitbash si vous êtes sur windows) un git clone https://github.com/gigi603/Atypikhouse_gilbert.git dans le dossier htdocs du dossier xampp, ah et pensez d'abord à supprimer tous les fichiers qui se trouvent dans htdocs avant d'importer le projet
5. Une fois le projet importé
6. Créer dans la racine du projet un fichier .env et coller tout ça

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:XvT4076FErsFxaBNVLkd3nF+8Wlz1o99oPmWfH6ncTc=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=atypikhouse
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=

NOCAPTCHA_SECRET=6Lfc4XUUAAAAAMjCjnE1er7tcmlEcxwrAojnomdo
NOCAPTCHA_SITEKEY=6Lfc4XUUAAAAAIImE0jHdcjmv4Z87O_XzkJIMlvA


7. Ensuite importez les tables dans la base de donnée atypikhouse dans phpmyadmin soit en important le atypikhouse.sql
ou allez à l'intérieur du dossier de votre projet qui se trouve dans "xampp/htdocs/dossier-de-votre-projet" et taper sur votre console la commande:
php artisan migrate:refresh --seed.

Cette commande permet de créér toutes les tables ainsi que les données sur votre base de donnée dans phpmyadmin.

Vous pouvez dès à présent lancer le site

8. Télécharger un editeur de texte comme par exemple Sublime text pour afficher le code et y apporter des modifications à votre guise -> https://www.sublimetext.com/


# Lancer le site internet : 

1. php artisan serve
2. (Si problème) Si après avoir fait toutes les manipulations décrite au-dessus php artisan serve ne marche pas faites un composer install puis composer update puis refaites un php artisan serve
3. Aller sur le lien : http://127.0.0.1:8000/ de votre navigateur

# Installer les tests fonctionnels : 
    php artisan dusk:install

# Lancer les tests fonctionnels : (seulement sur mac et linux)
    télécharger : https://chromedriver.storage.googleapis.com/index.html?path=2.40/
    lancer chromedriver.exe 
    php artisan dusk

# Lancer les tests unitaires : 
    ./vendor/bin/phpunit

