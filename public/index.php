<?php

include ('../dbConnect.php');
require_once("{$_SERVER['DOCUMENT_ROOT']}/router.php");

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
get('/', 'index.php');

// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
get('/personne/id/$id', 'personne.php');
get('/personne/prenom/$prenom/nom/$nom', 'personne.php');
get('/personne/prenom/$prenom', 'personne.php');
get('/personne/nom/$nom', 'personne.php');
get('/personne', 'personne.php');

get('/add_personne/$prenom/$nom', 'add_personnes.php');
post('/add_personne/prenom/$prenom/nom/$nom', 'personne.php');

get('/update_personne/id/$id/prenom/$prenom/nom/$nom', 'put_personnes.php');
put('/update_personne/id/$id/prenom/$prenom/nom/$nom', 'personne.php');

get('/delete_personne/id/$id', 'delete_personne.php');
delete('/delete_personne/id/$id', 'personne.php');
// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','/404.php');