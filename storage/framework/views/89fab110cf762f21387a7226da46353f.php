<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Étudiant</title>
    <style>

:root {
    --primary-color: #4a90e2;
    --secondary-color: #357abd;
    --bg-color: #f4f7f9;
    --text-color: #333;
    --border-color: #ddd;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: black;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

.signup-container {
    background: #00065cff;
    width: 100%;
    max-width: 400px;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(88, 86, 86, 0.1);
}

h2 {
    color: #ffffff;
    margin-bottom: 10px;
    text-align: center;
}

p {
    color: #ffffffff;
    font-size: 0.9rem;
    text-align: center;
    margin-bottom: 20px;
}

hr {
    border: 0;
    border-top: 1px solid var(--border-color);
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 15px;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    color: white
}

.input-group input {
    width: 100%;
    padding: 12px;
    border: 1px solid var(--border-color);
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s;
}

.input-group input:focus {
    outline: none;
    border-color: var(--primary-color);
}

.btn-submit {
    width: 100%;
    padding: 12px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s;
    margin-top: 10px;
}

.btn-submit:hover {
    background-color: var(--secondary-color);
}

.footer-text {
    margin-top: 20px;
    font-size: 0.85rem;
}

.footer-text a {
    color: var(--primary-color);
    text-decoration: none;
}

.footer-text a:hover {
    text-decoration: underline;
}



    </style>
</head>
<body>

    <div class="signup-container">
        <form action="<?php echo e(route('students.register')); ?>" method="POST" class="signup-form">
            <?php echo csrf_field(); ?>
            <h2>Créer un compte</h2>
            <p>Veuillez remplir ce formulaire pour vous inscrire.</p>
            <hr>

            <div class="input-group">
                <label for="date_heure">Nom </label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="input-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="input-group">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone" required>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"  required>
            </div>

            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password"  required>
            </div>


            <button type="submit" class="btn-submit">S'inscrire</button>

            <p class="footer-text">Déjà inscrit ? <a href="<?php echo e(route('login')); ?>">Se connecter</a></p>
        </form>
    </div>

</body>
</html><?php /**PATH C:\Users\azerty\Desktop\laravel.test\CovoiturageProjet\resources\views/students/register.blade.php ENDPATH**/ ?>