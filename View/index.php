<?php
    session_start();

    if(isset($_SESSION['usuario'])) {
        // datos del usuario
        $usuario = $_SESSION['usuario']['usuario'];
        $tipo = $_SESSION['usuario']['tipoUsuario'];
    } else {
        header('Location: ../');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home || JCode</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .bienvenida {
            padding: 10px;
            text-align: center;
            height: 100px;
            widht: 50%;
            background-color: #c5d2f1;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
        }

        a {
            margin-top: 25px;
            padding: 15px 20px;
            background-color: #c96452;
            border-radius: 10px;
        }

        ul {
            display: flex;
            list-style: none;
        }

        li {
            padding: 15px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="bienvenida">
            <h1>Bienvenid@ <?php echo("$usuario, eres un $tipo");?></h1>
        </div>

        <a href="../Model/exit.php">SALIR</a>

        <ul>
            <li>Home</li>
            <?php
                if($tipo == 'admin') {
                   echo("<li>Gráficos</li>
                        <li>Usuarios</li>"); 
                }
            ?>
            <li>Productos</li>
            <?php
                if($tipo == 'user') {
                   echo("<li>Otro item</li>"); 
                }
            ?>
        </ul>
    </div>
</body>
</html>