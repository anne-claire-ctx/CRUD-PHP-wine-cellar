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

} elseif ($url === 'loginForm') {
    require 'form_management/loginForm.php';

} elseif ($url === 'signup') {
    require 'templates/signup.php';

} elseif ($url === 'signupUserForm') {
    require 'form_management/signupUserForm.php';

} elseif ($url === 'pwdChange') {
    require 'form_management/pwdChangeForm.php';

} elseif ($url === 'logout') {
    require 'form_management/logout.php';

} elseif ($url === 'addwine') {
    require 'templates/addwine.php';

} elseif ($url === 'addWineForm') {
    require 'form_management/addWineForm.php';

} elseif ($url === 'deleteWine') {
    require 'form_management/deleteWine.php';

} elseif ($url === 'update') {
    require 'templates/update.php';

} elseif ($url === 'updateWineForm') {
    require 'form_management/updateWineForm.php';

} elseif ($url === 'addAWine') {
    require 'form_management/addAWine.php';

} elseif ($url === 'mywines') {
    require 'templates/mywines.php';

} else {
    require 'templates/my404.php';
}
