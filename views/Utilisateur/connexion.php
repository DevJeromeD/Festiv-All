<section class="bg-light">

    <!-- Conteneur central pour la page -->
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h1 class="text-center mb-4">Connexion</h1>
            <form action="index.php?controller=Utilisateur&action=connexionController" method="POST">
                <!-- Champ Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
                </div>

                <!-- Champ Mot de Passe -->
                <div class="mb-3">
                    <label for="mdp" class="form-label">Mot de Passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrez votre mot de passe" required>
                </div>

                <!-- Bouton Connexion -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Se Connecter</button>
                </div>

                <!-- Lien Inscription -->
                <p class="text-center mt-3">
                    <a href="index.php?controller=Utilisateur&action=add" class="text-decoration-none">Pas encore inscrit ? Créez un compte</a>
                </p>
            </form>
        </div>
    </div>

</section>