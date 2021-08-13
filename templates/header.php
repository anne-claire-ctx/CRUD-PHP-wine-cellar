<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCave</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/glass.png">
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- CSS stylesheets link -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="burger-icon">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="menu display-none ">
        <div class="menu-container">
            <div class="menu-left">
                <div class="logo"><img src="assets/img/logo-blanc.png" alt="Logo MyCave"></div>
                <nav>
                    <ul>
                        <li class="nav-item"><a href="home">Accueil</a><img src="assets/img/wine.png" alt="logo verre de vin"></li>
                        <li class="nav-item"><a href="ourwines">Nos vins</a><img src="assets/img/wine-cooler.png" alt="logo cave a vin"></li>
                        <?php if (!empty($_SESSION['role'])) : ?>
                            <li class="nav-item"><a href="dashboard">Dashboard</a></li>
                            <li class="nav-item"><a href="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        <?php else : ?>
                            <li class="nav-item"><a href="login">Se connecter</a><img src="assets/img/wine-bottle.png" alt="logo ouvre bouteille"></li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>