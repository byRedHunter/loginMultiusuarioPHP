<?php
    // para poder utilizar los metodos de session
    session_start();

    // incluimos nuestro archivo de conexion
    include './conexion.php';

    // dato de tipo json que retornaremos al archivo de js
    $json = array();

    // funcion para encriptar contraseña --> retorna una cadena
    function cifrarPass($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    // funcion para decifrar contraseña --> retorna true or false
    function decifrarPass($password, $passCifrado) {
        return password_verify($password, $passCifrado);
    }

    // funcion para insertar datos
    function registerUser($registerUser, $registerPass, $conn) {
        $query = "INSERT INTO usuarios(usuario, password) VALUES('$registerUser', '$registerPass')";
        $result = mysqli_query($conn, $query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }


    if(isset($_POST['nameForm']) && $_POST['nameForm'] == 'login') {
        // variables del login
        $loginUser = $_POST['loginUsuario'];
        $loginPass = $_POST['loginPassword'];

        $query = "SELECT * FROM usuarios WHERE usuario = '$loginUser'";
        $result = mysqli_query($conn, $query);

        if($result) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $rowPass = $row['password'];

            if(decifrarPass($loginPass, $rowPass)) {
                // creamos la session usuario
                // le pasamos los valores del $row
                $_SESSION['usuario'] = $row;

                $json[] = array(
                    'mensajeTitle' => 'Genial...!!! 😉',
                    'mensaje' => 'Contraseña desencriptada',
                    'tipo' => 'success'
                );
            } else {
                $json[] = array(
                    'mensajeTitle' => 'Que mal...!!! 😕',
                    'mensaje' => "Los datos son incorrectos",
                    'tipo' => 'warning'
                );
            }
        } /* else {
            $json[] = array(
                'mensajeTitle' => 'Que mal...!!! 😕',
                'mensaje' => "Los datos son incorrectos",
                'tipo' => 'error'
            );
        } */
    } else {
        // variables del register
        $registerUser = $_POST['registerUsuario'];
        $registerPass = $_POST['registerPassword'];
        $passRepeat = $_POST['registerRepite'];

        // validar que las contraseñas sean iguales
        if($registerPass != $passRepeat) {
            $json[] = array(
                'mensajeTitle' => 'Uhmnn...!!! 🤔',
                'mensaje' => 'Asegurese de que las contraseñas sean iguales',
                'tipo' => 'warning'
            );
        } else {
            $encriptado = cifrarPass($registerPass);
            if( registerUser($registerUser, $encriptado, $conn) ) {
                // traemos los datos para poder iniciar session dede aqui tambien
                $query = "SELECT * FROM usuarios WHERE usuario = '$registerUser'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $_SESSION['usuario'] = $row;

                $json[] = array(
                    'mensajeTitle' => 'Genial...!!! 😉',
                    'mensaje' => 'Usuario Registrado',
                    'tipo' => 'success'
                );
            } else {
                $json[] = array(
                    'mensajeTitle' => 'Que mal...!!! 😕',
                    'mensaje' => 'Algo salio mal, intentelo mas tarde',
                    'tipo' => 'error'
                );
            }
        }
    }

    // convertimos a tipo string el json
    $jsonstring = json_encode($json);
    // devolvemos el valor
    echo $jsonstring;
?>