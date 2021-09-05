<?php
// on appelle notre fichier pour récupérer les infos dans la base de données (fonctions avec requêtes SQL)
require_once dirname(__DIR__) . '/datamanager/data-manager.php';
require_once __DIR__ . '/validation.php';

if(isset($_POST['search']) && !empty($_POST['search'])) {
        $search = html($_POST['search']);
        $wines = search_wine($search);
} else {
        $wines = select_all_wines();
}