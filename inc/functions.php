<?php
    require('connection.php');

    function mapiditra_membre($nom , $naissance, $genre , $email, $ville, $password)
    {
        $sql = "INSERT INTO membre (nom , date_naissance, genre, email, ville, mdp) VALUES('%s', '%s', '%s', '%s', '%s', '%s');";
        $sql = sprintf( $sql , $nom, $naissance, $genre , $email, $ville, $password);
        $sql_req = mysqli_query(base_connect(),$sql);
    }
?>