# Site_Web_Reas_Novae_Presentable
Pour lancer le site, il faudra préalablement installer le server local MAMP.

Une fois MAMP installer, lancer le et cliquez sur "open WebStart page", dans la section phpMyAdmin de Tools ou Outils importer la base de donnée nommée dbresnovae qui se trouve au chemin sql/base sql (vous devrez créer une base du même nom dans phpMyAdmin et une fois dans la base aller sur importé).

Ouvrir le fichier de connexion à la base nommé database.php dans Code/php et changer le port, l'utilisteur et le mot de passe selon votre configuration MAMP visible à l'accueil.

N'oubliez pas de déplacer tout le dossier du projet dans le dossier htdocs accessible dans le repertoire de MAMP et d'y supprimer le fichier index.php qui s'y trouve.

Il ne reste plus qu'à aller dans la section de gestion des sites web de MAMP "my web site ou mon site web", de selectionner le projet et de suivre le chemin Code/php.
