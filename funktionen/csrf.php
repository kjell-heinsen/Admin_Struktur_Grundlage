<?php

use app\helpers\MyForms;

function getToken() {
    if(isset($_SESSION['csrf'])) {
        return $_SESSION['csrf'];
    } else {
        $token = MyForms::csrf();//random key generator goes here;
        $_SESSION['csrf'] = $token;
        return $token;
    }
}

function validateToken($token) {
    if ($token == getToken()){
        $_SESSION['csrf'] = NULL;
        return true;
    } else {
        return false;
    }
}

?>