<section class="bg-light">
    <!-- Conteneur central pour la page -->
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h1 class="text-center mb-4">Inscription</h1>
            <form action="index.php?controller=Utilisateur&action=addTreatment" method="POST">
                <!-- Nom -->
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
                </div>

                <!-- Prénom -->
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
                </div>

                <!-- Mot de Passe -->
                <div class="mb-3">
                    <label for="mdp" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrez votre mot de passe" required>
                </div>

                <!-- Champ invisible pour le statut -->
                <input type="hidden" name="statut" value="utilisateur">

                <!-- Bouton d'inscription -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </div>

                <!-- Lien Connexion -->
                <p class="text-center mt-3">
                    <a href="index.php?controller=Utilisateur&action=connexionController" class="text-decoration-none">Déjà inscrit ? Connectez-vous</a>
                </p>
            </form>
        </div>
    </div>
</section>