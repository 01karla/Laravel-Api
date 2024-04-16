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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
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
                        <div class="col-lg-5 d-none d-lg-block bg-register-image2 "></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4"><i class="fa-solid fa-hand-peace"></i> Modificar Letra</h1>
                                        </div>
                                        <form action="{{ route('modi', $abecedario['id_abecedario']) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <input type="text" class="form-control1 form-control-user" name="letra" id="letra" placeholder="Letra (Ejemplo: A)"value="{{ $abecedario['letra'] }}"  required>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control1 form-control-user"  name="sonido1" id="sonido" placeholder="Sonido (Ejemplo: letra_a.mp3)" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control1 form-control-user" name="foto1" id="foto" placeholder="Imagen (Ejemplo: Isidro)"required>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" id="activo" name="activo" value="1">
                                                <label for="activo">Activo</label>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn2 btn-primary btn-block" type="submit">Guardar Modificación</button>
                                            </div>
                                        </form>
                                        <hr>
                                        <div class="form-actions">
                                            <button class="btn2 btn-primary btn-user btn-block" ><a class="btn " href="{{ route('AbcRegistros') }}"></a> Cancelar Modificación</button>  
                                        </div>
                                </div>
                            </div>
                    </div>
                </div>
        </div>

    </div>

</body>

</html>
