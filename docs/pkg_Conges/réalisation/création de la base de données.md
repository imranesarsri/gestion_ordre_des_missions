---
layout: default
chapitre: true
package: pkg_projets
order: 645
---
### Création de la base de données 


````bash
php artisan make:model Conge -m
php artisan make:migration create_personnels_conges_table
````$$