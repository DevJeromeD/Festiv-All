<section class="sectionAdmin">
    <div class="container mt-3">


        <div class="boiteBoutonRetour">
            <a class="boutonRetour" href="index.php?controller=Evenement&action=viewController">Retour</a>
        </div>

        <h2>Création d'un événement</h2>

        <form action="index.php?controller=Evenement&action=addTreatment" method="POST" enctype="multipart/form-data">
            <div class=" mb-3 mt-3">
                <label for="nom_evenement" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom_evenement" placeholder="Nom de l'événement" name="nom_evenement" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <input type="text" class="form-control" id="description" placeholder="Description..." name="description" required>
            </div>
            <div class="mb-3">
                <label for="date_evenement" class="form-label">Date de l'événement :</label>
                <input type="date" class="form-control" id="date_evenement" placeholder="Description..." name="date_evenement" required>
            </div>
            <div class="mb-3">
                <label for="nbr_place" class="form-label">Places disponibles :</label>
                <input type="number" class="form-control" id="nbr_place" placeholder="Places disponibles" name="nbr_place" required>
            </div>
            <div class="mb-3">
                <label for="id_categorie" class="form-label">Catégories :</label>
                <select class="form-select" name="id_categorie" id="id_categorie" required>
                    <option selected disabled hidden>Catégorie</option>
                    <?php foreach ($categories as $categorie) { ?>
                        <option value="<?php echo $categorie->id_categorie; ?>">
                            <?php echo $categorie->nom_categorie; ?>
                        </option>
                    <?php } ?>
                </select>

            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Image :</label>
                <input type="file" class="form-control" id="picture" placeholder="" name="picture" required>
            </div>

            <span class="show-picture"></span>
            <!-- <div class="mb-3">
                <label for="nbr_place" class="form-label">Image :</label>
                <input type="number" class="form-control" id="nbr_place" placeholder="Places disponibles" name="nbr_place" required>
            </div> -->
            <!-- <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
        </div> -->
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

    </div>

</section>