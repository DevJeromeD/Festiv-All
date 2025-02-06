<?php

class CategorieModel extends DbConnect
{

    public function view()
    {

        $this->request = "SELECT categorie.id_categorie, 
        categorie.nom_categorie
        FROM categorie";

        $result = $this->connection->query($this->request);
        $categories = $result->fetchAll();
        // var_dump($categories);
        // die;
        return $categories;
    }
}
