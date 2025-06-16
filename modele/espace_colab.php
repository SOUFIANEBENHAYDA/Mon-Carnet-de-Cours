<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Espace Collaboratif</title>
</head>
<style>
    :root {
        --bleu-profond: #003973;
        --bleu-profond-clair: #1a4d8c;
        --beige-clair: #f5f5ee;
        --beige-fonce: #e8e8e0;
        --accent-or: #d4af37;
        --accent-or-hover: #e8c766;
        --gris: #6c757d;
        --gris-clair: #f8f9fa;
    }

    
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        justify-self: center;
        min-height: 100vh;
        background: url(../Images/background_admin.png);
        background-size: cover;
        background-position: center;
        width: 600px;

    }
    
    .container {
        background-color: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-width: 600px;
    }
    
    b {
        font-size: 28px;
        color: var(--bleu-profond);
        display: block;
        margin-bottom: 25px;
        font-weight: 600;
        text-align: center;
    }
    
    textarea {
        height: 150px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        border: 1px solid #e0e0e0;
        transition: all 0.3s ease;
        resize: none;
    }
    
    textarea:focus {
        border-color: var(--accent-or);
        box-shadow: 0 4px 12px rgba(212, 175, 55, 0.2);
        outline: none;
    }
    
    input {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        border: 1px solid #e0e0e0;
        padding: 12px 15px;
        transition: all 0.3s ease;
    }
    
    input:focus {
        border-color: var(--accent-or);
        box-shadow: 0 4px 12px rgba(212, 175, 55, 0.2);
        outline: none;
    }
    
    .btn-primary {
        background-color: var(--accent-or);
        border: none;
        padding: 10px 25px;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        width: 150px;
        margin-top: 10px;
    }
    
    .btn-primary:hover {
        background-color: var(--accent-or-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(212, 175, 55, 0.3);
    }
    
    .form-control {
        margin-bottom: 20px;
    }
    
    .form-control::placeholder {
        color: var(--gris);
        opacity: 0.7;
    }
</style>
<body>
    <script src="bootstrap/js/bootstrap.js"></script>
    <div class="container mt-5">
        <b>Espace Collaboratif</b>
        <form action="../view/trait_espace.php" method="post">
            <input type="text" placeholder="Name" class="form-control mb-3 mt-3" name="nom" required>
            <input type="email" placeholder="Email" class="form-control mb-3" name="email" required>
            <textarea class="mb-3 form-control" placeholder="Message" name="=contenu"></textarea>
            <button type="button" class="btn btn-primary">SEND</button>
        </form>
    </div>
</body>
</html>