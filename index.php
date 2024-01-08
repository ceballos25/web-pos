<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
<?php
    require "conexion.php";
    session_start();

    if ($_POST) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $sql = "SELECT id, password, nombre, tipo_usuario FROM usuarios WHERE usuario='$usuario'";

        $resultado = $mysqli->query($sql);
        $num = $resultado->num_rows;

        if ($num > 0) {
            $row = $resultado->fetch_assoc();
            $password_bd = $row['password'];
            $pass_c = sha1($password);

            if ($password_bd == $pass_c) {

                $_SESSION['id'] = $row['id'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

                header("Location: principal.php");
                
            }else {
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Algo salió mal...",
                    text: "Verifique usuario y/o contraseña",
                    confirmButtonColor: "#000"
                  });
                </script>';
            }
            
        }else{
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Algo salió mal...",
                text: "El usuario no existe",
                confirmButtonColor: "#000"
              })
            </script>';
        }
    }

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>WEB | POS</title>
        <link href="css/login.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            <div class="screen">
                <div class="screen__content">
                    <form class="login" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
                        <div class="login__field">
                            <i class="login__icon fas fa-user"></i>
                            <input type="text" class="login__input" id="inputEmail" name="usuario" placeholder="Usuario">
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-lock"></i>
                            <input type="password" class="login__input" placeholder="Contraseña" name="password">
                        </div>
                        <button class="button login__submit">
                            <span class="button__text">Ingresar</span>
                            <i class="button__icon fas fa-chevron-right" style="color:#000"></i>
                        </button>
                    </form>
                    <div class="social-login">
                        <h3>&copy; WEB | POS </h3>
                        <p class="developer">Desarrollado Por: <br><a class="link-ceballos" href="https://ccceballos30.github.io/ccceballos30/" target="_blank" rel="noopener noreferrer"> Cristian Ceballos </a></p>
                    </div>
                </div>
                <div class="screen__background">
                    <span class="screen__background__shape screen__background__shape4"></span>
                    <span class="screen__background__shape screen__background__shape3"></span>
                    <span class="screen__background__shape screen__background__shape2"></span>
                    <span class="screen__background__shape screen__background__shape1"></span>
                </div>
            </div>
        </div>
    </body>
    </html>