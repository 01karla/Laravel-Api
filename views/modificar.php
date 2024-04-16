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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear una cuenta!</h1>
                            </div>
                            <form class="user" action="{{ route('modificar', $admin['id_admin']) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
            
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="nombre" id="nombre" placeholder="Ejemplo: Karla" value="{{ $admin['nombre'] }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"  name="app" id="app" placeholder="Ejemplo: Garcia" value="{{ $admin['app'] }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="apm" id="apm" placeholder="Ejemplo: Isidro" value="{{ $admin['apm'] }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="foto" id="foto" placeholder="Ejemplo: Isidro" value="{{ $admin['foto'] }}" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user" name="fn" id="fn" value="{{ $admin['fn'] }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="sexo" id="sexo" class="form-control form-control-user">
                                            <option class="form-control form-control-user" disabled selected>Seleccione un Sexo</option>
                                            <option class="form-control form-control-user"value="Hombre">Hombre</option>
                                            <option class="form-control form-control-user" value="Mujer">Mujer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email"placeholder="Email Address" name="email" value="{{ $admin['email'] }}">
                                </div>
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user"id="pass" placeholder="Password" name="pass" value="{{ $admin['pass'] }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleRepeatPassword" placeholder="Repeat Password">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="activo" name="activo" value="1">
                                        <label class="custom-control-label" for="customCheck" >Activo</label>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button class="btn btn-primary btn-user btn-block" type="submit">Guardar Cambios</button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>