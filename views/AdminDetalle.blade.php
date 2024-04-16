<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detalle Admin</title>

    <!-- Custom fonts for this template-->
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('js/sb-admin-2.js') }}" >
    <link href="{{ asset('js/sb-admin-2.min.js') }}" >
    <script src="https://kit.fontawesome.com/4f96269749.js" crossorigin="anonymous"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image3 "></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><img class="img-detalle" src="{{ asset('img/'.$admin['foto']) }}"/> Detalle de la cuenta</h1>
                                    </div>
                                    <form class="user" action="" method="post" enctype="multipart/form-data">
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
                                                <input type="text" class="form-control form-control-user" name="fn" id="fn" value="{{ $admin['fn'] }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="sexo" id="sexo" value="{{ $admin['sexo'] }}" required>
                                            </div>
                                            <div class="col-sm-6">
                                            <input type="email" class="form-control form-control-user" id="email"placeholder="Email Address" name="email" value="{{ $admin['email'] }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0 position-relative">
                                                <input type="password" class="form-control1 form-control-user" id="pass" placeholder="Password" name="pass" value="{{ $admin['pass'] }}">
                                                <button class="btn3 btn-outline-secondary toggle-password" type="button" id="show-hide-password">
                                                    <i class="fas fa-eye-slash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                        <div class="form-actions">
                                </tr>
                                            <button class="btn2 btn-primary btn-user btn-block" ><a href=" {{ route('mostrar_modificar', $admin['id_admin']) }}"><i class="fas fa-edit"value="{{ $admin['id_admin'] }}"></i> Modificar</a></button>  
                                        </div>
                                        <hr>
                                        <div class="form-actions">
                                            <button class="btn2 btn-primary btn-user btn-block" ><a href="{{ route('AdminRegistros') }}"><i class="fa-solid fa-arrow-left"></i> Regresar</a></button>  
                                        </div>
                                    
                           </div>
                       </div>  
                </div>
            </div>
        </div>
    </div>

    
    <script src=".\js\sb-admin-2.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('pass');
        const showHideButton = document.getElementById('show-hide-password');

        showHideButton.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showHideButton.innerHTML = '<i class="fas fa-eye"></i>';
            } else {
                passwordInput.type = 'password';
                showHideButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
            }
        });
    });
</script>


</body>

</html>