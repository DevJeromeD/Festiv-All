<?php

// echo "Test";

?>
<section class="sectionAdmin">

    <div class="container mt-3">
        <h2>Liste des événements</h2>
        <a href="index.php?controller=Evenement&action=viewController">Retour</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="fondOr">ID</th>
                    <th class="fondOr">Nom</th>
                    <th class="fondOr">Catégorie</th>
                    <th class="fondOr">Description</th>
                    <th class="fondOr">Date de l'événement</th>
                    <th class="fondOr">Places disponibles</th>
                    <th class="fondOr">Image</th>
                    <th class="fondOr">Afficher/Modifier/Supprimer</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // var_dump($evenements);
                // die;

                // var_dump($evenements);
                // die;

                ?>
                <tr>
                    <td><?php echo $evenements->id_evenement ?></td>
                    <td><?php echo $evenements->nom_evenement ?></a></td>
                    <td><?php echo $evenements->nom_categorie ?></a></td>
                    <td><?php echo $evenements->description ?></td>
                    <td><?php echo $evenements->date_evenement ?></td>
                    <td><?php echo $evenements->nbr_place ?></td>
                    <td><img class="img-fluid rounded w-25 mx-auto d-block" src="images/<?php echo $evenements->image; ?>" alt="Image de l'événement"></td>
                    <td>
                        <a href="index.php?controller=Evenement&action=updateGet&id_evenement=<?php echo $evenements->id_evenement ?>&id_categorie=<?php echo $evenements->id_categorie ?>"><i class="fa-solid fa-pen-to-square"></i></a> |
                        <a href="index.php?controller=Evenement&action=delete&id_evenement=<?php echo $evenements->id_evenement ?>"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <?php
                // var_dump($evenement);
                // die;
                ?>

            </tbody>
        </table>
    </div>

</section>