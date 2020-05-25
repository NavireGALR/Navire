<?php
$mysqli = new mysqli("logbookeqfbast.mysql.db", "logbookeqfbast", "SQLwretcn2navire");

/* Vérification de la connexion */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* Vérification si la connexion est toujours active */
if ($mysqli->ping()) {
    printf ("La connexion est Ok !\n");
} else {
    printf ("Erreur : %s\n", $mysqli->error);
}

/* Fermeture de la connexion */
$mysqli->close();
?>