<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro Amin</title>

    <!-- Custom fonts for this template-->
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4f96269749.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image3"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"> <i class="fa-solid fa-circle-user"></i> Crear una cuenta </h1>
                            </div>
                            <form class="user" action="{{ route('guardar') }}" method="post" enctype="multipart/form-data">
                                 @csrf
            
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="nombre" id="nombre" placeholder="Ejemplo: Karla" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"  name="app" id="app" placeholder="Ejemplo: Garcia" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="apm" id="apm" placeholder="Ejemplo: Isidro"required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control form-control-user" name="foto" id="foto" placeholder="Ejemplo: Isidro"required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user" name="fn" id="fn" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="sexo" id="sexo" class="form-control form-control-user">
                                            <option class="form-control form-control-user" >Seleccione un Sexo</option>
                                            <option class="form-control form-control-user"value="Hombre" >Hombre</option>
                                            <option class="form-control form-control-user" value="Mujer" >Mujer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email"placeholder="Email Address" name="email">
                                </div>
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user"id="pass" placeholder="Password" name="pass">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="passrepeact" placeholder="Repeat Password">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="activo" name="activo" value="1">
                                    <label for="activo">Activo</label>
                                </div>
                                <span id="passwordStrength"></span>
                                <div class="form-actions">
                                    <button class="btn btn-primary btn-user btn-block" type="submit">Registrar Cuenta</button>
                                    
                                </div>
                            </form>
                                <hr>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">OLvidaste tu contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Ya tienes una cuenta? Inicia seccion!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
    <script src=".\js\sb-admin-2.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById('pass');
        const repeatPasswordInput = document.getElementById('passrepeact');

        const validatePassword = () => {
            const password = passwordInput.value;
            const repeatPassword = repeatPasswordInput.value;

            // Validar si las contraseñas coinciden
            if (password !== repeatPassword) {
                repeatPasswordInput.setCustomValidity("Las contraseñas no coinciden");
            } else {
                repeatPasswordInput.setCustomValidity("");
            }

            // Validar la fuerza de la contraseña
            const passwordStrengthText = document.getElementById('passwordStrength');
            const strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");
            const mediumRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{5,7})");

            if (!passwordStrengthText) return; // Verificar si el elemento existe antes de continuar

            if (strongRegex.test(password)) {
                passwordStrengthText.textContent = ' Contraseña Segura';
                passwordStrengthText.style.color = 'green';
            } else if (mediumRegex.test(password)) {
                passwordStrengthText.textContent = 'Contraseña Poco segura';
                passwordStrengthText.style.color = 'yellow';
            } else {
                passwordStrengthText.textContent = ' Contraseña Insegura';
                passwordStrengthText.style.color = 'red';
            }
        };

        passwordInput.addEventListener('input', validatePassword);
        repeatPasswordInput.addEventListener('input', validatePassword);
    });
</script>


</body>

</html>