### Voici la documentation pour faire fonctionner le site internet : 

# Les logiciels dont vous aller avoir besoins : 
1. Télécharger Xampp 7.3 -> https://www.apachefriends.org/fr/download.html
2. Une fois que vous aurez installé xampp 7.3 connectez-vous sur PHPMYADMIN via cette url: http://localhost/phpmyadmin/index.php

3. Creer une base de donnée:
cliquez sur nouvelle base de donnée dans le nom de la base de donnée nommez là atypikhouse puis cliquez sur le bouton créer.
Ouvrez un terminal

4. Ensuite récupérer le projet sur github en faisant dans le terminal (utiliser gitbash si vous êtes sur windows à télécharger sur ce site si vous ne l'avez pas https://github.com/git-for-windows/git/releases/tag/v2.21.0.windows.1) faites la commande
git clone https://github.com/gigi603/Atypikhouse_gilbert.git dans le dossier xampp/htdocs

5. Une fois le projet atypikhouse_gilbert importé dans xampp/htdocs/

7. Ensuite importez les tables dans la base de donnée atypikhouse dans phpmyadmin (http://localhost/phpmyadmin/index.php) une fois dans phpmyadmin cliquer sur importer et selectionner le fichier atypikhouse.sql puis executer

8. Maintenant télécharger visualstudiocode ouvrez-le puis cliquez sur terminal, new terminal ça va créé un terminal en dessous du projet, aller dans le terminal et aller dans le repertoire atypikhouse_gilbert.


Vous pouvez dès à présent lancer le site

# Lancer le site internet : 
Une fois dans le repertoire atypikhouse_gilbert dans le terminal lancer la commande
1. Lancer un composer install pour installer les dépendances liés à votre application se trouvant dans le composer.json
2. php artisan migrate:refresh --seed afin d'importer les données
3. php artisan serve pour le lancer le serveur
4. (Si problème) Si après avoir fait toutes les manipulations décrite au-dessus php artisan serve ne marche pas faites un composer install puis composer update puis refaites un php artisan serve
5. Aller sur un navigateur puis accéder au site via l'url : http://127.0.0.1:8000/
Pour vous connecter en admin c'est http://127.0.0.1:8000/admin/login
un profil utilisateur gilbert.trinidad@gmail.com et en mot de passe kronos603
un profil admin admin@gmail.com et en mot de passe kronos603

Les mails de promotions liés au newsletters si vous avez cocher la case sont envoyés à l'adresse mail notre.equipe.atypikhouse@gmail.com sur mailtrap
