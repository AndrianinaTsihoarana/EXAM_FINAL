<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require("../inc/functions.php");
    session_start();

    $nom = $_POST['name'];
    $naissance = $_POST['naissance'];
    $genre  =$_POST['gender'];
    $email = $_POST['email'];
    $ville = $_POST['ville'];
    $password = $_POST['password'];

    $_SESSION['Nom'] = $nom;

    mapiditra_membre($nom , $naissance, $genre , $email, $ville, $password);

    header("Location: ../pages/home.php");
?>