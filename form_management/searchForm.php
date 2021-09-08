<?php
// on appelle notre fichier pour récupérer les infos dans la base de données (fonctions avec requêtes SQL)
require_once dirname(__DIR__) . '/datamanager/data-manager.php';
require_once __DIR__ . '/validation.php';

if(isset($_POST['search']) && !empty($_POST['search'])) {
        $search = html($_POST['search']);
        $wines = search_wine($search);
} elseif (isset($_GET['sort'])) {
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
            } elseif ($_GET['sort'] == 'color') {
                $sort = 'color';
                $wines = order_by_color($sort);
            } elseif ($_GET['sort'] == 'grade') {
                $sort = 'grade';
                $wines = order_by_grade($sort);
            } elseif ($_GET['sort'] == 'reset') {
                $wines = select_all_wines();
            }
} else {
        $wines = select_all_wines();
}
        