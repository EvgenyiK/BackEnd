<?php
$route = $_GET['route'];
if ($route == '' OR $route == '/' ){
    require_once 'main.php';
}elseif ($route == 'admin'){
    require_once 'admin.php';
}elseif ($route == 'admin-create'){
    require_once 'admin_create.php';
}else{
    $route = explode("/",$route);
    if ($route[0] == 'cat'){
        $_GET['id'] = $route[1];
        require_once 'category.php';
    }elseif($route[0] == 'article'){
        $_GET['id'] = $route[1];
        require_once 'article.php';
    }
}
