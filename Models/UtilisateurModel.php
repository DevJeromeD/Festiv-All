<?php

class UtilisateurModel extends DbConnect
{
    public function view()
    {
        $this->request = "SELECT * FROM utilisateur";

        $result = $this->connection->query($this->request);
        $user = $result->fetchAll(PDO::FETCH_OBJ);

        return $user;
    }

    public function getUser($email, $mdp)
    {

        $this->request = "SELECT * FROM utilisateur WHERE email ='$email' AND mdp ='$mdp' ";

        $result = $this->connection->query($this->request);
        $user = $result->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    public function addUser(Utilisateur $user)
    {
        $this->request = 'INSERT INTO utilisateur VALUES (NULL, 
        "' . $user->getNom() . '", 
        "' . $user->getPrenom() . '", 
        "' . $user->getEmail() . '", 
        "' . $user->getMdp() . '", 
        "' . $user->getStatut() . '")';
        // var_dump($user);
        // die;
        $result = $this->connection->exec($this->request);


        return $result;
    }
}
