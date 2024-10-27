<script>
document.addEventListener("DOMContentLoaded", function() {
    function errorLog(texto){
        document.getElementById('error').innerHTML = texto;
    }
    <?php if (isset($_GET['msg'])){
            if($_GET['msg'] == 5) { ?>
                errorLog('Usuario y/o Contraseña Incorrectos');
    <?php   } else if(isset($_GET['msg']) && $_GET['msg']==1){ ?>
                errorLog('Usuario registrado exitosamente');
    <?php   } else if(isset($_GET['msg']) && $_GET['msg']==2){ ?>
                errorLog('Usuario registrado exitosamente');
    <?php   } 
            }?>
});
</script>
<?php 
if(isset($_COOKIE['user_logged_in'])){
    Header("location:./v=inicio");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio De Sesion</title>
    <link rel="stylesheet" href="css/papeleria-estilo.css">
    <link rel="stylesheet" href="css/papeleria-log.css">
    <script src="js/main.js" defer></script>
</head>
<body><br><br><br><br><br>
    <form action="php/log.php" method="POST">
        <h1>Logueo</h1>
        <b id="error"></b>
        <label for="user">Usuario:</label>
        <input type="text" name="user" id="user" required autocomplete="off">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <span class="mostrar-contraseña" onclick="Cambio()">Mostrar Contraseña
            </span>
            <input type="submit" value="Ingresar" class="btn-com" style="background-color: #973f6b;">
        <a href="./?v=crearcuenta" class="btn-com">Crear Una Cuenta</a><br>
        <a href="./">Reportar Un Error</a><br><br>
        
    </form>
    <script>function Cambio() {
        const passwordInput = document.getElementById('password');
    const toggleButton = document.querySelector('.mostrar-contraseña');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.textContent = 'Ocultar Contraseña';
    } else {
        passwordInput.type = 'password';
        toggleButton.textContent = 'Mostrar Contraseña';
    }
}</script>
</body>
</html>
