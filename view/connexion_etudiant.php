<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Mon Application</title>
    <link rel="stylesheet" href="../css/conn_etudiant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <h1>Bienvenue</h1>
            <p>Connectez-vous pour accéder à votre espace personnel.</p>
            <div class="illustration">
                <img src="../Images/login.png" alt="Illustration connexion">
            </div>
        </div>
        
        <div class="login-form">
            <div class="form-header">
                <h2>Connexion</h2>
                <p>Entrez vos identifiants</p>
            </div>
            
            <form id="loginForm" action="trait_connexion.php" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="votre@email.com" required>
                    </div>
                </div>
                
                
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                        <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                    </div>
                </div>
                
                <div class="options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Se souvenir de moi</span>
                    </label>
                    <a href="#" class="forgot-password">Mot de passe oublié?</a>
                </div>
                
                <button type="submit" class="login-btn">Se connecter</button>
                
                <div class="social-login">
                    <p>Ou connectez-vous avec</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon google"><i class="fab fa-google"></i></a>
                        <a href="#" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                
                <p class="signup-link">Pas encore de compte? <a href="#">S'inscrire</a></p>
            </form>
        </div>
    </div>
    
</body>
</html>