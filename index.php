<?php

/**
 * 1. A l'aide de PhpMyAdmin
 * ==> Créez une nouvelle base de données intro_sql_phpmyadmin
 * ==> Une fois créée, trouvez un moyen pour supprimer cette base de données toujours depuis PhpMyAdmin.
 */

// FIXME ==> Aucun code à fournir pour cette étape.


/**
 * 2. A l'aide de PHP
 * ==> Créez une nouvelle base de données intro_sql
 * ==> Tentez de la supprimer depuis PHP
 * ==> Créez la à nouveau car nus en aurons besoin pour l'exo suivant !
 * Théorie :
 * -----------
 * En SQL, l'instruction DROP DATABASE nom_de_ma_table permet de supprimer une base de données.
 * Dans la réalité, vous n'aurez que très peu d'occasions de vous en servir directement depuis PHP mais retenez la quand même, elle peut être utile dans le cadre de tests.
 */

// TODO Votre code ici bas.

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'intro_sql';

try {
    $maConnexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $maConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $request = "
        CREATE TABLE intro_sql (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(30) NOT NULL,
            rue VARCHAR(70) NOT NULL,
            numero SMALLINT UNSIGNED NOT NULL,
            code_postal SMALLINT UNSIGNED NOT NULL,
            ville VARCHAR(50) NOT NULL,
            pays VARCHAR(40) NOT NULL,
            mail VARCHAR(100) NOT NULL,
            date_enregistrement DATETIME DEFAULT CURRENT_TIMESTAMP,
            UNIQUE(mail) 
        )
    ";

    $maConnexion->exec($request);

    echo "La base de données intro_sql a bien été créée.";
}
catch (PDOException $exception) {
    echo $exception->getMessage();
}


//delete

/*try {
    $maConnexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $maConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DROP TABLE intro_sql";
    $maConnexion->exec($sql);
    echo "<p>Table supprimé</p>";
}
catch (PDOException $exception) {
    echo $exception->getMessage();
}*/



