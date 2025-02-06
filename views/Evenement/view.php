<?php

// echo "Test";

?>
<section class="sectionAdmin">

    <div class="container mt-3">
        <h2>Liste des événements</h2>
        <a href="index.php?controller=Evenement&action=add">Cliquez ici pour créer un événement.</a>
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
                <?php foreach ($evenements as $evenement) {
                    // var_dump($evenements);
                    // die;
                ?>
                    <tr>
                        <td><?php echo $evenement->id_evenement ?></td>
                        <td><?php echo $evenement->nom_evenement ?></a></td>
                        <td><?php echo $evenement->nom_categorie ?></a></td>
                        <td><?php echo $evenement->description ?></td>
                        <td><?php echo $evenement->date_evenement ?></td>
                        <td><?php echo $evenement->nbr_place ?></td>
                        <td><img class="img-fluid rounded w-25 mx-auto d-block" src="images/<?php echo $evenement->image; ?>" alt="Image de l'événement"></td>
                        <!-- <td><a href="<?php echo $evenement->picture ?>" target="_blank">Cliquez ici</a></td> -->
                        <td>
                            <a href="index.php?controller=Evenement&action=showSelected&id_evenement=<?php echo $evenement->id_evenement ?>"><i class="fa-solid fa-eye"></i></a> |
                            <a href="index.php?controller=Evenement&action=updateGet&id_evenement=<?php echo $evenement->id_evenement ?>&id_categorie=<?php echo $evenement->id_categorie ?>"><i class="fa-solid fa-pen-to-square"></i></a> |
                            <a href="index.php?controller=Evenement&action=delete&id_evenement=<?php echo $evenement->id_evenement ?>"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

</section>