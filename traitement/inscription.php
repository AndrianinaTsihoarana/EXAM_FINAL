<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    $nom = $_POST['name'];
    $naissance = $_POST['naissance'];
    $genre  =$_POST['genre'];
    $email = $_POST['email'];
    $ville = $_POST['ville'];
    $password = $_POST['password'];

    mapiditra_membre($nom , $naissance, $genre , $email, $ville, $password);

    header("Locatio: ../pages/")
?>