CREATE DATABASE emprunt_db;
USE emprunt_db;

CREATE TABLE emprunt_membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    date_naissance DATE,
    genre ENUM('Homme', 'Femme', 'Autre'),
    email VARCHAR(50),
    ville VARCHAR(50),
    mdp VARCHAR(50),
    image_profil VARCHAR(100)
);

CREATE TABLE emprunt_categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100)
);

CREATE TABLE emprunt_objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES emprunt_categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES emprunt_membre(id_membre)
);

CREATE TABLE emprunt_images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(100),
    FOREIGN KEY (id_objet) REFERENCES emprunt_objet(id_objet)
);

CREATE TABLE emprunt_emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES emprunt_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES emprunt_membre(id_membre)
);

CREATE TABLE emprunt_retour (
    id_retour INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(100),
    nom_objet VARCHAR(100),
    etat VARCHAR(20),
    date_retour DATETIME
);

INSERT INTO emprunt_categorie_objet (nom_categorie) VALUES
('esthétique'),
('bricolage'),
('mécanique'),
('cuisine');

INSERT INTO emprunt_membre (nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES
('Alice Martin', '1995-05-14', 'Femme', 'alice@example.com', 'Paris', 'alice123', 'alice.jpg'),
('Bob Durand', '1990-08-22', 'Homme', 'bob@example.com', 'Lyon', 'bob123', 'bob.jpg'),
('Chloé Bernard', '1998-11-02', 'Femme', 'chloe@example.com', 'Marseille', 'chloe123', 'chloe.jpg'),
('David Leroy', '1992-01-30', 'Homme', 'david@example.com', 'Toulouse', 'david123', 'david.jpg');

INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre) VALUES
('Sèche-cheveux', 1, 1),
('Ponceuse', 2, 1),
('Tournevis', 2, 1),
('Mixer', 4, 1),
('Lisseur', 1, 1),
('Perceuse', 2, 1),
('Fouet électrique', 4, 1),
('Crème visage', 1, 1),
('Clé à molette', 3, 1),
('Casserole', 4, 1);

INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre) VALUES
('Rasoir électrique', 1, 2),
('Scie circulaire', 2, 2),
('Pince multiprise', 3, 2),
('Batteur', 4, 2),
('Lime à ongles', 1, 2),
('Tournevis plat', 2, 2),
('Pompe à huile', 3, 2),
('Cuiseur vapeur', 4, 2),
('Brosse visage', 1, 2),
('Friteuse', 4, 2);

INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre) VALUES
('Épilateur', 1, 3),
('Scie sauteuse', 2, 3),
('Cric hydraulique', 3, 3),
('Blender', 4, 3),
('Crème mains', 1, 3),
('Marteau', 2, 3),
('Manomètre', 3, 3),
('Machine à pain', 4, 3),
('Brosse cheveux', 1, 3),
('Poêle antiadhésive', 4, 3);

INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre) VALUES
('Lotion visage', 1, 4),
('Scie manuelle', 2, 4),
('Pompe à air', 3, 4),
('Robot pâtissier', 4, 4),
('Pince à épiler', 1, 4),
('Visseuse', 2, 4),
('Pompe à eau', 3, 4),
('Grille-pain', 4, 4),
('Gel douche', 1, 4),
('Micro-ondes', 4, 4);

INSERT INTO emprunt_images_objet (id_objet, nom_image) VALUES
(1, 'seche_cheveux.jpg'),
(2, 'ponceuse.jpg'),
(3, 'tournevis.jpg'),
(4, 'mixer.jpg'),
(5, 'lisseur.jpg');

INSERT INTO emprunt_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-10'),
(3, 3, '2025-07-05', NULL),
(5, 4, '2025-07-07', '2025-07-14'),
(8, 2, '2025-07-08', NULL),
(11, 1, '2025-07-04', '2025-07-12'),
(12, 3, '2025-07-10', NULL),
(18, 1, '2025-07-03', '2025-07-13'),
(21, 4, '2025-07-06', '2025-07-11'),
(23, 1, '2025-07-02', NULL),
(30, 2, '2025-07-09', NULL);

CREATE OR REPLACE VIEW vue_objets_emprunts AS
SELECT 
        o.id_objet,
        o.nom_objet,
        c.nom_categorie AS categorie,
        m.nom AS emprunteur,
        e.date_emprunt,
        e.date_retour
FROM emprunt_objet o
JOIN emprunt_categorie_objet c ON o.id_categorie = c.id_categorie
LEFT JOIN emprunt_emprunt e ON o.id_objet = e.id_objet
LEFT JOIN emprunt_membre m ON e.id_membre = m.id_membre;
