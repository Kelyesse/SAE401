# CHEMIN VERS UN FICHIER DE CONFIG ( ==> solution pour utiliser PhpMyAdmin peu importe notre IP)

/etc/phpmyadmin/config.inc.php
Ligne 58-59 :
Fallback to default linked

# ICI, changer l'IP

$hosts = ['...'];
