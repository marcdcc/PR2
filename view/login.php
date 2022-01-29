<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/login.js"></script>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="row">
        <div class="login">
            <h1>Login</h1><br>
            <div class=alert id='mensaje'>
                <?php
                session_start();
                if (isset($_SESSION['error'])){
                    echo "<p>Usuario y/o contraseña incorrectos<p>";
                }
                session_destroy();
                ?>
            </div>
            <form class="caja" action='../process/login.proc.php' method='POST' onsubmit="return validar()">
                <input type='email' name='email' id='email' placeholder="Email"/><br><br>
                <input type='password' name='password_user' id='password_user' placeholder="Contraseña"/><br><br>
                <input TYPE='SUBMIT' NAME='crear' VALUE='Iniciar sesión' class="btn btn-dark btn_login">
            </form>
        </div>
    </div>
</body>
</html>
