<?php
include "php/db.php";
include "./v/user.php";
    session_start();
    if(!isset($_COOKIE['user_logged_in'])){
        if (!isset($_GET['v']) || ($_GET['v'] !== 'login' && $_GET['v'] !== 'crearcuenta')) {
            Header("Location: ./?v=login");
            exit();
        } 
    }else{
        if (isset($_GET['v']) && $_GET['v'] === 'login') {
            Header("Location: ./?v=inicio");
            exit();
        }
        $_SESSION['username'] = $_COOKIE['user_logged_in'];
        $username = $_COOKIE['user_logged_in'];
    }
    if(isset($_POST['accept_cookies'])) {
        setcookie("cookies_accepted", "true", time() + (365 * 24 * 60 * 60), "/");
        Header("Location: ./");
        exit();
    }
?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    function msgOp(texto){
        document.getElementById('msg').innerHTML = texto;
    }
    <?php if (isset($_GET['msg'])){
            if($_GET['msg'] == "PAID") { ?>
                msgOp('Producto Comprado Con Exito');
    <?php   } else if($_GET['msg'] =="SAVED"){ ?>
                msgOp('Producto Subido Correctamente');
    <?php   } else if($_GET['msg'] == "DELETED"){ ?>
                msgOp('Producto Eliminado Correctamente');
    <?php   } else if($_GET['msg'] =="UPDATED"){ ?>
                msgOp('Producto Actualizado Correctamente');
    <?php   } else if($_GET['msg'] == "BUSHED"){?>
                msgOp('Producto Agotado');
    <?php   }
            }?>
});
</script>
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAPELERIA</title>
    <link rel="stylesheet" href="css/papeleria-estiloxx.css">
    <link rel="stylesheet" href="css/papeleria-cookie.css">
    <script src="js/main.js" defer></script>
    </head>
    <body>
<?php
    if(!isset($_GET['v']) || $_GET['v'] == ""){
        header("location: ./?v=inicio");
        exit();
    }
    
    if(is_file("./v/".$_GET['v'].".php")&& $_GET['v']!=="login" && $_GET['v'] !=="crearcuenta" && $_GET['v']!=="404"){

        if(!isset($_SESSION['username']) || $_SESSION['username']==""){
            include "php/logout.php";
            exit();
        }
        include "./v/".$_GET['v'].".php";
        include "./php/footer.php";
    }else{
        if($_GET['v']=="login"){
            include "./login.php";
        }else if($_GET['v'] == 'crearcuenta') {
            include "./v/crearcuenta.php";
            exit();
        }
        else{
            include "./v/404.php";
        }
    }
    
?>
</body>
</html>
<?php $con -> close() ?>