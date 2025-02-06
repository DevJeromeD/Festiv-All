<section class="sectionAdmin">

    <div class="container mt-3">


        <div class="boiteBoutonRetour">
            <a class="boutonRetour" href="index.php?controller=Evenement&action=viewController">Retour</a>
        </div>

        <h2>Modification d'un événement</h2>

        <form action="index.php?controller=Evenement&action=updateTreatment" method="POST">

            <div class=" mb-3 mt-3">
                <input value="<?php echo $evenement->id_evenement ?>" type="number" class="form-control" id="id_evenement" name="id_evenement" hidden>
            </div>
            <div class=" mb-3 mt-3">
                <label for="nom_evenement" class="form-label">Nom :</label>
                <input value="<?php echo $evenement->nom_evenement ?>" type="text" class="form-control" id="nom_evenement" placeholder="Nom de l'événement" name="nom_evenement" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <input value="<?php echo htmlspecialchars($evenement->description) ?>" type="text" class="form-control" id="description" placeholder="Description..." name="description" required>
            </div>
            <div class="mb-3">
                <label for="date_evenement" class="form-label">Date de l'événement :</label>
                <input value="<?php echo $evenement->date_evenement ?>" type="date" class="form-control" id="date_evenement" placeholder="Description..." name="date_evenement" required>
            </div>
            <div class="mb-3">
                <label for="nbr_place" class="form-label">Places disponibles :</label>
                <input value="<?php echo $evenement->nbr_place ?>" type="number" class="form-control" id="nbr_place" placeholder="Places disponibles" name="nbr_place" required>
            </div>
            <div class="mb-3">

                <label for="id_categorie" class="form-label">Catégories :</label>
                <select class="form-select" name="id_categorie" id="id_categorie" required>
                    <option value="" selected disabled hidden><?php echo $evenement->nom_categorie ?></option>
                    <?php foreach ($categories as $categorie) { ?>
                        <option value="<?php echo $categorie->id_categorie; ?>">
                            <?php echo $categorie->nom_categorie; ?>
                        </option>
                    <?php } ?>
                </select>

            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image :</label>
                <input value="<?php echo $evenement->image ?>" type="picture" class="form-control" id="image" placeholder="" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>

    </div>

</section>