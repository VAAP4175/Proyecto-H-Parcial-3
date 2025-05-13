<?php
$host="localhost";
$user="root";
$password="";
$dbname="proyectosh";

$conexion=new mysqli($host,$user,$password,$dbname);
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>