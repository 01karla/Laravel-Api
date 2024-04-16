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
                    <div class="col-lg-5 d-none d-lg-block bg-register-image2"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><img class="img-detalle" src="{{ asset('img/'.$abecedario['foto']) }}"/> Detalle de la letra</h1>
                                    </div>
                                    <form class="user" action="" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        <p class=""> Letra: {{ $abecedario['letra'] }}</p>
                                        <audio controls>
                                            <source src="{{ asset('sonido/'.$abecedario['sonido']) }}" type="audio/mpeg">
                                        </audio>
                                    </form>
                                    <hr>
                                        <div class="form-actions">
                                            <button class="btn2 btn-primary btn-user btn-block" ><a href=" {{ route('Abcmostrar_Modificar', $abecedario['id_abecedario']) }}"><i class="fas fa-edit"value="{{ $abecedario['id_abecedario'] }}"></i> Modificar</a></button>  
                                        </div>
                                        <br>
                                        <div class="form-actions">
                                            <button class="btn2 btn-primary btn-user btn-block" ><a href="{{ route('AbcRegistrosUsua') }}"><i class="fa-solid fa-arrow-left"></i> Regresar</a></button>  
                                        </div>
                                    
                           </div>
                       </div>  
                </div>
            </div>
        </div>
    </div>

    
    <script src=".\js\sb-admin-2.min.js"></script>

</body>

</html>