<?php
    require('connection.php');

    function mapiditra_membre($nom , $naissance, $genre , $email, $ville, $password)
    {
        $sql = "INSERT INTO emprunt_membre (nom , date_naissance, genre, email, ville, mdp) VALUES('%s', '%s', '%s', '%s', '%s', '%s');";
        $sql = sprintf( $sql , $nom, $naissance, $genre , $email, $ville, $password);
        $sql_req = mysqli_query(base_connect(),$sql);
    }

    function manome_id_membre($nom)
    {
        $sql = "SELECT id_membre FROM emprunt_membre WHERE nom = '%s';";
        $sql = sprintf( $sql , $nom);
        $sql_req = mysqli_query(base_connect(),$sql);
        $result = mysqli_fetch_assoc($sql_req);
        return $result;
    }

    function maka_objet($categorie_id) 
    {
        if ($categorie_id) 
        {
            $categorie_id = (int)$categorie_id; 
            $sql = "SELECT o.nom_objet, c.nom_categorie AS categorie, e.date_emprunt, e.date_retour, m.nom AS emprunteur
                    FROM emprunt_objet o
                    LEFT JOIN emprunt_emprunt e ON o.id_objet = e.id_objet AND e.date_retour IS NULL
                    LEFT JOIN emprunt_membre m ON e.id_membre = m.id_membre
                    JOIN emprunt_categorie_objet c ON o.id_categorie = c.id_categorie
                    WHERE o.id_categorie = $categorie_id";
        } 
        else 
        {
            $sql = "SELECT o.nom_objet, c.nom_categorie AS categorie, e.date_emprunt, e.date_retour, m.nom AS emprunteur
                    FROM emprunt_objet o
                    LEFT JOIN emprunt_emprunt e ON o.id_objet = e.id_objet AND e.date_retour IS NULL
                    LEFT JOIN emprunt_membre m ON e.id_membre = m.id_membre
                    JOIN emprunt_categorie_objet c ON o.id_categorie = c.id_categorie";
        }

        $result = mysqli_query(base_connect(), $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    function maka_categorie() 
    {
        $sql = "SELECT * FROM emprunt_categorie_objet";
        $sql_req = mysqli_query(base_connect(), $sql);
        return mysqli_fetch_all($sql_req, MYSQLI_ASSOC);
    }

?>