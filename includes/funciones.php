<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//Determina el ultimo elemento de la seccion admin 
function esUltimo ( string $actual, string $proximo ): bool{
    if ( $actual !== $proximo ){
        return true;
    }else{
        return false;
    }
}

//Funcion que revisa que el usuario este autenticado
function isAuth() : void{
    if ( !isset( $_SESSION['login'] ) ){
        header('Location: /');
    }
}

function isAdmin():void{
    if ( !isset( $_SESSION['admin'] ) ){
        header('Location: /');
    }
}