<?php
// on appelle notre fichier pour récupérer les infos dans la base de données (fonctions avec requêtes SQL)
require_once dirname(__DIR__) . '/datamanager/data-manager.php';

if(isset($_GET['sort'])) {
    if ($_GET['sort'] == 'region') {
        $sort = 'region';
        $wines = order_by_region($sort);
    } elseif ($_GET['sort'] == 'year') {
        $sort = 'year';
        $wines = order_by_year($sort);
    } elseif ($_GET['sort'] == 'name') {
        $sort = 'name';
        $wines = order_by_name($sort);
    } elseif ($_GET['sort'] == 'country') {
        $sort = 'country';
        $wines = order_by_country($sort);
    } elseif ($_GET['sort'] == 'grape') {
        $sort = 'grape';
        $wines = order_by_grape($sort);
    } elseif ($_GET['sort'] == 'reset') {
        $wines = select_all_wines();
    }
} else {
    $wines = select_all_wines();
}