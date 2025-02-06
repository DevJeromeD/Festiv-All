<?php

class CommentaireModel extends DbConnect
{

    public function viewModel()
    {

        $this->request = "SELECT commentaire.id_commentaire,
        commentaire.contenu,
        commentaire.date_commentaire,
        commentaire.evenement_id,
        commentaire.utilisateur_id,
        utilisateur.nom,
        utilisateur.prenom
        FROM
        commentaire
        INNER JOIN utilisateur ON commentaire.utilisateur_id = utilisateur.id_utilisateur
        INNER JOIN evenement ON commentaire.evenement_id = evenement.id_evenement;";

        $result = $this->connection->query($this->request);
        $commentaire = $result->fetchAll();
        // var_dump($commentaire);
        // die;
        return $commentaire;
    }

    public function addModel(Commentaire $commentaire)
    {
        // var_dump($commentaire);
        // die;

        $this->request = 'INSERT INTO commentaire VALUES (NULL, 
            "' . $commentaire->getContenu() . '", 
            "' . $commentaire->getDate_commentaire() . '", 
            ' . $commentaire->getEvenement_id() . ', 
            ' . $commentaire->getUtilisateur_id() . ')';
        // var_dump($commentaire);
        // die;
        $result = $this->connection->exec($this->request);


        return $result;
    }

    public function deleteFromModel($commentaire2)
    {

        $requete = "DELETE FROM commentaire WHERE id_commentaire=" . $commentaire2->getId_commentaire();
        $resultat = $this->connection->exec($requete);

        // var_dump($resultat);
        // die;

        return $resultat;
    }

    public function update($commentaire)
    {

        $requete = 'UPDATE commentaire SET contenu="' . $commentaire->getContenu() . '",
         date_commentaire="' . $commentaire->getDate_commentaire() . '",
         evenement_id=' . $commentaire->getEvenement_id() . ',
         utilisateur_id="' . $commentaire->getUtilisateur_id() . '" WHERE id_commentaire=' . $commentaire->getId_commentaire();
        $resultat = $this->connection->exec($requete);

        return $resultat;
    }


    public function findSelected(Commentaire $commentaire)
    {

        $id_commentaire = $commentaire->getId_commentaire();
        $evenement_id = $commentaire->getEvenement_id();
        // var_dump($id_commentaire);
        // die;

        $this->request = "SELECT commentaire.id_commentaire,
        commentaire.contenu,
        commentaire.date_commentaire,
        commentaire.evenement_id,
        commentaire.utilisateur_id,
        utilisateur.nom,
        utilisateur.prenom
        FROM commentaire 
        INNER JOIN utilisateur ON commentaire.utilisateur_id = utilisateur.id_utilisateur
        WHERE id_commentaire=$id_commentaire AND evenement_id=$evenement_id";



        // $this->request = "SELECT * FROM evenement WHERE id_creation=" . $evenement->getId_creation();
        $result = $this->connection->query($this->request);
        $commentaires = $result->fetchAll();
        // var_dump($commentaires);
        // die;
        return $commentaires;
    }
}
