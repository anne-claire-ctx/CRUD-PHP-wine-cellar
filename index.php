<?php
$url = $_GET['url'] ?? '';

if ($url === '' || $url === 'home') {
    require 'templates/home.php';

} elseif ($url === 'dashboard') {
    require 'templates/dashboard.php';

} elseif ($url === 'product') {
    require 'templates/product.php';

} elseif ($url === 'login') {
    require 'templates/login.php';

} elseif ($url === 'signup') {
    require 'templates/signup.php';

} elseif ($url === 'loginform') {
    require 'src/form_handlers/loginForm.php';

} elseif ($url === 'dashboard') {
    require 'src/templates/dashboard.php';

} elseif ($url === 'dashboardSearch') {
    require 'src/form_handlers/dashboardSearch.php';

} elseif ($url === 'pwdChange') {
    require 'src/form_handlers/pwdChangeForm.php';

} elseif ($url === 'addUser') {
    require 'src/templates/addUser.php';

} elseif ($url === 'addUserForm') {
    require 'src/form_handlers/addUserForm.php';

} elseif ($url === 'logout') {
    require 'form_management/logout.php';

} elseif ($url === 'addwine') {
    require 'templates/addwine.php';

} elseif ($url === 'addWineForm.php') {
    require 'form_management/addWineForm.php';

} elseif ($url === 'deleteWine') {
    require 'form_management/deleteWine.php';

} elseif ($url === 'update') {
    require 'templates/update.php';

} elseif ($url === 'updateWineForm') {
    require 'form_management/updateWineForm.php';

} else {
    require 'templates/my404.php';
}
