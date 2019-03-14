<?php 

$user = 'root'; 
$pass = '';
$dsn = 'mysql:host=localhost;dbname=maison-culture;charset=utf8';

try 
{ 
    $bdd= new PDO($dsn, $user, $pass); 
}  
catch (PDOException $e)
{
    die("Erreur ! :".$e->getMessage()."<br/>");
} 
?>