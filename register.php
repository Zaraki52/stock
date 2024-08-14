<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .registration-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .registration-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="registration-container">
            <h2>Inscription</h2>
            <form method="POST" action="inscription.php">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'utilisateur" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirmez le mot de passe</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Confirmez le mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                <p class="mb-0 text-muted">Vous avez déjà un compte? <a href="login.php"> Se connecter</a></p>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
