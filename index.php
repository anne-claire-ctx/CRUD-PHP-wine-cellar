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

} elseif ($url === 'deleteMyWine') {
    require 'form_management/deleteMyWine.php';

} elseif ($url === 'pwdchange') {
    require 'templates/pwdchange.php';

} elseif ($url === 'pwdChangeForm') {
    require 'form_management/pwdChangeForm.php';

} elseif ($url === 'searchForm') {
    require 'form_management/searchForm.php';

} elseif ($url === 'users') {
    require 'templates/users.php';

} elseif ($url === 'editUser') {
    require 'form_management/editUser.php';

} elseif ($url === 'deleteUser') {
    require 'form_management/deleteUser.php';

} elseif ($url === 'contact') {
    require 'templates/contact.php';

} elseif ($url === 'contactForm') {
    require 'form_management/contactForm.php';

} elseif ($url === 'contactemail') {
    require 'templates/contactemail.php';

} elseif ($url === 'deleteContact') {
    require 'form_management/deleteContact.php';

} else {
    require 'templates/my404.php';
}
