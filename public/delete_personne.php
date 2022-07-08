<?php

$url = 'http://'. $_SERVER['HTTP_HOST'] . '/delete_personne/id/' . $id ;
if (!empty($id) ) {
    $data = array(
        'id' => $id,
    );
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'DELETE',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);


    if ($result) {
        echo "Personne supprimer";
    } else {
        echo "Erreur lors de la suppression de la personne";
    }
} else {
    // Requête invalide
    header("HTTP/1.0 405 Method Not Allowed");
}


