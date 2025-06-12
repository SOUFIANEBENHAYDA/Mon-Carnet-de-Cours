<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/conn_admin.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.js">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form method="post" action="trait_admin.php">
            <h1>Login</h1>
            <div class="box">
                <input type="email" placeholder="Example@mail.com" name="email" required>
            </div>
            <div class="box">
                <input type="password" placeholder="password" name="password" required>
            </div>
            <div class="forget">
                <a href="#">forget password ?</a>
            </div>
            <button type="submit" class="button btn btn-primary">Login</button>
            <div class="register">
                <p>Don't have account ? <a href="#">Register</a></p>
            </div>

        </form> 
    </div>
   
    
</body>
</html>

