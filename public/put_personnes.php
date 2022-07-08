<?php

$url = $_SERVER['HTTP_HOST'] . '/update_personne/id/' . $id . '/prenom/' . $prenom . '/nom/' . $nom;
if (!empty($nom) && !empty($prenom)) {
    $data = array(
        'nom' => $nom,
        'prenom' => $prenom
    );
$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'PUT',
        'content' => http_build_query($data)
    )
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);


    if ($result) {
        echo "Personne mis à jour";
    } else {
        echo "Erreur lors de maj de la personne";
    }
} else {
    // Requête invalide
    header("HTTP/1.0 405 Method Not Allowed");
}


