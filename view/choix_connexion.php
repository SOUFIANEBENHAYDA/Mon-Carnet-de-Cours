<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/css/index1.css">
    <title>Document</title>
</head>
<style>
    .box{
        display: flex;
        justify-content: center;
        align-items: center;
        justify-self: center;
        min-height: 100vh;
        background: url(Marrakech.jpg);
        background-size: cover;
        background-position: center;
        width: 420px;
        gap: 90px;

    }

    .btn {
        width: 6.5em;
        height: 2.3em;
        margin: 0.5em;
        background: black;
        color: white;
        border: none;
        border-radius: 0.625em;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        position: relative;
        z-index: 1;
        overflow: hidden;
    }

    a{
        text-decoration: none;
        color: grey;
    }
    button:hover {
        color: black;

    }

    button:after {
        content: "";
        background: white;
        position: absolute;
        z-index: -1;
        left: -20%;
        right: -20%;
        top: 0;
        bottom: 0;
        transform: skewX(-45deg) scale(0, 1);
        transition: all 0.5s;
    }

    button:hover:after {
        transform: skewX(-45deg) scale(1, 1);
        -webkit-transition: all 0.5s;
        transition: all 0.5s;

    }
</style>

<body>
    <div class="box"> 
        <button class="btn">
            <a href="view/connexion_admin1.php"> Admin </a>
        </button>
        <button class="btn">
            <a href="view/connexion_etudiant.php">Etudiant</a>
        </button>
    </div>
</body>
</html>