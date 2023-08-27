<?php
require './functions/Database.php';
$db = new Database();
$db->connect();

if(isset($_GET['p'])) {
    $p = $_GET['p'];
}else {
    $p = 'home';
}


/**
 * router qui permet de detecter quel page afficher
 */
if($p === 'home') {
    require './pages/home.php';
}elseif($p === 'edit') {
    require './pages/edit.php';
}elseif($p === 'new') {
    require './pages/new.php';
}elseif($p === 'delete'){
    require './pages/delete.php';
}else {
    require './pages/home.php';
}


