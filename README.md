### Voici la documentation pour faire fonctionner le site internet : 

# Les logiciels dont vous aller avoir besoins : 
1. Télécharger Xampp 7.2.10 -> https://www.filepuma.com/download/xampp_7.2.10-20206/
2. Une fois que vous aurez installé xampp 7.2.10, connectez-vous sur PHPMYADMIN via cette url: http://localhost/phpmyadmin/index.php
3. Creer une base de donnée et appelez là atypikhouse
4. Ensuite récupérer le projet sur github en faisant dans la console (utiliser gitbash si vous êtes sur windows) la commande
git clone https://github.com/gigi603/Atypikhouse_gilbert.git 
dans le dossier htdocs du dossier xampp, ah et pensez d'abord à supprimer tous les fichiers qui se trouvent dans htdocs avant d'importer le projet
5. Une fois le projet atypikhouse_gilbert importé dans xampp/htdocs/
6. Créer dans la racine du projet (xampp/htdocs/atypikhouse_gilbert) un fichier .env et coller tout ça dans le fichier

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


7. Ensuite importez les tables dans la base de donnée atypikhouse dans phpmyadmin (http://localhost/phpmyadmin/index.php) une fois dans phpmyadmin cliquer sur importer et selectionner le fichier atypikhouse.sql 

8. Maintenant télécharger visualstudiocode ouvrez-le puis cliquez sur terminal, new terminal ça va créé un terminal en dessous du projet, aller dans le terminal et aller dans le repertoire atypikhouse_gilbert dans le terminal.

Une fois dans le repertoire atypikhouse_gilbert dans le terminal lancer la commande


Vous pouvez dès à présent lancer le site



# Lancer le site internet : 
Une fois dans le repertoire atypikhouse_gilbert dans le terminal lancer la commande
1. php artisan serve
2. (Si problème) Si après avoir fait toutes les manipulations décrite au-dessus php artisan serve ne marche pas faites un composer install puis composer update puis refaites un php artisan serve
3. Aller sur le lien : http://127.0.0.1:8000/ de votre navigateur
