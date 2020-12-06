<?php

$host="localhost";
$db="booksline";
try {
$db=new PDO(
    "mysql:host=$host; dbname=$db","root","");
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Erreur survenue ";
    die();
}
?>