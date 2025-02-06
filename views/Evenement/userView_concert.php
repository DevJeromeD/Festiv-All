<section class="evenement-colors">
    <div class="back-evenement-container">
        <?php
        // var_dump($_GET);
        // die;
        // var_dump($data);
        $id_categorie = $_GET['id_categorie'];
        $evenement = new Evenement();
        $evenement->setId_categorie($id_categorie);
        switch ($evenement->getId_categorie()) {
            case '1':
                echo '<div class="back-concert">
                <h1 class="text-center mb-4 titre-perso">Concerts du Festival</h1>
                  </div>';
                break;
            case '3':
                echo '<div class="back-spec">
                <h1 class="text-center mb-4 titre-perso">Spectacles du Festival</h1>
                </div>';
                break;
            case '2':
                echo '<div class="back-atelier">
                <h1 class="text-center mb-4 titre-perso">Ateliers du Festival</h1>
                </div>';
                break;

            default:
                echo "<p>Erreur...</p>";
                break;
        } ?>
    </div>
    <div class="container my-5 my-5-perso">

        <div class="row">
            <?php foreach ($evenements as $evenement) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card card-colors-perso">
                        <img src="images/<?php echo $evenement->image; ?>" class="card-img-top card-img-color-perso" alt="<?php echo $evenement->nom_evenement; ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $evenement->nom_evenement; ?></h5>
                            <p class="card-text"><?php echo $evenement->description; ?></p>
                            <p class="card-text">Date du concert : <?php echo $evenement->date_evenement; ?></p>
                            <p class="card-text">Places restantes : <?php echo $evenement->placeRestante !== -1 ? $evenement->placeRestante : $evenement->nbr_place; ?></p>
                            <a href="index.php?controller=Evenement&action=viewSelected&id_evenement=<?php echo $evenement->id_evenement; ?>" class="btn btn-primary btn-perso">Voir plus</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section>



</div>