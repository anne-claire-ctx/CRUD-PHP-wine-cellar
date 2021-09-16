<?php session_start();?> 
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCave</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/glass.png">
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- CSS link -->
    <link rel="stylesheet" href="http://localhost/Nouveau-projet/assets/css/reset.css">
    <link rel="stylesheet" href="http://localhost/Nouveau-projet/assets/css/style.css">
</head>

<body>
    <div id="link"><span id="burger"></span></div>
    <div class="menu display-none">
        <div class="menu-container">
            <div class="menu-content">
                <div class="logo"><img src="assets/img/logo-blanc.png" alt="Logo MyCave"></div>
                <nav>
                    <ul>
                        <li class="nav-item"><img src="assets/img/grapes.png" alt="logo verre de vin"><a href="home" class="<?php if  ((!empty($nav)) && ($nav == 'home')) : ?> active<?php endif; ?>">Accueil</a></li>
                        <li class="nav-item"><img src="assets/img/winery.png" alt="logo cave a vin"><a href="dashboard" class="<?php if ((!empty($nav)) && ($nav == 'dashboard')) : ?> active<?php endif; ?>">Nos vins</a></li>
                        <?php if(!empty($_SESSION) && ($_SESSION['role'] == 0)) : ?>
                            <li class="nav-item"><img src="assets/img/my-wines.png" alt="logo mes vins"><a href="mywines" class="<?php if ((!empty($nav)) && ($nav == 'mywines')) : ?> active<?php endif; ?>">Ma Cave à vin</a></li>
                            <li class="nav-item"><img src="assets/img/logout.png" alt="logo deconnexion"><a href="logout">Se déconnecter</a></li>
                        <?php elseif (!empty($_SESSION) && ($_SESSION['role'] == 1)) : ?>
                            <li class="nav-item"><img src="assets/img/my-wines.png" alt="logo mes vins"><a href="mywines" class="<?php if ((!empty($nav)) && ($nav == 'mywines')) : ?> active<?php endif; ?>">Ma Cave à vin</a></li>
                            <li class="nav-item"><img src="assets/img/wine-menu.png" alt="logo menu vins"><a href="addwine" class="<?php if ((!empty($nav)) && ($nav == 'addwine')) : ?> active<?php endif; ?>">Ajouter un vin</a></li>
                            <li class="nav-item"><img src="assets/img/user-wine.png" alt="logo utilisateurs vins"><a href="users" class="<?php if ((!empty($nav)) && ($nav == 'users')) : ?> active<?php endif; ?>">Les utilisateurs</a></li>
                            <li class="nav-item"><img src="assets/img/contact.png" alt="logo contact"><a href="contactemail" class="<?php if ((!empty($nav)) && ($nav == 'mails')) : ?> active<?php endif; ?>">Mails reçus</a></li>
                            <li class="nav-item"><img src="assets/img/logout.png" alt="logo deconnexion"><a href="logout">Se déconnecter</a></li>
                        <?php else : ?>
                            <li class="nav-item"><img src="assets/img/wine-bottle.png" alt="logo ouvre bouteille"><a href="login" class="<?php if ((!empty($nav)) && ($nav == 'login')) : ?> active<?php endif; ?>">Se connecter</a></li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>