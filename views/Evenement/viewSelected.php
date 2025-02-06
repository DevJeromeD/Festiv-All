<section class="evenement-details bg-light" id="backgroundDM">
    <div class="container py-5">
        <div class="row">
            <!-- Image et bouton de retour (Gauche) -->
            <div class="col-md-5">
                <div class="sticky-container">
                    <div class="sticky-content card shadow-sm card-colors-perso">
                        <img src="images/<?php echo $evenement->image; ?>" class="card-img-top card-img-color-perso img-fluid rounded shadow mb-3" alt="<?php echo $evenement->nom_evenement; ?>">
                        <div class="text-center mt-4 mb-4">
                            <a href="index.php?controller=Evenement&action=viewConcertUser&id_categorie=<?php echo $evenement->id_categorie; ?>" class="btn btn-secondary btn-perso">Retour aux événements</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Détails, réservation, infos pratiques (Droite) -->
            <div class="col-md-6">
                <!-- Détails de l'événement -->
                <h3 class="fw-bold text-primary h3-perso"><?php echo $evenement->nom_evenement; ?></h3>
                <p class="text-muted"><?php echo $evenement->description; ?></p>
                <p><strong>Date :</strong> <?php echo $evenement->date_evenement; ?></p>
                <p><strong>Places disponibles :</strong> <?php echo $nbPlaceRestante; ?></p>

                <!-- Informations pratiques -->
                <div class="mt-4">
                    <h5 class="text-secondary">Informations pratiques :</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Heure d'ouverture des portes : 18h00</li>
                        <li class="list-group-item">Parking gratuit disponible sur place.</li>
                        <li class="list-group-item">Restauration et boissons sur le site.</li>
                    </ul>
                </div>

                <?php
                // var_dump($reservations);
                ?>

                <!-- Formulaire de réservation -->
                <div class=" mt-4">
                    <div class="">
                        <h4 class="text-center mb-4">Réservez vos places</h4>
                        <!-- Message de confirmation -->
                        <?php if (isset($_GET['success']) && $_GET['success'] == 'true') { ?>
                            <div class="alert alert-success text-center">
                                Réservation réussie ! Merci pour votre confiance.
                            </div>
                        <?php } ?>
                        <form action="index.php?controller=Reservation&action=addTreatment&id_evenement=<?php echo $evenement->id_evenement; ?>" method="POST">
                            <!-- Section du choix de billets -->
                            <div class="mb-4">
                                <label for="place_taken" class="form-label">Nombre de places</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="place_taken" name="place_taken"
                                        placeholder="Choisissez un nombre" min="1"
                                        max="<?php echo min($evenement->nbr_place, 5); ?>" required>
                                    <span class="input-group-text">places disponibles : <?php echo $nbPlaceRestante; ?></span>

                                </div>

                                <input value="<?php echo $_SESSION['user']['id_utilisateur'] ?>" type="number" class="form-control" id="id_utilisateur" name="id_utilisateur" hidden>
                                <input value="<?php echo $evenement->id_evenement ?>" type="number" class="form-control" id="id_evenement" name="id_evenement" hidden>

                            </div>

                            <!-- Nom
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" required>
                            </div>

                            <! Email -->
                            <!-- <div class="mb-3">
                                <label for="email" class="form-label">Adresse Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
                            </div> -->

                            <!-- Bouton de réservation -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-perso">Réserver maintenant</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mt-5">
            <h4 class="text-center mb-4">Commentaires</h4>
            <div class="row mt-4">
                <?php
                $id_evenement = $_GET['id_evenement'];
                $commentaires_affiches = false;

                // Récupérer l'ID du commentaire à éditer via l'URL
                $commentaire_a_modifier = isset($_GET['edit']) ? $_GET['edit'] : null;

                foreach ($commentaires as $commentaire) {
                    if ($commentaire->evenement_id == $id_evenement) {
                        $commentaires_affiches = true;
                        // var_dump($commentaire);
                        // die;
                ?>
                        <div class="col-md-8 mx-auto">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div id="comment-selected" style="width: 90%;">
                                        <strong><?php echo $commentaire->nom . " " . $commentaire->prenom; ?></strong>

                                        <!-- Condition pour afficher soit <p> soit <input> -->
                                        <?php if ($commentaire_a_modifier == $commentaire->id_commentaire) { ?>
                                            <!-- Formulaire de modification -->
                                            <form action="index.php?controller=Evenement&action=updateCommentaireTreatment&id_commentaire=<?php echo $commentaire->id_commentaire; ?>&id_evenement=<?php echo $id_evenement; ?>" method="POST">
                                                <!-- Formulaire de modification -->
                                                <input value="<?php echo $commentaire->id_commentaire ?>" type="number" class="form-control" id="id_commentaire" name="id_commentaire" hidden>

                                                <textarea type="text" name="contenu" class="form-control mb-2" required><?php echo $commentaire->contenu; ?></textarea>

                                                <input value="<?php echo $commentaire->date_commentaire ?>" type="datetime-local" class="form-control" id="date_commentaire" name="date_commentaire" hidden>
                                                <input value="<?php echo $commentaire->evenement_id ?>" type="number" class="form-control" id="evenement_id" name="evenement_id" hidden>
                                                <input value="<?php echo $commentaire->utilisateur_id ?>" type="number" class="form-control" id="utilisateur_id" name="utilisateur_id" hidden>

                                                <button type="submit" class="btn btn-success btn-sm">Enregistrer</button>
                                                <a href="index.php?controller=Evenement&action=viewSelected&id_evenement=<?php echo $id_evenement; ?>" class="btn btn-secondary btn-sm">Annuler</a>
                                            </form>

                                        <?php } else { ?>
                                            <!-- Affichage du commentaire normal -->
                                            <p><?php echo $commentaire->contenu; ?></p>
                                            <span class="text-muted">Posté le <?php echo $commentaire->date_commentaire; ?></span>
                                        <?php } ?>
                                    </div>
                                    <?php
                                    // var_dump($_SESSION['user']);
                                    // die;



                                    if ($_SESSION['user']['id_utilisateur'] == $commentaire->utilisateur_id) {
                                    ?>
                                        <!-- Boutons Modifier et Supprimer -->
                                        <div class="btn-group">
                                            <a href="index.php?controller=Evenement&action=updateCommentaireGet&id_evenement=<?php echo $id_evenement; ?>&edit=<?php echo $commentaire->id_commentaire; ?>&id_commentaire=<?php echo $commentaire->id_commentaire; ?>&evenement_id=<?php echo $commentaire->evenement_id; ?>#comment-selected"
                                                class="btn btn-sm btn-outline-primary" title="Modifier">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="index.php?controller=Evenement&action=deleteCommentaire&id_commentaire=<?php echo $commentaire->id_commentaire; ?>&id_evenement=<?php echo $id_evenement; ?>"
                                                class="btn btn-sm btn-outline-danger" title="Supprimer">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <?php
                                        } else {
                                            switch ($_SESSION['user']['statut']) {
                                                case 'admin':
                                            ?>
                                                    <a href="index.php?controller=Evenement&action=deleteCommentaire&id_commentaire=<?php echo $commentaire->id_commentaire; ?>&id_evenement=<?php echo $id_evenement; ?>"
                                                        class="btn btn-sm btn-outline-danger" title="Supprimer">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                            <?php
                                                    break;
                                                case 'utilisateur':

                                                    break;
                                                case 'invite':

                                                    break;
                                            }
                                            ?>

                                        </div>
                                    <?php
                                        }
                                    ?>

                                </li>
                            </ul>
                        </div>
                <?php
                    }
                }

                // Si aucun commentaire n'est affiché
                if (!$commentaires_affiches) {
                    echo "<p class='text-center'>Aucun commentaire pour cet événement.</p>";
                }
                ?>
            </div>


            <?php
            // var_dump($commentaires);
            if (isset($_SESSION['user']) && $_SESSION['user']['statut'] !== 'invite') {
            ?>
                <!-- Formulaire d'ajout de commentaire -->
                <div class="col-md-8 mx-auto mt-4 pb-5">
                    <h5 class="text-center">Laissez un commentaire</h5>

                    <form action="index.php?controller=Evenement&action=addCommentaireTreatment&id_evenement=<?php echo $evenement->id_evenement; ?>" method="POST">
                        <!-- Champ pour le contenu du commentaire -->
                        <div class="mb-3">
                            <label for="commentaire" class="form-label">Votre commentaire</label>
                            <textarea class="form-control" id="commentaire" name="contenu" rows="3" placeholder="Partagez votre expérience..." required></textarea>
                        </div>

                        <!-- Champs invisibles supplémentaires -->
                        <input type="hidden" name="date_commentaire" value="<?php echo date('Y-m-d H:i:s'); ?>"> <!-- Date actuelle -->
                        <input type="hidden" name="evenement_id" value="<?php echo $evenement->id_evenement; ?>"> <!-- ID de l'événement -->
                        <input type="hidden" name="utilisateur_id" value="<?php echo $_SESSION['user']['id_utilisateur']; ?>"> <!-- ID de l'utilisateur (exemple) -->

                        <!-- Bouton d'envoi -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-perso">Envoyer</button>
                        </div>
                    </form>

                </div>
            <?php
            } else {
                echo '<div class="col-md-8 mx-auto mt-4 pb-5 text-center"><p>Connectez-vous à votre compte pour pouvoir laisser un commentaire...</p></div>';
            }
            ?>

        </div>

    </div>


</section>