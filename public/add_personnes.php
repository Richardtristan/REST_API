<?php

$url = 'http://'. $_SERVER['HTTP_HOST'] . '/add_personne/prenom/' . $prenom . '/nom/' . $nom;
if (!empty($nom) && !empty($prenom)) {
    $data = array(
        'nom' => $nom,
        'prenom' => $prenom
    );
$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

    if ($result) {
        echo "Personne ajoutée";
    } else {
        echo "Erreur lors de l'ajout de la personne";
    }
} else {
    // Requête invalide
    header("HTTP/1.0 405 Method Not Allowed");
}


