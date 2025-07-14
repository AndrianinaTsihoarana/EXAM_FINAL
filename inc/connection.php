<?php
    function base_connect() 
    {
        if ($connect = mysqli_connect('127.0.0.1', 'root', 'root', 'Tumblr')) 
        {
            if (!$connect) 
            {
                die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
            }

        }
        return $connect;
    }
?>