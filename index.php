<?php 
        $url=$_GET['url'] ?? '';

        if($url === '' || $url === 'home'){
            require 'templates/home.php';
        }
        elseif($url === 'ourwines'){
            require 'src/templates/ourwines.php';
        }
        elseif($url === 'bottleDetail'){
            require 'src/templates/bottleDetail.php';
        }
        elseif($url === 'contact'){
            require 'src/templates/contact.php';
        }
        elseif($url === 'login'){
            require 'src/templates/login.php';
        }
        elseif($url === 'loginform'){
            require 'src/form_handlers/loginForm.php';
        }
        elseif($url === 'dashboard'){
            require 'src/templates/dashboard.php';
        }
        elseif($url === 'dashboardSearch'){
            require 'src/form_handlers/dashboardSearch.php';
        }
        elseif($url === 'pwdChange'){
            require 'src/form_handlers/pwdChangeForm.php';
        }
        elseif($url === 'addUser'){
            require 'src/templates/addUser.php';
        }
        elseif($url === 'addUserForm'){
            require 'src/form_handlers/addUserForm.php';
        }
        elseif($url === 'accessDenied'){
            require 'src/templates/accessDenied.php';
        }
        elseif($url === 'logout'){
            require 'src/form_handlers/logout.php';
        }
        elseif($url === 'addBottle'){
            require 'src/templates/addBottle.php';
        }
        elseif($url === 'addBottleForm'){
            require 'src/form_handlers/addBottleForm.php';
        }
        elseif($url === 'deleteBottle'){
            require 'src/templates/deleteBottle.php';
        }
        elseif($url === 'deleteBottleForm'){
            require 'src/form_handlers/deleteBottleForm.php';
        }
        elseif($url === 'editBottle'){
            require 'src/templates/editBottle.php';
        }
        elseif($url === 'editBottleForm'){
            require 'src/form_handlers/editBottleForm.php';
        }
       else{
            require 'src/templates/404.php';
        }
