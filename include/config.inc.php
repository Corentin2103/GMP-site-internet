<?php
// Param�tres du site pt gmp
// A modifier en fonction de la configuration

define('DBHOST', "localhost");
define('PORT', "3306"); // à changer SI MySQL utilise un autre port (à vérifier dans PhpMyadmin) Léo --> 3307
define('DBNAME', "pt_gmp");
define('DBUSER', "root");
define('DBPASSWD', "");
define('ENV','dev');
define('SALT','48@!alsd');

// pour un environememnt de production remplacer 'dev' (d�veloppement) par 'prod' (production)
// les messages d'erreur du SGBD s'affichent dans l'environememnt dev mais pas en prod
?>
