<?php

// Define constant for the directory path

if (!defined('LANG_DIR')) {
    define('LANG_DIR', __DIR__ . '/../../');
}
$commonTranslations = include LANG_DIR . 'common_fr.php';

return [
    'NameController' => 'Nom de controller',
    'Actions' => 'Actions',
    'NoControllers' => 'Aucun controller trouvée',
    'Controllers' => 'Controllers',
    'addController' => 'Ajouter un Controller',
    'editController' => 'Editer la Controller',
    'downloadControllers' => 'Télécharger les Controllers',
    'ConfirmDeleteController' => 'Êtes-vous sûr de vouloir supprimer cette Controller ?',
    // 'add' => 'Ajouter',
    // 'Delete' => 'Supprimer',
    // 'edit' => 'Editer',
    'update' => 'Mise à jour',
    // 'cancel' => 'Quitter',
    'controllerExistPas' => "Controller n'exist pas",
    'nomControllerExistDeja' => "Le nom du controller existe déjà dans la table.",
    'CreatedController' => "Controller a été créée avec succès.",
    'UpdatedController' => "Controller a été créée avec succès.",
    'DeletedController' => "Controller supprimé avec succès.",
    'errorDownloadSeeder' => "Une erreur s'est produite lors du téléchargement du seeder.",
    'DownloadSeeder' => "Les controllers téléchargé avec succès.",
]+ $commonTranslations;
