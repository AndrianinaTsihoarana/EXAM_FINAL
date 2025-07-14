<?php
    function base_connect() 
    {
        if ($connect = mysqli_connect('localhost', 'ETU004047', 'tmeBam4b', 'db_s2_ETU004047')) 
        {
            if (!$connect) 
            {
                die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
            }

        }
        return $connect;
    }

?>