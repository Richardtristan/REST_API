# REST_API
Mettre le contenu du repo à la racine de htdocs ou www etc





liste des chemins :
http://localhost/personne/ --> liste des personnes total

http://localhost/personne/prenom/$prenom/nom/$nom --> liste des personnes correspondant au prenom et nom

http://localhost/personne/prenom/$prenom --> liste des personnes correspondant au prenom

http://localhost/personne/nom/$nom --> liste des personnes correspondant au nom

http://localhost/personne/id/1 --> une personne avec son id = 1

http://localhost/add_personne/prenom/$prenom/nom/$nom --> ajout d'une personne avec son prenom et son nom

http://localhost/update_personne/id/$id/prenom/$prenom/nom/$nom --> update d'une personne avec son id, son nouveau prenom et son nouveau nom

http://localhost/delete_personne/id/$id --> delete d'une personne avec son id
