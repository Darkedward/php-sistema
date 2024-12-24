<?php

$servidor="localhost";
$baseDatos="bdrestaurante";
$usuario="root";
$contrasenia="";

try{
    $conexion=new PDO("mysql:host=$servidor;dbname=$baseDatos",$usuario,$contrasenia);
    echo"conexion establecida";

}catch(Exception $error){
    echo $error->getMessage();
}

?>