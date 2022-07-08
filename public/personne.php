<?php

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if (!empty($id)) {
            // Récupérer une seul personne
            $id = intval($id);
            getPersonne($id);
        } else if (!empty($nom) && !empty($prenom)) {
            // Récupérer une seul personne
            getPersonneParNomPrenom($prenom, $nom);
        } else if ((!empty($nom) && empty($prenom))) {
            // Récupérer une seul personne
            getPersonneNom($nom);
        } else if (!empty($prenom) && empty($nom)){
            getPersonnePrenom($prenom);
        }else {
            // Récupérer toutes les personnes
            getPersonnes();
        }
        break;

    case 'POST':
        // Ajouter une personne
        addPersonne();
        break;

    case 'PUT':
        // Modifier une personne
        updatePersonne($id, $prenom, $nom);
        break;

    case 'DELETE':
        // Supprimer une personne
        deletePersonne($id);
        break;

    default:
        // Requête invalide
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}


function getPersonnes()
{
    global $db;
    $query = "SELECT * FROM personnes";
    $response = array();
    $result = $db->prepare($query);
    $result->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function getPersonne($id = 0)
{
    global $db;
    $query = "SELECT * FROM personnes";

    if ($id != 0) {
        $query .= " WHERE id=" . $id . " LIMIT 1";
    }
    $response = array();
    $result = $db->prepare($query);
    $result->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function addPersonne()
{
    global $db;
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    if ($_POST['prenom'] == '') {
        header("HTTP/1.0 400 Bad Request");
        echo "Le prenom est obligatoire";
        exit();
    }
    if ($_POST['nom'] == '') {
        header("HTTP/1.0 400 Bad Request");
        echo "Le nom est obligatoire";
        exit();
    }

    echo $query = "INSERT INTO personnes(Nom, Prenom) VALUES ('$nom', '$prenom')";
    $result = $db->prepare($query);
    $result->execute();
    $response = array();
    if ($result) {
        $response['status'] = 'success';
    } else {
        $response['status'] = 'error';
    }


    header('Content-Type: application/json');
    echo json_encode($response);
}
function getPersonneParNomPrenom($prenom, $nom)
{
    global $db;
    $query = "SELECT * FROM personnes WHERE Prenom LIKE '%$prenom%' AND Nom LIKE '%$nom%'";
    $response = array();
    $result = $db->prepare($query);
    $result->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}
function getPersonneNom($nom)
{
    global $db;
    $query = "SELECT * FROM personnes WHERE Nom LIKE '%$nom%'";
    $response = array();
    $result = $db->prepare($query);
    $result->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}
function getPersonnePrenom($prenom)
{
    global $db;
    $query = "SELECT * FROM personnes WHERE Prenom LIKE '%$prenom%'";
    $response = array();
    $result = $db->prepare($query);
    $result->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}
function updatePersonne($id, $prenom, $nom)
{
    global $db;
    if (!empty($id)){
        if ($prenom == '') {
            header("HTTP/1.0 400 Bad Request");
            echo "Le prenom est obligatoire";
            exit();
        }
        if ($nom == '') {
            header("HTTP/1.0 400 Bad Request");
            echo "Le nom est obligatoire";
            exit();
        }
        $query = "UPDATE personnes SET Nom='$nom', Prenom='$prenom' WHERE Id=$id";
        $result = $db->prepare($query);
        $result->execute();
        $response = array();
    }

    if ($result) {
        $response['status'] = 'success';
    } else {
        $response['status'] = 'error';
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function deletePersonne($id){
    global $db;
    $query = "DELETE FROM personnes WHERE Id=$id";
    $result = $db->prepare($query);
    $result->execute();
    $response = array();
    if ($result) {
        $response['status'] = 'success';
    } else {
        $response['status'] = 'error';
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>