<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/mon.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.js">
    <title>Document</title>
</head>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        justify-self: center;
        min-height: 100vh;
        background-color: antiquewhite;
        background-size: cover;
        background-position: center;
        width: 420px;

    }
    .container{
        width: 420px;
        background: transparent;
        color: white;
        border-radius: 10px;
        padding: 30px 40px;
        border: 2px solid rgb(255,255,255,0.3);
        backdrop-filter: blur(35px);
        box-shadow: 0 0 10px rgb(0,0,0,0.2);
        box-shadow: 5px 10px 50px gray;

    }
    .container h1{
        text-align: center;
        font-size: 36px;
    }
    .container .box {
        position: relative;
        width: 100%;
        height: 50px;
        margin:30px 0;
    }
    .box input{
        width: 100%;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        border: 2px solid rgb(255,255,255,0.2);
        border-radius: 50px;
        font-size: 16px;
        color: white;
        padding: 20px 45px 20px 20px;
    }
    .box input::placeholder{
        color: white;
    }
    .box i {
        position: absolute;
        right: 20px;
        top:50px;
        transform: translateY(-50%);
        font-size: 20px;
    }
    .container .forget{
        display: flex;
        justify-content: space-between;
        font-size: 14px;
        margin: -15px 0 15px;
    }
    .forget label input{
        color: white;
        margin-right: none;
    }
    .forget a {
        color: white;
        text-decoration: none;
    }
    .forget a:hover{
        text-decoration: underline;
    }
    .container .button{
        width: 100%;
        height: 45px;
        background: white;
        border: none;
        color: black;
        border-radius: 40px;
        box-shadow: 0 0 10px rgb(0,0,0,0.1);
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
    }
    .container .button a {
        text-decoration: none;
        
    }
    .container .register{
        font-size: 14px;
        text-align: center;
        margin: 20px 0 15px;
    }
    .container .register p a {
        color: white;
        text-decoration: none;
        font-weight: 600;
    }
    .container .register p a:hover{
        text-decoration: underline;
    }


</style>
<body>
    <div class="container">
        <form method="post" action="trait_admin.php">
            <h1>Login</h1>
            <div class="box">
                <input type="email" placeholder="Email" required>
            </div>
            <div class="box">
                <input type="password" placeholder="password" required>
            </div>
            <div class="forget">
                <a href="#">forget password ?</a>
            </div>
            <button type="submit" class="button"><a href="#">Login</a></button>
            <div class="register">
                <p>Don't have account ? <a href="#">Register</a></p>
            </div>

        </form> 
    </div>
   
    
</body>
</html>

