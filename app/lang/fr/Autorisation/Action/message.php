<?php

// Define constant for the directory path
if (!defined('LANG_DIR')) {
    define('LANG_DIR', __DIR__ . '/../../');
}
$commonTranslations = include LANG_DIR . 'common_fr.php';

return [
    'actions' => 'Les actions',
    'filtre' => 'Filter par  controller',
    'choix' => 'Choisir un controller',
    'controller' => 'Controller',
    'action' => 'Action',
    'create' => 'Créer',
    'update' => 'Mettre à jour',
    'delete' => 'Supprimer',
    'search' => 'Rechercher',
    'searchAction' => 'Rechercher une action',
    'success' => 'Succès',
    'error' => 'Erreur',
    'guard_name' => 'Guard du nom',
    'Action' => 'Action',
    'editAction' => "Editer l'action",
    'deleteAction' => "Supprimer l'action",
    'addAction' => 'Ajouter une action',
    'nomAction' => "Nom de l'action",
    'extractActions' => 'Mise à jour des actions',
    'createActionException' => "Creation d'une action qui existe deja ",
    'ActionAdded' => 'Action ajoutée avec succès.',
    'unexpected_error' => ' Erreur inattendue ',
    'ActionUpdated' => 'Action mise à jour avec succès.'
] + $commonTranslations;
