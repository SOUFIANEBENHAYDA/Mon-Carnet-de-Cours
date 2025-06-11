<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Mon Application</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        color: #333;
    }

    .login-container {
        display: flex;
        width: 900px;
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .login-left {
        flex: 1;
        padding: 50px;
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-left h1 {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .login-left p {
        font-size: 1rem;
        opacity: 0.9;
        margin-bottom: 30px;
    }

    .illustration img {
        width: 100%;
        max-width: 300px;
        margin: 0 auto;
        display: block;
    }

    .login-form {
        flex: 1;
        padding: 50px;
    }

    .form-header {
        margin-bottom: 40px;
        text-align: center;
    }

    .form-header h2 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 10px;
    }

    .form-header p {
        color: #666;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .input-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
    }

    .input-field {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-field i {
        position: absolute;
        left: 15px;
        color: #777;
    }

    .input-field input {
        width: 100%;
        padding: 15px 15px 15px 45px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s;
    }

    .input-field input:focus {
        border-color: #a777e3;
        outline: none;
        box-shadow: 0 0 0 3px rgba(167, 119, 227, 0.2);
    }

    .toggle-password {
        position: absolute;
        right: 15px;
        cursor: pointer;
        color: #777;
    }


    .options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0;
    }

    .remember-me {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .remember-me input {
        margin-right: 8px;
    }

    .forgot-password {
        color: #a777e3;
        text-decoration: none;
        font-size: 0.9rem;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }
    .login-btn {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        margin-bottom: 25px;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(167, 119, 227, 0.3);
    }

    .social-login {
        text-align: center;
        margin-bottom: 25px;
    }

    .social-login p {
        color: #666;
        margin-bottom: 15px;
        position: relative;
    }

    .social-login p::before,
    .social-login p::after {
        content: "";
        position: absolute;
        top: 50%;
        width: 30%;
        height: 1px;
        background-color: #ddd;
    }

    .social-login p::before {
        left: 0;
    }

    .social-login p::after {
        right: 0;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s;
    }

    .social-icon:hover {
        transform: translateY(-3px);
    }

    .social-icon.google {
        background-color: #db4437;
    }

    .social-icon.facebook {
        background-color: #4267B2;
    }

    .social-icon.twitter {
        background-color: #1DA1F2;
    }

    .signup-link {
        text-align: center;
        color: #666;
    }

    .signup-link a {
        color: #a777e3;
        text-decoration: none;
        font-weight: 600;
    }

    .signup-link a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .login-container {
            flex-direction: column;
            width: 90%;
        }
        
        .login-left {
            padding: 30px;
        }
        
        .login-form {
            padding: 30px;
        }
    }
</style>
<body>
    <div class="login-container">
        <div class="login-left">
            <h1>Bienvenue</h1>
            <p>Connectez-vous pour accéder à votre espace personnel.</p>
            <div class="illustration">
                <img src="login.png" alt="Illustration connexion">
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